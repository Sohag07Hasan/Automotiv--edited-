					<?php
					// count videos. First validate by making sure both URL and Embed have same amount of entries.
					$videoimages = explode("\n", get_post_meta($post->ID, 'video_thumbnail_value', true));
					$videourl = explode("\n", get_post_meta($post->ID, 'video_url_value', true));

					$videocount1 = count($videoimages);
					$videocount2 = count($videourl);
					
					

					if ($videocount1 >= 1 && get_post_meta($post->ID, 'video_thumbnail_value', true) != "" && $videocount1 == $videocount2) { 
					
					$videocount = $videocount1;

					}

					// count images
				
						$arr_images = get_gallery_images();
						$imagescount = count($arr_images);
						
					
					?>
					
					<?php if ($imagescount > 0) { ?>
						<img alt="<?php echo $imagescount; ?> images" class="icon imageicon" src="<?php bloginfo('template_directory') ?>/images/camera.png" title="<?php echo $imagescount; ?> images" />
					<?php } ?>
					<?php if ($videocount >= 1) { ?>
					
						<?php if($videocount == 1) {
							$videotext = "video";
						} else {
							$videotext = "videos";
						}
						?>
						<img alt="<?php echo $videocount; ?> videos" class="icon videoicon" src="<?php bloginfo('template_directory') ?>/images/video.png" title="<?php echo $videocount . " " . $videotext; ?>" />
					<?php }
					$imagescount = 0;
					$videocount = 0;
					?>
					