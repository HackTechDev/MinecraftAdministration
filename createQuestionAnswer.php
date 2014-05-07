<?php

function createQuestionAnswer () {
    $question = $_POST["question"];
    $answer = $_POST["answer"];

    if(isset($_POST['insert'])){
        global $wpdb;
        $wpdb->insert(
            'wp_quizzcontest_qa',
            array('question' => $question, 'answer' => $answer),
            array('%s', '%s') 			
        );
        $message .= "Question/réponse ajouter";
    }
?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Ajouter une Question/Réponse</h2>
        <?php 
            if (isset($message)): ?>
                <div class="updated">
                    <p>
                        <?php echo $message;?>
                    </p>
                </div>
            <?php endif;?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th>Question</th>
                    <td>
                        <input type="text" name="question" value="<?php echo $question;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Réponse</th>
                    <td>
                        <input type="text" name="answer" value="<?php echo $answer;?>"/>
                    </td>
                </tr>
     
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
<?php
}
?>
