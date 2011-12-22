<?php // Do not delete these lines or your computer will implode
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
        echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
        return;
}

 /* This variable is for alternating comment background */
 $oddcomment = 'alt';
?>
        <!-- for comments -->
        <?php if ( have_comments() ) { ?>

        
                <?php if ( ! empty($comments_by_type['comment']) ) { ?>

                        <h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>
                        <ul class="commentlist">
                                <?php wp_list_comments('avatar_size=75&type=comment'); ?>
                        </ul>

                <?php } ?>
                
                <?php if ( ! empty($comments_by_type['pings']) ) { ?>
                <h2 id="pings">Trackbacks/Pingbacks</h2>

                <ul class="commentlist">
                <?php wp_list_comments('type=pings'); ?>
                </ul>
                <?php } ?>
                
                        <div class="navigation">
                                <span class="nextlink"><?php previous_comments_link() ?></span>
                                <span class="previouslink"><?php next_comments_link() ?></span>
                        </div>

<?php } else { // this is displayed if there are no comments so far ?>

        <?php if ('open' == $post->comment_status) { ?>
                <!-- If comments are open, but there are no comments. -->

        <?php } else { // comments are closed ?>
                <!-- If comments are closed. -->
                <p class="nocomments">Comments are closed.</p>

        <?php } ?>
<?php } ?>
        
                

         <?php if ('open' == $post-> comment_status) : ?>
         <?php endif; // If registration required and not logged in ?>


 
 
<div id="respond">
 <div id="commentsform">
  <form action="<?php echo get_settings('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php comment_form_title( '<h3>Leave a Reply</h3>', '<h3>Leave a Reply to %s </h3>' ); ?>
<div id="cancel-comment-reply"><p><?php cancel_comment_reply_link() ?></p></div>

  <?php comment_id_fields(); ?>

   <?php if ( $user_ID ) : ?>
   <p>Logged in as <a href="<?php echo get_settings('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_settings('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"> (Logout) </a> </p>
   <?php else : ?>
    <p><label for="author">Name <?php if ($req) echo "<span>(required)</span>"; ?></label><br />
     <input type="text" name="author" id="s1" value="<?php echo $comment_author; ?>" size="40" tabindex="1" />
    </p>
    <p><label for="email">Mail (will not be published) <?php if ($req) echo "<span>(required)</span>"; ?></label><br />
     <input type="text" name="email" id="s2" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" />
    </p>
    <p><label for="url">Website</label><br />
     <input type="text" name="url" id="s3" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" />
    </p>
   <?php endif; ?>
    <p class="allowedtags"><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>
    <p>
     <textarea name="comment" id="comment" cols="45" rows="10" tabindex="4"></textarea>
    </p>
    <p>
         <button class="button" type="submit" id="sbutt" tabindex="5">Submit Comment</button>
    </p>
       <?php do_action('comment_form', $post->ID); ?>
  </form>
  </div>
 </div><!-- end #commentsform -->