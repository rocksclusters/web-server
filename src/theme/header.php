<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<link rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
<meta name="Robots" content="index,follow" />
<meta http-equiv="imagetoolbar" content="no" /><!-- disable IE's image toolbar -->
<?php
global $page_sort;	
	if(get_settings('SymiSun_sortpages')!='')
	{ 
		$page_sort = 'sort_column='. get_settings('SymiSun_sortpages');
	}	
	global $pages_to_exclude;
	
	if(get_settings('SymiSun_excludepages')!='')
	{ 
		$pages_to_exclude = 'exclude='. get_settings('SymiSun_excludepages');
	}	
?>
<?php wp_head(); ?>
</head>

<body>
<div id="daddy">
	<div id="header">

		<div id="logo"><a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" width="318" height="85" /></a><span id="logo-text"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></span></div><!-- logo -->

		<div id="menu">

			<ul>
            <li<?php if ( is_home() or is_archive() or is_single() or is_paged() or is_search() or (function_exists('is_tag') and is_tag()) ) { echo ' class="current_page_item"'; } ?>><a href="<?php echo get_option('home'); ?>">Home</a></li>
           <?php wp_list_pages('title_li=&depth=1&'.$page_sort.'&'.$pages_to_exclude)?>
			</ul>

		</div><!-- menu -->

		<div id="ticker">
			The Rocks Cluster Distribution
		</div><!-- ticker -->

		<div id="headerimage">
			<div id="download"><span id="download-text">Rocks</span></div>

			<div id="slogan"><?php bloginfo('description'); ?></div>
		</div>
		<!-- headerimage -->
	</div>
	<!-- header -->
