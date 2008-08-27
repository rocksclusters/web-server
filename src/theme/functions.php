<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
register_sidebar(array('name'=>'sidebar2',
    'before_widget' => '',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3><div class="about">',
));

function unregister_problem_widgets() {
unregister_sidebar_widget('RSS 1');
unregister_sidebar_widget('Search');
}
add_action('widgets_init','unregister_problem_widgets');

function SymiSun_add_theme_page() {
	if ( $_GET['page'] == basename(__FILE__) ) {
	
	    // save settings
		if ( 'save' == $_REQUEST['action'] ) {

			update_option( 'SymiSun_asideid', $_REQUEST[ 's_asideid' ] );
			update_option( 'SymiSun_sortpages', $_REQUEST[ 's_sortpages' ] );
			if( isset( $_POST[ 'excludepages' ] ) ) { update_option( 'SymiSun_excludepages', implode(',', $_POST['excludepages']) ); } else { delete_option( 'SymiSun_excludepages' ); }
			// goto theme edit page
			header("Location: themes.php?page=functions.php&saved=true");
			die;

  		// reset settings
		} else if( 'reset' == $_REQUEST['action'] ) {

			delete_option( 'SymiSun_asideid' );
			delete_option( 'SymiSun_sortpages' );			
			delete_option( 'SymiSun_excludepages' );
			
			
			// goto theme edit page
			header("Location: themes.php?page=functions.php&reset=true");
			die;

		}
	}


    add_theme_page("WP SymiSun Options", "WP SymiSun Options", 'edit_themes', basename(__FILE__), 'SymiSun_theme_page');

}

function SymiSun_theme_page() {

	// --------------------------
	// SymiSun theme page content
	// --------------------------

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>WP SymiSun Theme: Settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>WP SymiSun Theme: Settings reset.</strong></p></div>';
	
?>
<style>
	.wrap { border:#ccc 1px dashed;}
	.block { margin:1em;padding:1em;line-height:1.6em;}
	table tr td {border:#ddd 1px solid;font-family:Verdana, Arial, Serif;font-size:0.9em;}
	h4 {font-size:1.3em;color:#265e15;font-weight:bold;margin:0;padding:10px 0;}	
</style>
<div class="wrap">
<form method="post">


<!-- blog layout options -->
<h2>Theme Settings</h2>

<p>Exclude pages and order them how you want using the fields below.</p>

<fieldset class="options">

<table width="100%" cellspacing="5" cellpadding="10" class="editform">
<tr>
<td valign="top" colspan="2" style="border:0px;margin:0;padding:0;">
	<input type="hidden" name="action" value="save" />
	<?php ml_input( "save", "submit", "", "Save Settings" );?>
</td>
</tr>
<tr valign="top">
<td align="left">
	<?php
	ml_heading("List Pages / Navigation");		
		global $wpdb;
		if (function_exists('wp_list_bookmarks')) //WP 2.1 or greater
			$results = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts WHERE post_type='page' AND post_parent=0 ORDER BY post_title");
		else
			$results = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts WHERE post_status='static' AND post_parent=0 ORDER BY post_title");
		
		$excludepages = explode(',', get_settings('SymiSun_excludepages'));
		if($results) {				
			_e('<br/>Check off the boxes of the pages you don\'t want to appear in the top menu.  There is only room for a few page links, and they may run off into another row (which won\'t look good) or simply not display at all in some browsers.<br/><br/>');
			foreach($results as $page) 
      {
			  echo '<input type="checkbox" name="excludepages[]" value="' . $page->ID . '"';
        if(in_array($page->ID, $excludepages)==true) { echo ' checked="checked"'; }
				echo ' /> <a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a><br />';
			}		
		}		
		_e('<br/><br/>');
		echo "<br/><strong>How you want to sort the pages</strong><br/>";
		
		ml_input( "s_sortpages", "radio", "Page title (alphabetically)", "post_title", get_settings( 'SymiSun_sortpages' ) );		
		ml_input( "s_sortpages", "radio", "Date published", "post_date", get_settings( 'SymiSun_sortpages' ) );		
		ml_input( "s_sortpages", "radio", "Page order", "menu_order", get_settings( 'SymiSun_sortpages' ) );
		echo "(You can define the page order while editing individual pages.)";
		echo "<br/>";			
?>
</td>
</tr>	
<tr>
<td valign="top" colspan="2" style="border:0px;margin:0;padding:0;">
	<input type="hidden" name="action" value="save" />
	<?php ml_input( "save", "submit", "", "Save Settings" );?>
</td>
</tr>
</table>
</fieldset>
</form>

<form method="post">

<fieldset class="options">
<legend>Reset</legend>

<p>If for whatever reason you want to "clean up" the settings set here or want to use another theme, click the <em>Reset Settings</em> button below.  To completely remove the theme, make sure to delete the <em>/wp-symisun/</em> folder in the <em>/wp-content/themes/</em> directory.</p>
<?php

	ml_input( "reset", "submit", "", "Reset Settings" );
	
?>

<h2>Support</h2>

<p>If you need any support with this particular theme, feel free to post your question in the <a href="http://www.themelab.com/forums/forum/wp-symisun">WP SymiSun support forum</a> over at <a href="http://www.themelab.com">Theme Lab</a>.</p>

</div>
<input type="hidden" name="action" value="reset" />
</form>

<?php
}
add_action('admin_menu', 'SymiSun_add_theme_page');


function ml_input( $var, $type, $description = "", $value = "", $selected="" ) {

	// ------------------------
	// add a form input control
	// ------------------------
	
 	echo "\n";
 	
	switch( $type ){
	
	    case "text":

	 		echo "<input name=\"$var\" id=\"$var\" type=\"$type\" style=\"width: 60%\" class=\"textbox\" value=\"$value\" />";
			
			break;
			
		case "submit":
		
	 		echo "<p class=\"submit\"><input name=\"$var\" type=\"$type\" value=\"$value\" /></p>";

			break;

		case "option":
		
			if( $selected == $value ) { $extra = "selected=\"true\""; }

			echo "<option value=\"$value\" $extra >$description</option>";
		
		    break;
  		case "radio":
  		
			if( $selected == $value ) { $extra = "checked=\"true\""; }
  		
  			echo "<label><input name=\"$var\" id=\"$var\" type=\"$type\" value=\"$value\" $extra /> $description</label><br/>";
  			
  			break;
  			
		case "checkbox":
		
			if( $selected == $value ) { $extra = "checked=\"true\""; }

  			echo "<label for=\"$var\"><input name=\"$var\" id=\"$var\" type=\"$type\" value=\"$value\" $extra /> $description</label><br/>";

  			break;

		case "textarea":
		
		    echo "<textarea name=\"$var\" id=\"$var\" style=\"width: 80%; height: 10em;\" class=\"code\">$value</textarea>";
		
		    break;
	}

}

function ml_heading( $title ) {

	// ------------------
	// add a table header
	// ------------------

   echo "<h4>" .$title . "</h4>";

}
?>
