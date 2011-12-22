<div id="social">
 
<a class="twitter" href="http://twitter.com/home/?status=<?php echo $name . " " ?><?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!"><?php echo get_option('wp_twittertooltip2') ?></a>

<a class="stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php echo $name; ?>" title="<?php echo get_option('wp_stumbleupontooltip') ?>"><?php echo get_option('wp_stumbleupontooltip') ?></a>
<a class="reddit" href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php echo $name; ?>" title="<?php echo get_option('wp_reddittooltip') ?>"><?php echo get_option('wp_reddittooltip') ?>
</a>
<a class="digg" href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php echo $name; ?>" title="<?php echo get_option('wp_diggtooltip') ?>"><?php echo get_option('wp_diggtooltip') ?></a>

<a class="delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;amp;title=<?php echo $name; ?>" title="<?php echo get_option('wp_delicioustooltip') ?>"><?php echo get_option('wp_delicioustooltip') ?></a>

<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php echo $name; ?>" title="<?php echo get_option('wp_facebooktooltip2') ?>"><?php echo get_option('wp_facebooktooltip2') ?>
</a>

<a class="rss" title="<?php echo get_option('wp_rsstooltip') ?>" href="<?php bloginfo('rss2_url'); ?>&post_type=listing"><?php echo get_option('wp_rsstooltip') ?></a>

<a title="Print listing" class="printbutton" href="#" onclick="window.print(); return false;">Print</a>

</div>
<div class="clearleft"></div>









				
