<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
function header_graphic() {
	$imagedir = 'wp-content/themes/rocks/images/';
	$linkdir = 'wp-content/themes/rocks/links/';

	// first count the number of images
	$n = 0;
	if ($handle = opendir($imagedir)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				$n = $n + 1;
			}
		}
		closedir($handle);
	}

	// pick a random image	
	$num = rand(0,$n - 1);

	// get the file name of the random image
	$n = 0;
	if ($handle = opendir($imagedir)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				if ($n == $num) {
					#echo $imagedir.$file;
					$filename = $imagedir.$file;
					break;
				}
				$n = $n + 1;
			}
		}
		closedir($handle);
	}

	// get the link for the random image
	$linkfile = $linkdir.$file.".link";
	$linkdata = file_get_contents($linkfile);
	if ($linkdata) {
		// read the contents of the 'link' file and use that for
		// the value of the link
		$link = "<a href=\"".$linkdata."\">";
	} else {
		// default link
		$link = "<a href=\"/\">";
	}

	// associate the file and the link
	$image = "<img height=\"274\" border=\"0\" src=\"".$filename."\"/>";
	echo $link.$image."</a>";
};

function rocks_get_links_list($order = 'name') {
	global $wpdb;

	$order = strtolower($order);

	// Handle link category sorting
	if (substr($order,0,1) == '_') {
		$direction = ' DESC';
		$order = substr($order,1);
	}

	// if 'name' wasn't specified, assume 'id':
	$cat_order = ('name' == $order) ? 'cat_name' : 'cat_id';

	if (!isset($direction)) $direction = '';
	// Fetch the link category data as an array of hashesa
	$cats = $wpdb->get_results("
		SELECT DISTINCT link_category, cat_name, show_images, 
			show_description, show_rating, show_updated, sort_order, 
			sort_desc, list_limit
		FROM `$wpdb->links` 
		LEFT JOIN `$wpdb->linkcategories` ON (link_category = cat_id)
		WHERE link_visible =  'Y'
			AND list_limit <> 0
		ORDER BY $cat_order $direction ", ARRAY_A);

	// Display each category
	if ($cats) {
		foreach ($cats as $cat) {
			// Handle each category.
			// First, fix the sort_order info
			$orderby = $cat['sort_order'];
			$orderby = (bool_from_yn($cat['sort_desc'])?'_':'') . $orderby;

			// Call get_links() with all the appropriate params
			get_links($cat['link_category'],
				'<li class="page_item">',"</li>","\n",
				bool_from_yn($cat['show_images']),
				$orderby,
				bool_from_yn($cat['show_description']),
				bool_from_yn($cat['show_rating']),
				$cat['list_limit'],
				bool_from_yn($cat['show_updated']));
		}
	}
}
?>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<!-- leave this for stats please -->
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />


<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>

<link rel="alternate" type="application/rss+xml"
	title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="text/xml"
	title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

<link rel="alternate" type="application/atom+xml"
	title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php wp_head(); ?>

</head>

<!-- BODY -->

<body>

<div id="rap">

<div id="navcontainer">
<ul>
<?php rocks_get_links_list(); ?>
<?php wp_list_pages('sort_column=menu_order&title_li=&depth=1'); ?>
</ul>
</div>

