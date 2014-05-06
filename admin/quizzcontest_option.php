<div>
    <h2>Quizz Contest : Question/Réponse</h2>
    <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>

        <table width="510">
            <tr valign="top">
                <th width="92" scope="row">Question </th>
                <td width="406">
                    <input name="quizzcontest_data" type="text" id="quizzcontest_data" value="<?php echo get_option('quizzcontest_data'); ?>" />
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
