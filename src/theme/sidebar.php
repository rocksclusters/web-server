<div id="menu">
<ul>

<!-- Search field
<li>
<?php /* If this is a category archive */ if (is_category()) { ?>
<ul>
<li id="search">
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="20" /> <input type="submit" value="<?php _e('Search'); ?>" />
</form>
</li>
</ul>


<?php /* If this is a yearly archive */ } elseif (is_home()) { ?>
<ul>
<li id="search">
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="20" /> <input type="submit" value="<?php _e('Search'); ?>" />
</form>
</li>
</ul>

<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
<ul>
<li id="search">
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="20" /> <input type="submit" value="<?php _e('Search'); ?>" />
</form>
</li>
</ul>

<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<ul>
<li id="search">
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="20" /> <input type="submit" value="<?php _e('Search'); ?>" />
</form>
</li>
</ul>

<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<ul>
<li id="search">
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="20" /> <input type="submit" value="<?php _e('Search'); ?>" />
</form>
</li>
</ul>

<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
<ul>
<li id="search">
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="20" /> <input type="submit" value="<?php _e('Search'); ?>" />
</form>
</li>
</ul>

<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<ul>
<li id="search">
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="20" /> <input type="submit" value="<?php _e('Search'); ?>" />
</form>
</li>
</ul>

<?php /* If this is a monthly archive */ } elseif (is_page()) { ?>


<?php } ?>
</li>

-->

<!-- <?php get_links_list(); ?> -->

<?php if (function_exists('wp_theme_switcher')) { ?>
<li><h2><?php _e('Themes'); ?></h2>
<?php wp_theme_switcher('dropdown'); ?>
</li>
<?php } ?>

<li><h2><?php _e('Recent News'); ?></h2>
<ul>
<?php
	$i = 1;
	$posts_per_page = get_settings('posts_per_page');

	$posts_list = wp_get_recent_posts();
	foreach ($posts_list as $entry) {
		if ($entry['post_status'] == 'publish') {
			if ($i > $posts_per_page) {
				$headline = $entry['post_title'];
				$url = "/wordpress/?p=".$entry['ID'];
				echo "<li><a href=\"".$url."\">".$headline."</a></li>";
			}
			$i = $i + 1;
		}
	}
?>
</ul>
</li>

<li><h2><?php _e('Archives'); ?></h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>

<li id="meta"><h2><?php _e(''); ?></h2>
<ul>
<li><a href="<?php bloginfo('home') ?>/wp-rss2.php" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication"><img src="wp-content/themes/rocks/RSS.gif"></abbr>'); ?></a>
</li>

</ul>
</div>
<!-- end sidebar -->
