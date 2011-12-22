<div id="basicsearch">
        <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			<fieldset>
                <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
                <input type="image" src="<?php bloginfo('template_directory')?>/images/mag.jpg" id="go" alt="Search" title="Search" />
			</fieldset>
        </form>
</div>