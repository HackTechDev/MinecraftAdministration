<?php

function mcAdminHomepage () {

    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
    <h2>Minecraft Server Administration Panel</h2>



<div id="welcome-panel" class="welcome-panel">
   <div class="welcome-panel-content">
      <h3>Manage your Minecraft Servers Now!</h3>
      <p class="about-description">Create/List/Update/Delete your server.</p>
      <div class="welcome-panel-column-container">
         <div class="welcome-panel-column">
            <h4>Start here:</h4>
            <a class="button button-primary button-hero load-customize hide-if-no-customize" href="/wp-admin/admin.php?page=createServer">New server</a>
            <br/>or<br/>
            <a class="button button-primary button-hero load-customize hide-if-no-customize" href="/wp-admin/admin.php?page=listServer">List existing server</a>
	    <br/><br/>
         </div>
         <div class="welcome-panel-column">
            <h4>Basic Action</h4>
            <ul>
               <li><a href="#" class="welcome-icon welcome-view-site">Show the map</a></li>
            </ul>
         </div>
         <div class="welcome-panel-column welcome-panel-last">
            <h4>Advanced Action</h4>
            <ul>
               <li><a href="#" class="welcome-icon welcome-learn-more">Edit the map with Python script</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>





<div id="dashboard-widgets-wrap">
   <div id="dashboard-widgets" class="metabox-holder">

      <div id="postbox-container-1" class="postbox-container">
         <div id="normal-sortables" class="meta-box-sortables ui-sortable">

            <div id="dashboard_right_now" class="postbox ">
               <h3 class="hndle"><span>In-game screenshot</span></h3>
               <div class="inside">
                  <div class="main">
                     <p id="wp-version-message">My Minecraft World</a>.</p>
		     <img src="/wp-content/uploads/2014/10/output-300x227.png">
                  </div>
               </div>
            </div>


	    <!--
            <div id="dashboard_activity" class="postbox ">
               <h3 class="hndle"><span>Activité</span></h3>
               <div class="inside">
                  <div id="activity-widget">
                     <div id="published-posts" class="activity-block">
                        <h4>Publié récemment</h4>
                        <ul>
                           <li><span>12 oct, 17 h 01 min</span> <a href="http://nekrocite.info/wp-admin/post.php?post=20&amp;action=edit">Carte Minecraft</a></li>
                           <li><span>29 sept, 22 h 38 min</span> <a href="http://nekrocite.info/wp-admin/post.php?post=15&amp;action=edit">Administration : milkAdmin</a></li>
                           <li><span>27 sept, 10 h 10 min</span> <a href="http://nekrocite.info/wp-admin/post.php?post=1&amp;action=edit">Serveur Minecraft</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
	    -->

         </div>
      </div>

<!--
      <div id="postbox-container-2" class="postbox-container">
         <div id="side-sortables" class="meta-box-sortables ui-sortable">
            <div id="dashboard_primary" class="postbox ">
               <h3 class="hndle"><span>Nouvelles de WordPress</span></h3>
               <div class="inside">
                  <div class="rss-widget">
                     <ul>
                        <li>
                           <a class="rsswidget" href="http://feedproxy.google.com/~r/WordpressFrancophone/~3/osH2m0-PhXg/">Retour sur WordCamp Europe</a> <span class="rss-date">7 octobre 2014</span>
                           <div class="rssSummary">Le week-end du 27-29 septembre, plus de 900 personnes venant du monde entier se sont retrouvées à Sofia, Bulgarie, pour le 2e annuel WordCamp Europe. Sur un fond postsoviétique, meublé de béton, de passages souterrains et câbles électriques pondus partout comme des guirlandes de Noël, la communauté WordPress s’est réunie autour d’un idéalisme le plus […]</div>
                        </li>
                     </ul>
                  </div>
                  <div class="rss-widget">
                     <ul>
                        <li><a class="rsswidget" href="http://lashon.fr/divi-theme-wordpress-premium-gratuit/">Lashon : Cadeau Gratuit : Divi, le dernier grand theme wordpress premium gratuit</a></li>
                        <li><a class="rsswidget" href="http://wpchannel.com/condition-verifier-auteur-publie-article-wordpress/">WordPress Channel : Vérifier si un auteur a publié au moins un article sous WordPress</a></li>
                        <li><a class="rsswidget" href="http://www.seomix.fr/desactivez-pagination-wordpress/">SEOMix : SX No Pagination : désactivez la pagination de WordPress</a></li>
                     </ul>
                  </div>
                  <div class="rss-widget">
                     <ul>
                        <li class="dashboard-news-plugin"><span>Extensions populaires:</span> <a href="http://wordpress.org/plugins/black-studio-tinymce-widget/" class="dashboard-news-plugin-link">Black Studio TinyMCE Widget</a>&nbsp;<span>(<a href="plugin-install.php?tab=plugin-information&amp;plugin=black-studio-tinymce-widget&amp;_wpnonce=620b646f1a&amp;TB_iframe=true&amp;width=772&amp;height=371" class="thickbox" title="Black Studio TinyMCE Widget">Installer</a>)</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
-->


   </div>
</div>























    </div>
<?php
}
?>
