<?php
/*
Plugin Name: Quizz Contest
Plugin URI: http://monsite.fr/plugins/quizzcontest
Description: Quizz contest
Version: 0.1
Author: Le Sanglier des Ardennes
Author URI: http://steamcyberpunk.net/
License: GPL2 license
*/

/*
Copyright 2014  Le Sanglier des Ardennes  (email : lesanglierdesardennes@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*
Initialize/install or uninstall
*/

/* 
Runs when plugin is activated 
*/
register_activation_hook(__FILE__,'quizzcontest_install'); 

/* 
Runs on plugin deactivation
*/
register_deactivation_hook( __FILE__, 'quizzcontest_remove' );

/* 
The quizzcontest_data field is created in wp_options table
Creates new database field 
*/
function quizzcontest_install() {
    $default_option = array(
                    "'version'" => '0.1',
                    "'introduction'" => 'Q&R sur l\'informatique'
                    );
    add_option("quizzcontest_data", $default_option, "", "yes");

    /* Ceate new table */
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

    global $wpdb;
    $db_table_name = $wpdb->prefix . 'quizzcontest_qa';

    if( $wpdb->get_var( "SHOW TABLES LIKE '$db_table_name'" ) != $db_table_name ) {
        if ( ! empty( $wpdb->charset ) )
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if ( ! empty( $wpdb->collate ) )
            $charset_collate .= " COLLATE $wpdb->collate";
 
        $sql = "
                CREATE TABLE " . $db_table_name . " (
                    id int(11) NOT NULL AUTO_INCREMENT,
                    question varchar(255) DEFAULT NULL, 
                    answer varchar(255) DEFAULT NULL,
                    PRIMARY KEY (`id`)
                ) $charset_collate;
            ";
        dbDelta( $sql );
    }

    quizzcontest_insert_data();

}

function quizzcontest_insert_data() {
    global $wpdb;

    $wpdb->insert( 
        'wp_quizzcontest_qa', 
        array( 'id' => 1, 'question' => 'Quel est le créateur de Linux ?', 'answer' => 'Linus Torvalds'), 
        array( '%d', '%s', '%s', ) 
    );

    $wpdb->insert( 
        'wp_quizzcontest_qa', 
        array( 'id' => 2, 'question' => 'Qui est RMS ?', 'answer' => 'Richard M. Stallman'), 
        array( '%d', '%s', '%s', ) 
    );

    $wpdb->insert( 
        'wp_quizzcontest_qa', 
        array( 'id' => 3, 'question' => 'Quel est la commande qui permet de liste un répertoire ?', 'answer' => 'La commande ls'), 
        array( '%d', '%s', '%s', ) 
    );

}

/* Deletes the database field */
function quizzcontest_remove() {
    delete_option('quizzcontest_data');
    
    /* Delete table */
    global $wpdb;
    $thetable = $wpdb->prefix."quizzcontest_qa";
    $wpdb->query("DROP TABLE IF EXISTS $thetable");
}

/*
Display administration page
*/
if ( is_admin() ) {

    function quizzcontest_menu() {
         add_options_page('Quizz Contest', 'Quizz Contest', 'administrator', basename(__FILE__), 'quizzcontest_option');

        add_menu_page('Quizz Contest', 'Quizz Contest', 'manage_options', 'listQuestionAnswer', 'listQuestionAnswer');
        
        add_submenu_page('quizzcontest_list', 'Add New QuestionAnswer', 'Add New', 'manage_options', 'createQuestionAnswer', 'createQuestionAnswer'); 
        
        //this submenu is HIDDEN, however, we need to add it anyways
        add_submenu_page(null, 'Update QuestionAnswer', 'Update', 'manage_options', 'updateQuestionAnswer', 'updateQuestionAnswer');

    }

    add_action('admin_menu','quizzcontest_menu');

    function quizzcontest_option() {
        include('admin/quizzcontest_option.php');
    } 
}

/*
Add stylesheet and javascript in header
*/
function addHeader() {
   print '<link media="screen" type="text/css" href="/wp-content/plugins/quizzcontest/css/style.css" rel="stylesheet">';
   print '<script type="text/javascript" src="/wp-content/plugins/quizzcontest/js/main.js"></script>';
}
add_action('wp_head', 'addHeader');


/*
Get question from db by id
*/

function getQuestionById($id) {
    global $wpdb;

    $table_name = $wpdb->prefix . 'quizzcontest_qa';

    $row = $wpdb->get_row( $wpdb->prepare('SELECT * FROM '.$table_name.' WHERE id = %d', $id) );

    return $row;
}

/*
Shortcut : [quizzcontestintro_shortcode]
*/
function displayQuizzContestIntroShortCode() {
    $quizzcontest_data = get_option('quizzcontest_data');
    $version = $quizzcontest_data["'version'"];
    $introduction = $quizzcontest_data["'introduction'"];

    $default_quizzcontest = "
        Le concours :  <br/>
        Version : <span class='quizzcontest_title'> $version  </span> <br/>
        Introduction  : <span class='quizzcontest_title'> $introduction  </span> <br/>
        <br/>
        Bonne chance !! <br/>
    ";
    return apply_filters('quizzcontest', $default_quizzcontest);
}
add_shortcode( 'quizzcontestintro_shortcode', 'displayQuizzContestIntroShortCode' );


/*
Shortcut : [quizzcontestquestion_shortcode id="<question id>"]
*/
function displayQuizzContestQuestionShortCode($id) {
    extract(shortcode_atts(array(
        'id' => 'id'
    ), $id));

    $question =  getQuestionById($id);
    $question = $question->question;

    $default_quizzcontest = "
        $question
    ";
    return apply_filters('quizzcontest', $default_quizzcontest);
}
add_shortcode( 'quizzcontestquestion_shortcode', 'displayQuizzContestQuestionShortCode' );





/*
 Display a notice on top of the dashboard
*/
function displayAdminNotice(){
    echo "
    <p>
    Admin alert in dashboard
    </p>";
}
//add_action('admin_notices', 'displayAdminNotice');

/*
Display a text after a post in view post
*/
function displayTextAfterPost($content) {

 if ( is_single() ) {
    $content .= "
        <br/>
        <span class='quizzcontest_title'> " . get_option('quizzcontest_data'). " </span>
        ";
 }

  return $content;
}
//add_filter('the_content', 'displayTextAfterPost');

// Add settings link on plugin page
function quizzcontest_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=quizzcontest.php">Paramétres</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'quizzcontest_settings_link' );


define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'listQuestionAnswer.php');
require_once(ROOTDIR . 'createQuestionAnswer.php');
require_once(ROOTDIR . 'updateQuestionAnswer.php');

?>
