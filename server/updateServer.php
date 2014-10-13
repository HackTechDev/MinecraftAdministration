<?php
function updateServer () {
    global $wpdb;
    $id = $_GET["id"];
    $server = $_POST["server"];
    $link = $_POST["link"];

    if(isset($_POST['update'])) {	
        
        $wpdb->update( $wpdb->prefix . 'minecraft',
            array('server' => $server, 'link' => $link), array( 'id' => $id )
        );	
    }
    else if(isset($_POST['delete'])) {	
        $wpdb->query($wpdb->prepare("DELETE FROM " . $wpdb->prefix . "minecraft WHERE id = %s",$id));
    }
    else{
        $serverlinks = $wpdb->get_results($wpdb->prepare("SELECT id, server, link from wp_minecraft where id=%s",$id));
        foreach ($serverlinks as $serverlink ) {
            $server = $serverlink->server;
            $link = $serverlink->link;
        }
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
            <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
            <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('Do you want remove a server?')">
        </form>
    <?php }?>

    </div>
<?php
}
?>
