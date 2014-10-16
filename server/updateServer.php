<?php
function updateServer () {
    global $wpdb;
    $id = $_GET["id"];
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
    if(isset($_POST['update'])) {	
        
        $wpdb->update( $wpdb->prefix . 'minecraft',
            array(  'name' => $name, 'description' => $description, 'host' => $host, 'status' => $status, 'version' => $version, 
                    'sshurl' => $sshurl, 'sshlogin' => $sshlogin, 'sshpassword' => $sshpassword,
                    'adminurl' => $adminurl, 'adminlogin' => $adminlogin, 'adminpassword' => $adminpassword,
                    'audiochaturl' => $audiochaturl, 'audiochatlogin' => $audiochatlogin, 'audiochatpassword' => $audiochatpassword, 
                    'plugin' => $plugin, 'player' => $player
                    ), 
            array( 'id' => $id )
        );	
    }
    else if(isset($_POST['delete'])) {	
        $wpdb->query($wpdb->prepare("DELETE FROM " . $wpdb->prefix . "minecraft WHERE id = %s",$id));
    }
    else{
        $servers = $wpdb->get_results($wpdb->prepare("SELECT id, name, description, host, status, version, 
        sshurl, sshlogin, sshpassword,
        adminurl, adminlogin, adminpassword,
        audiochaturl, audiochatlogin, audiochatpassword,
        plugin, player
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

            $plugin = $server->plugin;
            $player = $server->player;

        }
    }


        $mcclient = new MinecraftApiClient($host);
        $mcserver = $mcclient->call();
	$nbplugin = (int)count($mcserver["plugins"]);
        $version = $mcserver["server"]["version"]["name"];

	$description = "";
	foreach($mcserver["plugins"] as $plugin) {
		$description .= $plugin["name"] . "\n";
	}

    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
    <h2>Server</h2>

    <?php if($_POST['delete']){ ?>
        <div class="updated"><p>Delete Server</p></div>
           <a href="<?php echo admin_url('admin.php?page=listServer')?>">&laquo; Back to server list</a>

    <?php } else if($_POST['update']) { ?>
        <div class="updated"><p>Update Server</p></div>
            <a href="<?php echo admin_url('admin.php?page=listServer')?>">&laquo; Back to server list</a>

    <?php } else { ?>
        <a href="<?php echo admin_url('admin.php?page=listServer')?>">&laquo; Back to server list</a>
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
<textarea rows="4" cols="50" name="description"><?php echo $description;?></textarea>
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

                <tr>
                    <th>Plugin</th>
                    <td>
                        <input type="text" name="plugin" value="<?php echo $nbplugin;?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Player</th>
                    <td>
                        <input type="text" name="player" value="<?php echo $player;?>"/>
                    </td>
                </tr>




            </table>
            <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
            <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('Do you want remove a server?')">
        </form>
    <?php }?>

    </div>
<?php
}
?>
