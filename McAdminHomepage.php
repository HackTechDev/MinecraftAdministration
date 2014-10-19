<?php

function McAdminHomepage () {

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
            <a class="button button-primary button-hero load-customize hide-if-no-customize" href="/wp-admin/admin.php?page=createMcServer">New server</a>
            <br/>or<br/>
            <a class="button button-primary button-hero load-customize hide-if-no-customize" href="/wp-admin/admin.php?page=listMcServer">List existing server</a>
	    <br/><br/>
         </div>
         <div class="welcome-panel-column">
            <h4>Basic Action</h4>
            <ul>
               <li><a href="/wp-admin/admin.php?page=adminMcServer&id=1" class="welcome-icon welcome-view-site">Administrate the server</a></li>
            </ul>
            <ul>
               <li><a href="/wp-admin/admin.php?page=mapMcServer&id=1" class="welcome-icon welcome-view-site">Show the map</a></li>
            </ul>
            <ul>
               <li><a href="/wp-admin/admin.php?page=avatarSkin" class="welcome-icon welcome-view-site">Display the avatar skin</a></li>
            </ul>

         </div>
         <div class="welcome-panel-column welcome-panel-last">
            <h4>Advanced Action</h4>
            <ul>
               <li><a href="/wp-admin/admin.php?page=editorMcServer&id=1" class="welcome-icon welcome-learn-more">Edit the map with Python script</a></li>
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
                           <li><span>12 oct, 17 h 01 min</span> <a href="/wp-admin/post.php?post=20&amp;action=edit">Carte Minecraft</a></li>
                           <li><span>29 sept, 22 h 38 min</span> <a href="/wp-admin/post.php?post=15&amp;action=edit">Administration : milkAdmin</a></li>
                           <li><span>27 sept, 10 h 10 min</span> <a href="/wp-admin/post.php?post=1&amp;action=edit">Serveur Minecraft</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
	    -->

         </div>
      </div>


      <div id="postbox-container-2" class="postbox-container">
         <div id="side-sortables" class="meta-box-sortables ui-sortable">
            <div id="dashboard_primary" class="postbox ">
               <h3 class="hndle"><span>News</span></h3>
               <div class="inside">
                  <div class="rss-widget">
                     <ul>
                        <li>
                           <a class="rsswidget" href="#">Script</a> <span class="rss-date">October 2014</span>
                           <div class="rssSummary">Python script to create a pillar</div>
                        </li>
                     </ul>
                  </div>
                  <div class="rss-widget">
                     <ul>
                        <li><a class="rsswidget" href="#">Map viewer</a> <span class="rss-date">October 2014</span>
                           <div class="rssSummary">Map generator and viewer</div>
			</li>
                     </ul>
                  </div>
                  <div class="rss-widget">
                     <ul>
			<li><a class="rsswidget" href="#">Server administration</a> <span class="rss-date">October 2014</span>
                           <div class="rssSummary">Administration panel to manage Minecraft servers</div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>



   </div>
</div>























    </div>
<?php
}
?>
