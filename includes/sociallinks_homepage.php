<div id="social">

			<?php if(get_option('wp_twitterusername')) { ?>
			<a class="twitter" href="http://twitter.com/<?php echo get_option('wp_twitterusername'); ?>" title="<?php echo get_option('wp_twittertooltip1') ?>"><?php echo get_option('wp_twittertooltip1') ?></a>
			<?php } ?>

			<?php if(get_option('wp_facebookpage')) { ?>
			<a class="facebook" href="<?php echo get_option('wp_facebookpage') ?>" title="<?php echo get_option('wp_facebooktooltip1') ?>"><?php echo get_option('wp_facebooktooltip1') ?></a>
			<?php } ?>
			
			<?php if(get_option('wp_linkedin')) { ?>
			<a class="linkedin" href="<?php echo get_option('wp_linkedin') ?>" title="<?php echo get_option('wp_linkedintooltip') ?>"><?php echo get_option('wp_linkedintooltip') ?></a>
			<?php } ?>
			
			
			<a class="rss" title="<?php echo get_option('wp_rsstooltip') ?>" href="<?php bloginfo('rss2_url'); ?>&post_type=listing"><?php echo get_option('wp_rsstooltip') ?></a>	
			
</div>
<div class="clearleft"></div>