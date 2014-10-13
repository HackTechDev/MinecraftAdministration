<?php 
    $minecraft_data = get_option('minecraft_data'); 
?>
<div>
    <h2>Minecraft Administration</h2>
    <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>

        <table width="510">
            <tr valign="top">
                <th width="92" scope="row">Version : </th>
                <td width="406">
                    <input name="minecraft_data['version']" type="text" id="minecraft_data['version']" value="<?php echo $minecraft_data["'version'"]; ?>" />
               </td>
            </tr>
            <tr valign="top">
                <th width="92" scope="row">Introduction : </th>
                <td width="406">
                    <input name="minecraft_data['introduction']" type="text" id="minecraft_data['introduction']" value="<?php echo $minecraft_data["'introduction'"]; ?>" />
               </td>
            </tr>

        </table>

        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="minecraft_data" />

        <p>
            <input type="submit" value="<?php _e('Save Changes') ?>" />
        </p>

    </form>
</div>
