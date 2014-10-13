<?php

function createServer () {
    $server = $_POST["server"];
    $link = $_POST["link"];

    if(isset($_POST['insert'])){
        global $wpdb;
        $wpdb->insert(
            'wp_minecraft',
            array('server' => $server, 'link' => $link),
            array('%s', '%s') 			
        );
        $message .= "Create Server";
    }
?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Create a server</h2>
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
                    <th>Server</th>
                    <td>
                        <input type="text" name="server" value="<?php echo $server;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Link</th>
                    <td>
                        <input type="text" name="link" value="<?php echo $link;?>"/>
                    </td>
                </tr>
     
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
<?php
}
?>
