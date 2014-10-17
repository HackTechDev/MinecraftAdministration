<?php
/*
Plugin Name: Minecraft Administration
Plugin URI: https://github.com/Nekrofage/WordpressPluginMinecraftAdministration
Description: Minecraft administration
Version: 0.1
Author: Le Sanglier des Ardennes
Author URI: http://steamcyberpunk.net/
License: GPL2 license
*/

include ("lib/MinecraftQuery/MinecraftApiClient.php");
include ("lib/MinecraftQuery/MinecraftQueryServer.php");


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
register_activation_hook(__FILE__,'minecraft_install'); 

/* 
Runs on plugin deactivation
*/
register_deactivation_hook( __FILE__, 'minecraft_remove' );

/* 
The minecraft_data field is created in wp_options table
Creates new database field 
*/
function minecraft_install() {
    $default_option = array(
                    "'version'" => '0.1',
                    "'introduction'" => 'Minecraft administration'
                    );
    add_option("minecraft_data", $default_option, "", "yes");

    /* Ceate new table */
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

    global $wpdb;
    $db_table_name = $wpdb->prefix . 'minecraft';

    if( $wpdb->get_var( "SHOW TABLES LIKE '$db_table_name'" ) != $db_table_name ) {
        if ( ! empty( $wpdb->charset ) )
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if ( ! empty( $wpdb->collate ) )
            $charset_collate .= " COLLATE $wpdb->collate";
 
        $sql = "
                CREATE TABLE " . $db_table_name . " (
                    id int(11) NOT NULL AUTO_INCREMENT,
                    name varchar(255) DEFAULT NULL, 
                    description varchar(255) DEFAULT NULL,
                    host varchar(255) DEFAULT NULL,
                    status int(1) DEFAULT NULL,
                    version varchar(255) DEFAULT NULL,
                    sshurl varchar(255) DEFAULT NULL,
                    sshlogin varchar(255) DEFAULT NULL,
                    sshpassword varchar(255) DEFAULT NULL,                   
                    adminurl varchar(255) DEFAULT NULL,
                    adminlogin varchar(255) DEFAULT NULL,
                    adminpassword varchar(255) DEFAULT NULL,                   
                    audiochaturl varchar(255) DEFAULT NULL,
                    audiochatlogin varchar(255) DEFAULT NULL,
                    audiochatpassword varchar(255) DEFAULT NULL,                   
		    mapurl varchar(255) DEFAULT NULL,
		    editorurl varchar(255) DEFAULT NULL,
                    nbplugin int(3) DEFAULT NULL,
                    listplugin varchar(255) DEFAULT NULL,
                    nbplayer int(3) DEFAULT NULL,
                    maxplayer int(3) DEFAULT NULL,
		    createdon varchar(255) DEFAULT NULL,
  		    updatedon varchar(255) DEFAULT NULL,
                    PRIMARY KEY (`id`)
                ) $charset_collate;
            ";
        dbDelta( $sql );
    }

    minecraft_insert_data();

}

function minecraft_insert_data() {
    global $wpdb;

    $wpdb->insert( 
        'wp_minecraft', 
        array(  'id' => 1, 
                'name' => 'Minecraft', 
                'description' => '',
                'host' => 'http://192.168.1.1',
                'status' => '',
                'version' => '',

                'sshurl' => '',
                'sshlogin' => '',
                'sshpassword' => '',

                'adminurl' => '192.168.1.1',
                'adminlogin' => '',
                'adminpassword' => '',

                'audiochaturl' => '',
                'audiochatlogin' => '',
                'audiochatpassword' => '',

		'mapurl' => '/mapmc',
		'editorurl' => 'script.php',

                'nbplugin' => '',
                'listplugin' => '',
                'nbplayer' => '',
                'maxplayer' => '',

		'createdon' => '',
		'updatedon' => ''
                ), 
        array(  '%d', '%s', '%s', '%s' , '%d', '%s',
                '%s', '%s', '%s' ,
                '%s', '%s', '%s' ,
                '%s', '%s', '%s' ,
		
		'%s', '%s',

                '%d', '%s',
                '%d', '%d',

		'%d', '%d'
              ) 
    );

}

/* Deletes the database field */
function minecraft_remove() {
    delete_option('minecraft_data');
    
    /* Delete table */
    global $wpdb;
    $thetable = $wpdb->prefix."minecraft";
    $wpdb->query("DROP TABLE IF EXISTS $thetable");
}

/*
Display administration page
*/
if ( is_admin() ) {

    function minecraft_menu() {

        add_options_page('Minecraft Administration', 'Minecraft Administration', 'administrator', basename(__FILE__), 'minecraft_option');

        add_menu_page('Minecraft Administration', 'Minecraft Administration', 'manage_options', 'mcAdminHomepage', 'mcAdminHomepage', plugins_url('MinecraftAdministration/image/icon.png'));
	add_submenu_page('mcAdminHomepage', 'List Server', 'List Server', 'manage_options', 'listServer', 'listServer');
        add_submenu_page('mcAdminHomepage', 'Create Server', 'Create Server', 'manage_options', 'createServer', 'createServer'); 
 
        //this submenu is HIDDEN, however, we need to add it anyways
        add_submenu_page(null, 'Update Server', 'Update', 'manage_options', 'updateServer', 'updateServer');
        add_submenu_page(null, 'View Server', 'View', 'manage_options', 'viewServer', 'viewServer');
        add_submenu_page(null, 'Admin Server', 'Admin', 'manage_options', 'adminServer', 'adminServer');
        add_submenu_page(null, 'Map Server', 'Map', 'manage_options', 'mapServer', 'mapServer');
	add_submenu_page(null, 'Editor Server', 'Editor', 'manage_options', 'editorServer', 'editorServer');

    }

    add_action('admin_menu','minecraft_menu');

    function minecraft_option() {
        include('admin/minecraft_option.php');
    } 
}

function mcAdmin() {
echo "<h2>Minecraft Administration</h2> ";
}

// mcAdmin_page() displays the page content
function mcAdmin_page() {
echo "</pre>
<h2>Minecraft Administration</h2>
<pre>
";
}
 
/*
Add stylesheet and javascript in header
*/
function addHeader() {
   print '<link media="screen" type="text/css" href="/wp-content/plugins/minecraft/css/style.css" rel="stylesheet">';
   print '<script type="text/javascript" src="/wp-content/plugins/minecraft/js/main.js"></script>';
}
add_action('wp_head', 'addHeader');


/*
Get server from db by id
*/

function getServerById($id) {
    global $wpdb;

    $table_name = $wpdb->prefix . 'minecraft';

    $row = $wpdb->get_row( $wpdb->prepare('SELECT * FROM '.$table_name.' WHERE id = %d', $id) );

    return $row;
}

/*
Shortcut : [minecraftintro_shortcode]
*/
function displayMinecraftAdministrationIntroShortCode() {
    $minecraft_data = get_option('minecraft_data');
    $version = $minecraft_data["'version'"];
    $description = $minecraft_data["'description'"];

    $default_minecraft = "
        Minecraft Administration  <br/>
        Version : <span class='minecraft_title'> $version  </span> <br/>
        Introduction  : <span class='minecraft_title'> $description  </span> <br/>
        <br/>
    ";
    return apply_filters('minecraft', $default_minecraft);
}
add_shortcode( 'minecraftadministrationintro_shortcode', 'displayMinecraftAdministrationIntroShortCode' );


/*
Shortcut : [minecraftserver_shortcode id="<server id>"]
*/
function displayMinecraftServerShortCode($id) {
    extract(shortcode_atts(array(
        'id' => 'id'
    ), $id));

    $server =  getServerById($id);
    $server = $server->name;

    $default_minecraft = "
        $server
    ";
    return apply_filters('minecraft', $default_minecraft);
}
add_shortcode( 'minecraftserver_shortcode', 'displayMinecraftServerShortCode' );





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
        <span class='minecraft_title'> " . get_option('minecraft_data'). " </span>
        ";
 }

  return $content;
}
//add_filter('the_content', 'displayTextAfterPost');

// Add settings link on plugin page
function minecraft_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=minecraft.php">Parameter</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'minecraft_settings_link' );


define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'mcAdminHomepage.php');
require_once(ROOTDIR . 'server/listServer.php');
require_once(ROOTDIR . 'server/createServer.php');
require_once(ROOTDIR . 'server/updateServer.php');
require_once(ROOTDIR . 'server/viewServer.php');
require_once(ROOTDIR . 'server/adminServer.php');
require_once(ROOTDIR . 'server/mapServer.php');
require_once(ROOTDIR . 'server/editorServer.php');

?>
