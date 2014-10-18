<?php
function editorMcServer () {
    global $wpdb;
    $id = $_GET["id"];

        $servers = $wpdb->get_results($wpdb->prepare("SELECT id, name, description, host, status, version, 
        sshurl, sshlogin, sshpassword,
        adminurl, adminlogin, adminpassword,
        audiochaturl, audiochatlogin, audiochatpassword,
	mapurl, editorurl,
        nbplugin, listplugin, nbplayer, maxplayer
        from wp_minecraft where id=%s",$id));
        foreach ($servers as $server ) {
            $name = $server->name;
            $description = $server->description;
            $host = $server->host;
            $status = $server->status;
            $version = $server->version;

            $adminurl = $server->adminurl;
	    $mapurl = $server->mapurl;
	    $editorurl = $server->editorurl;
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
    <h2><?php echo ucfirst($name);?> Server</h2>

        <a href="<?php echo admin_url('admin.php?page=listMcServer')?>">&laquo; Back to server list</a>
	<br/>
	<?php echo $name; ?>&nbsp;
	<?php echo $description; ?>&nbsp;
	<?php echo $host; ?>&nbsp;
	<?php echo $status; ?>&nbsp;
	<?php echo $version; ?>&nbsp;
	<br/>
	Direct url: <?php echo $editorurl; ?>&nbsp;<br/>

	<iframe src="/wp-content/plugins/MinecraftAdministration/server/<?php echo $editorurl; ?>" width="100%" height="400px">
    </div>
<?php
}
?>
