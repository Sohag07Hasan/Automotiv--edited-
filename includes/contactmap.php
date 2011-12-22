<script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        </script><script src="http://maps.google.com/maps?file=api&v=2&key=<?php echo get_option('wp_map_api') ?>" type="text/javascript"></script>
        <script src="http://www.google.com/uds/api?file=uds.js&v=1.0&source=uds-msw&key=<?php echo get_option('wp_map_api') ?>" type="text/javascript"></script>
        
        <style type="text/css">
          @import url("http://www.google.com/uds/css/gsearch.css");
        </style>
        
        <!-- Map Search Control and Stylesheet -->
        <script type="text/javascript">
          window._uds_msw_donotrepair = true;
        </script>
        
        <script src="http://www.google.com/uds/solutions/mapsearch/gsmapsearch.js?mode=new" type="text/javascript"></script>
        
        <style type="text/css">
          @import url("http://www.google.com/uds/solutions/mapsearch/gsmapsearch.css");
        </style>
        
        <script type="text/javascript">
          function LoadMapSearchControl() {
        
            var options = {
                  zoomControl : GSmapSearchControl.ZOOM_CONTROL_ENABLE_ALL,
                  title : "Property Details",
                  url : "<?php the_permalink(); ?>",
                  idleMapZoom : GSmapSearchControl.ACTIVE_MAP_ZOOM,
                  activeMapZoom : GSmapSearchControl.ACTIVE_MAP_ZOOM
                  }
				  
      
            new GSmapSearchControl(
                  document.getElementById("contactmap"),
                  "<?php echo get_option('wp_contactmap') ?>",
                  options
                  );
        
          }
          GSearch.setOnLoadCallback(LoadMapSearchControl);
        </script>