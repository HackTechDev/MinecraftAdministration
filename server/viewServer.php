<?php

function viewServer () {
    global $wpdb;
    $id = $_GET["id"];

        $servers = $wpdb->get_results($wpdb->prepare("SELECT id, name, description, host, status, version, 
        sshurl, sshlogin, sshpassword,
        adminurl, adminlogin, adminpassword,
        audiochaturl, audiochatlogin, audiochatpassword,
        nbplugin, listplugin,
	nbplayer, maxplayer
        from wp_minecraft where id=%s",$id));
        foreach ($servers as $server ) {
            $name = $server->name;
            $description = $server->description;
            $host = $server->host;
            $status = $server->status;
            $version = $server->version;

            $sshurl = $server->sshurl;
            $sshlogin = $server->sshlogin;
            $sshpassword = $server->sshpassword;

            $adminurl = $server->adminurl;
            $adminlogin = $server->adminlogin;
            $adminpassword = $server->adminpassword;

            $audiochaturl = $server->audiochaturl;
            $audiochatlogin = $server->audiochatlogin;
            $audiochatpassword = $server->audiochatpassword;

            $nbplugin = $server->nbplugin;
            $listplugin = $server->listplugin;

            $nbplayer = $server->nbplayer;
            $maxplayer = $server->maxplayer;

    }

    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
    <h2><?php echo ucfirst($name);?> Server</h2>

        <a href="<?php echo admin_url('admin.php?page=listServer')?>">&laquo; Back to server list</a>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th>Name</th>
                    <td>
                        <input type="text" name="name" value="<?php echo $name;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
			<textarea rows="4" cols="50" name="description" readonly><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Host</th>
                    <td>
                        <input type="text" name="host" value="<?php echo $host;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input type="text" name="status" value="<?php echo $status;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>Version</th>
                    <td>
                        <input type="text" name="version" value="<?php echo $version;?>" readonly />
                    </td>
                </tr>



                <tr>
                    <th>Ssh url</th>
                    <td>
                        <input type="text" name="sshurl" value="<?php echo $sshurl;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>Ssh login</th>
                    <td>
                        <input type="text" name="sshlogin" value="<?php echo $sshlogin;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>Ssh password</th>
                    <td>
                        <input type="text" name="sshpassword" value="<?php echo $sshpassword;?>" readonly />
                    </td>
                </tr>


                <tr>
                    <th>Admin url</th>
                    <td>
                        <input type="text" name="adminurl" value="<?php echo $adminurl;?>" readonly />
			<a href="/wp-admin/admin.php?page=adminServer&id=<?php echo $id; ?>">Go to</a>
                    </td>
                </tr>
                <tr>
                    <th>Admin login</th>
                    <td>
                        <input type="text" name="adminlogin" value="<?php echo $adminlogin;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>Admin password</th>
                    <td>
                        <input type="text" name="adminpassword" value="<?php echo $adminpassword;?>" readonly />
                    </td>
                </tr>

                <tr>
                    <th>Audio chat url</th>
                    <td>
                        <input type="text" name="audiochaturl" value="<?php echo $audiochaturl;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>Audio chat login</th>
                    <td>
                        <input type="text" name="audiochatlogin" value="<?php echo $audiochatlogin;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>Audio chat password</th>
                    <td>
                        <input type="text" name="audiochatpassword" value="<?php echo $audiochatpassword;?>" readonly />
                    </td>
                </tr>

                <tr>
                    <th>Nb Plugin</th>
                    <td>
                        <input type="text" name="nbplugin" value="<?php echo $nbplugin;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>List Plugin</th>
                    <td>
<textarea rows="4" cols="50" name="listplugin" readonly><?php echo $listplugin;?></textarea>
                    </td>
                </tr>

                <tr>
                    <th>Nb Player</th>
                    <td>
                        <input type="text" name="nbplayer" value="<?php echo $nbplayer;?>" readonly />
                    </td>
                </tr>


                <tr>
                    <th>Max Player</th>
                    <td>
                        <input type="text" name="maxplayer" value="<?php echo $maxplayer;?>" readonly />
                    </td>
                </tr>




            </table>
        </form>

    </div>
<?php
}
?>
