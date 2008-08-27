<div id="content">
		<div id="cA">
			<div class="Ctopleft"></div>
			<h3>SEARCH</h3>
			<div id="search">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" value="<?php the_search_query(); ?>" name="s" class="search" /><input type="submit" class="submit" value="Search" /></form>
			</div><!-- search -->
			<p>&nbsp;</p>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

<h3>Cluster Links</h3>
<ul>
	<?php wp_list_bookmarks('categorize=0&title_li='); ?>
</ul>

<h3>Archives</h3>
<ul>
	<?php wp_get_archives('title_li='); ?>
</ul>

<h3>Meta</h3>
<ul>
	<?php wp_register(); ?>
	<li><?php wp_loginout(); ?></li>
<!-- 
	<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
-->
	<?php wp_meta(); ?>
</ul>
				<?php endif; ?>

		</div><!-- cA -->

