<?php 
    $quizzcontest_data = get_option('quizzcontest_data'); 
?>
<div>
    <h2>Quizz Contest : Question/Réponse</h2>
    <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>

        <table width="510">
            <tr valign="top">
                <th width="92" scope="row">Question 1: </th>
                <td width="406">
                    <input name="quizzcontest_data['question1']" type="text" id="quizzcontest_data['question1']" value="<?php echo $quizzcontest_data["'question1'"]; ?>" />
               </td>
            </tr>
            <tr valign="top">
                <th width="92" scope="row">Question 2: </th>
                <td width="406">
                    <input name="quizzcontest_data['question2']" type="text" id="quizzcontest_data['question2']" value="<?php echo $quizzcontest_data["'question2'"]; ?>" />
               </td>
            </tr>

        </table>

        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="quizzcontest_data" />

        <p>
            <input type="submit" value="<?php _e('Save Changes') ?>" />
        </p>

    </form>
</div>
