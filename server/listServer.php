<?php
function listServer () {
?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Server List</h2>
            <a href="<?php echo admin_url('admin.php?page=createServer'); ?>">Create a server</a>
    <?php
    global $wpdb;
    $rows = $wpdb->get_results("SELECT id, name, description, host, status, adminurl, mapurl, editorurl, nbplayer, maxplayer from wp_minecraft");
    echo "<table class='wp-list-table widefat fixed'>";
    echo "<tr><th width='40px'>id</th>
        <th width='200px'>name</th><th width='200px'>description</th><th width='200px'>host</th><th width='70px'>status</th><th width='70px'>player</th>
        <th>&nbsp;</th></tr>";
    foreach ($rows as $row ){
        echo "<tr>";
        echo "<td>$row->id</td>";
        echo "<td>$row->name</td>";	
        echo "<td>$row->description</td>"; 
        echo "<td>$row->host</td>";	
        echo "<td>$row->status</td>";
        echo "<td>$row->nbplayer/$row->maxplayer</td>";
        echo "<td>
		<a href='" . admin_url('admin.php?page=viewServer&id=' . $row->id) . "'>View</a>|
		<a href='" . admin_url('admin.php?page=updateServer&id=' . $row->id) . "'>Update</a>|
		<a href='" . admin_url('admin.php?page=adminServer&id=' . $row->id) . "'>Admin</a>|
		<a href='" . admin_url('admin.php?page=mapServer&id=' . $row->id) . "'>Map</a>|
		<a href='" . admin_url('admin.php?page=editorServer&id=' . $row->id) . "'>Editor</a>
		</td>";
        echo "</tr>";}
    echo "</table>";
    ?>
    </div>
<?php
}
?>
