<?php if (get_option('wp_showlogin') == "show") { ?>
	
	<div id="slide-panel"><!--SLIDE PANEL STARTS-->
	<?php if ( ! is_user_logged_in() ){ ?>
	
	<div class="loginform">
	<h2><?php echo get_option('wp_logintext')  ?></h2>
	<div class="formdetails">
	<form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
	<label for="log">Username : </label><input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" />&nbsp;&nbsp;&nbsp;&nbsp;
	<label for="pwd">Password : </label><input type="password" name="pwd" id="pwd" size="20" />
	<input type="submit" name="submit" value="Login" class="button" />
	<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label><input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
	</form>
	</div>
	<div class="loginregister">
	<a href="<?php echo get_option('home'); ?>/wp-register.php">Register</a> |
	<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Recover password</a>
	</div>
	</div><!--loginform ends-->
	
	<?php } else { ?>
	
	<div class="loginform logout">
	<h2><?php echo get_option('wp_controlpaneltext')  ?></h2>
	<ul>
	<?php if (get_option('wp_logindashboard') == "show") { ?>
		<li><a href="<?php bloginfo('url'); ?>/wp-admin/"><?php echo get_option('wp_logindashboardtext') ?></a></li> |
	<?php } ?>
	
	<?php if (get_option('wp_loginlisting') == "show") { ?>
		<li><a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php?post_type=listing"><?php echo get_option('wp_loginlistingtext') ?></a></li> |
	<?php } ?>
	
	<?php if (get_option('wp_loginpost') == "show") { ?>
		<li><a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php"><?php echo get_option('wp_loginposttext') ?></a></li> |
	<?php } ?>
	
	<li><a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" title="Logout">Logout</a></li></ul>
	</div><!--loginform ends-->
	<?php }?>
	</div><!--SLIDE PANEL ENDS-->
	<div class="loginslide"><a href="#" class="btn-slide"><?php if ( ! is_user_logged_in() ){ ?><?php echo get_option('wp_logintext')  ?><?php } else { ?><?php echo get_option('wp_logouttext')  ?><?php }?></a></div><!--LOGIN BUTTON TEXT-->
	
<?php } ?>