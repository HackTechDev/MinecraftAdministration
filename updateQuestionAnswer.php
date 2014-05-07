<?php
function updateQuestionAnswer () {
    global $wpdb;
    $id = $_GET["id"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];

    if(isset($_POST['update'])) {	
        
        $wpdb->update( $wpdb->prefix . 'quizzcontest_qa',
            array('question' => $question, 'answer' => $answer), array( 'id' => $id )
        );	
    }
    else if(isset($_POST['delete'])) {	
        $wpdb->query($wpdb->prepare("DELETE FROM " . $wpdb->prefix . "quizzcontest_qa WHERE id = %s",$id));
    }
    else{
        $questionanswers = $wpdb->get_results($wpdb->prepare("SELECT id, question, answer from wp_quizzcontest_qa where id=%s",$id));
        foreach ($questionanswers as $questionanswer ) {
            $question = $questionanswer->question;
            $answer = $questionanswer->answer;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
    <h2>Question/Réponse</h2>

    <?php if($_POST['delete']){ ?>
        <div class="updated"><p>Suppression Question/Réponse</p></div>
           <a href="<?php echo admin_url('admin.php?page=listQuestionAnswer')?>">&laquo; Retour à la liste des Questions/Réponses</a>

    <?php } else if($_POST['update']) { ?>
        <div class="updated"><p>Modification Question/Réponse</p></div>
            <a href="<?php echo admin_url('admin.php?page=listQuestionAnswer')?>">&laquo; Retour à la liste des Questions/Réponses</a>

    <?php } else { ?>
        <a href="<?php echo admin_url('admin.php?page=listQuestionAnswer')?>">&laquo; Retour à la liste des Questions/Réponses</a>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th>Question</th>
                    <td>
                        <input type="text" name="question" value="<?php echo $question;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Question</th>
                    <td>
                        <input type="text" name="answer" value="<?php echo $answer;?>"/>
                    </td>
                </tr>

            </table>
            <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
            <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('Voulez-vous supprimer cette Question/Réponse ?')">
        </form>
    <?php }?>

    </div>
<?php
}
?>
