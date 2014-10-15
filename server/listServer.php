<?php
function listServer () {
?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Server List</h2>
            <a href="<?php echo admin_url('admin.php?page=createServer'); ?>">Create a server</a>
    <?php
    global $wpdb;
    $rows = $wpdb->get_results("SELECT id, name, description, host, status, plugin, player from wp_minecraft");
    echo "<table class='wp-list-table widefat fixed'>";
    echo "<tr><th>id</th>
        <th>name</th><th>description</th><th>host</th><th>status</th>
        <th>plugin</th><th>player</th>
        <th>&nbsp;</th></tr>";
    foreach ($rows as $row ){
        echo "<tr>";
        echo "<td>$row->id</td>";
        echo "<td>$row->name</td>";	
        echo "<td>$row->description</td>"; 
        echo "<td>$row->host</td>";	
        echo "<td>$row->status</td>";
        echo "<td>$row->plugin</td>";
        echo "<td>$row->player</td>"; 


        echo "<td><a href='" . admin_url('admin.php?page=updateServer&id=' . $row->id) . "'>Update</a></td>";
        echo "</tr>";}
    echo "</table>";
    ?>
    </div>
<?php
}
?>
