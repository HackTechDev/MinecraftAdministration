<?php

function createServer () {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $host = $_POST["host"];
    $status = $_POST["status"];
    $version = $_POST["version"];
    $sshurl = $_POST["sshurl"];
    $sshlogin = $_POST["sshlogin"];
    $sshpassword = $_POST["sshpassword"];
    $adminurl = $_POST["adminurl"];
    $adminlogin = $_POST["adminlogin"];
    $adminpassword = $_POST["adminpassword"];
    $audiochaturl = $_POST["audiochaturl"];
    $audiochatlogin = $_POST["audiochatlogin"];
    $audiochatpassword = $_POST["audiochatpassword"];
    $plugin = $_POST["plugin"];
    $player = $_POST["player"];

    if(isset($_POST['insert'])){
        global $wpdb;
        $wpdb->insert(
            'wp_minecraft',
            array(  'name' => $name, 'description' => $description, 'host' => $host, 'status' => $status, 'version' => $version, 
                    'sshurl' => $sshurl, 'sshlogin' => $sshlogin, 'sshpassword' => $sshpassword,
                    'adminurl' => $adminurl, 'adminlogin' => $adminlogin, 'adminpassword' => $adminpassword,
                    'audiochaturl' => $audiochaturl, 'audiochatlogin' => $audiochatlogin, 'audiochatpassword' => $audiochatpassword, 
                    'plugin' => $plugin, 'player' => $player
                  ),
            array(  '%s', '%s' , '%s' , '%d', '%s',
                    '%s', '%s', '%s' ,
                    '%s', '%s', '%s' ,
                    '%s', '%s', '%s' ,
                    '%d', '%d'
		)
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
                <a href="<?php echo admin_url('admin.php?page=listServer')?>">&laquo; Back to server list</a>
            <?php endif;?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th>Name</th>
                    <td>
                        <input type="text" name="name" value="<?php echo $name;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <input type="text" name="link" value="<?php echo $description;?>"/>
                    </td>
                </tr>

                 <tr>
                    <th>Host</th>
                    <td>
                        <input type="text" name="host" value="<?php echo $host;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input type="text" name="status" value="<?php echo $status;?>"/>
                    </td>
                </tr>
                 <tr>
                    <th>Version</th>
                    <td>
                        <input type="text" name="version" value="<?php echo $version;?>"/>
                    </td>
                </tr>
   


                 <tr>
                    <th>Ssh url</th>
                    <td>
                        <input type="text" name="sshurl" value="<?php echo $sshurl;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Ssh login</th>
                    <td>
                        <input type="text" name="sshlogin" value="<?php echo $sshlogin;?>"/>
                    </td>
                </tr>
                 <tr>
                    <th>Ssh password</th>
                    <td>
                        <input type="text" name="sshpassword" value="<?php echo $sshpassword;?>"/>
                    </td>
                </tr>
 
                 <tr>
                    <th>Admin url</th>
                    <td>
                        <input type="text" name="adminurl" value="<?php echo $adminurl;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Admin login</th>
                    <td>
                        <input type="text" name="adminlogin" value="<?php echo $adminlogin;?>"/>
                    </td>
                </tr>
                 <tr>
                    <th>Admin password</th>
                    <td>
                        <input type="text" name="adminpassword" value="<?php echo $adminpassword;?>"/>
                    </td>
                </tr>
 
                 <tr>
                    <th>Audio chat url</th>
                    <td>
                        <input type="text" name="audiochaturl" value="<?php echo $audiochaturl;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Audio chat login</th>
                    <td>
                        <input type="text" name="audiochatlogin" value="<?php echo $audiochatlogin;?>"/>
                    </td>
                </tr>
                 <tr>
                    <th>Audio chat password</th>
                    <td>
                        <input type="text" name="audiochatpassword" value="<?php echo $audiochatpassword;?>"/>
                    </td>
                </tr>

            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
<?php
}
?>
