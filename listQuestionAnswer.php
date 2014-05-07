<?php
function listQuestionAnswer () {
?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Question/Réponse</h2>
            <a href="<?php echo admin_url('admin.php?page=createQuestionAnswer'); ?>">Ajouter une Question/Réponse</a>
    <?php
    global $wpdb;
    $rows = $wpdb->get_results("SELECT id, question, answer from wp_quizzcontest_qa");
    echo "<table class='wp-list-table widefat fixed'>";
    echo "<tr><th>id</th><th>Question</th><th>Réponse</th><th>&nbsp;</th></tr>";
    foreach ($rows as $row ){
        echo "<tr>";
        echo "<td>$row->id</td>";
        echo "<td>$row->question</td>";	
        echo "<td>$row->answer</td>"; 
        echo "<td><a href='".admin_url('admin.php?page=updateQuestionAnswer&id=' . $row->id)."'>Modification</a></td>";
        echo "</tr>";}
    echo "</table>";
    ?>
    </div>
<?php
}
?>
