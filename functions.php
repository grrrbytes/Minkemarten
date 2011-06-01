<?php
/**
 * Marten Minkema functions and definitions
 *
 * @package WordPress
 * @subpackage Marten Minkema
 * @author Ilja Hehenkamp
 * @since ilja@hehenka.mp 0.1
 */

add_theme_support( 'post-thumbnails', array( 'radio', 'televisie', 'gedachten', 'publicaties' ) ); // Add it for posts

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'mm_setup' );

add_filter( 'disable_captions', create_function( '$a','return true;' ) );

if ( ! function_exists( 'mm_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function mm_setup() {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Hoofdmenu', 'Hoofdmenu' ),
		'secondary' => __( 'Submenu', 'Submenu' ),
	) );
}
endif;

add_action( 'init', 'create_post_types' );
add_action( 'init', 'create_taxonomies' );

function create_post_types() {
	register_post_type('publicaties', array(	'has_archive' => 'publicaties/archief', 'label' => 'Publicaties','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'publicaties'),'query_var' => true,'menu_position' => 5,'supports' => array('title','editor','excerpt','revisions','thumbnail',),'taxonomies' => array('post_tag',),'labels' => array (
	  'name' => 'Publicaties',
	  'singular_name' => 'Publicatie',
	  'menu_name' => 'Publicaties',
	  'add_new' => 'Toevoegen',
	  'add_new_item' => 'Voeg nieuwe publicatie toe',
	  'edit' => 'Aanpassen',
	  'edit_item' => 'Pas publicatie aan',
	  'new_item' => 'Nieuwe publicatie',
	  'view' => 'Bekijk',
	  'view_item' => 'Bekijk publicatie',
	  'search_items' => 'Doorzoek publicaties',
	  'not_found' => 'Geen publicaties gevonden',
	  'not_found_in_trash' => 'Geen publicaties in de prullenbak gevonden',
	  'parent' => 'Hoofd-item',
	),) );
	
	register_post_type('televisie', array(	'has_archive' => 'televisie/archief', 'label' => 'TV-items','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'televisie'),'query_var' => true,'menu_position' => 5,'supports' => array('title','editor','excerpt','revisions','thumbnail',),'taxonomies' => array('post_tag',),'labels' => array (
	  'name' => 'TV-items',
	  'singular_name' => 'TV-item',
	  'menu_name' => 'TV-items',
	  'add_new' => 'Toevoegen',
	  'add_new_item' => 'Voeg nieuw tv-item toe',
	  'edit' => 'Aanpassen',
	  'edit_item' => 'pas tv-item aan',
	  'new_item' => 'Nieuw tv-item',
	  'view' => 'Bekijk',
	  'view_item' => 'Bekijk tv-item',
	  'search_items' => 'Doorzoek tv-items',
	  'not_found' => 'Geen tv-items gevonden',
	  'not_found_in_trash' => 'Geen tv-items in de prullenbak gevonden',
	  'parent' => 'Hoofd-item',
	),) );
	
	register_post_type('radio', array(	'has_archive' => 'radio/archief', 'label' => 'Radio-items','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'radio'),'query_var' => true,'menu_position' => 5,'supports' => array('title','editor','excerpt','revisions','thumbnail',),'taxonomies' => array('post_tag',),'labels' => array (
	  'name' => 'Radio-items',
	  'singular_name' => 'Radio-item',
	  'menu_name' => 'Radio-items',
	  'add_new' => 'Toevoegen',
	  'add_new_item' => 'Voeg nieuw radio-item toe',
	  'edit' => 'Aanpassen',
	  'edit_item' => 'pas radio-item aan',
	  'new_item' => 'Nieuw radio-item',
	  'view' => 'Bekijk',
	  'view_item' => 'Bekijk radio-item',
	  'search_items' => 'Doorzoek radio-items',
	  'not_found' => 'Geen radio-items gevonden',
	  'not_found_in_trash' => 'Geen radio-items in de prullenbak gevonden',
	  'parent' => 'Hoofd-item',
	),) );
	
	register_post_type('gedachten', array(	'has_archive' => 'gedachten/archief', 'label' => 'Gedachten','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'gedachten'),'query_var' => true,'menu_position' => 5,'supports' => array('title','editor','excerpt','revisions','thumbnail',),'taxonomies' => array('post_tag',),'labels' => array (
	  'name' => 'Gedachten',
	  'singular_name' => 'Gedachte',
	  'menu_name' => 'Gedachten',
	  'add_new' => 'Toevoegen',
	  'add_new_item' => 'Voeg nieuwe gedachte toe',
	  'edit' => 'Aanpassen',
	  'edit_item' => 'pas gedachte aan',
	  'new_item' => 'Nieuwe gedachte',
	  'view' => 'Bekijk',
	  'view_item' => 'Bekijk gedachten',
	  'search_items' => 'Doorzoek gedachten',
	  'not_found' => 'Geen gedachten gevonden',
	  'not_found_in_trash' => 'Geen gedachten in de prullenbak gevonden',
	  'parent' => 'Hoofd-item',
	),) );
	
	register_post_type('links', array(	'has_archive' => 'links/archief', 'label' => 'Koppelingen','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'menu_position' => 5,'supports' => array('title','excerpt',),'labels' => array (
	  'name' => 'Koppelingen',
	  'singular_name' => 'Link',
	  'menu_name' => 'Koppelingen',
	  'add_new' => 'Toevoegen',
	  'add_new_item' => 'Voeg nieuwe link toe',
	  'edit' => 'Aanpassen',
	  'edit_item' => 'pas link aan',
	  'new_item' => 'Nieuwe link',
	  'view' => 'Bekijk',
	  'view_item' => 'Bekijk link',
	  'search_items' => 'Doorzoek links',
	  'not_found' => 'Geen links gevonden',
	  'not_found_in_trash' => 'Geen links in de prullenbak gevonden',
	  'parent' => 'Hoofd-item',
	),) );
}

function create_taxonomies() {
	register_taxonomy('publicatie-themas',array (
	  0 => 'publicaties',
	),array( 'hierarchical' => true, 'label' => 'Themas','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'publicaties'),'singular_label' => 'Thema') );
	
	register_taxonomy('tv-themas',array (
	  0 => 'televisie',
	),array( 'hierarchical' => true, 'label' => 'Themas','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'televisie'),'singular_label' => 'Thema') );
	
	register_taxonomy('gedachten-themas',array (
	  0 => 'gedachten',
	),array( 'hierarchical' => true, 'label' => 'Themas','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'gedachten'),'singular_label' => 'Thema') );
	
	register_taxonomy('radio-themas',array (
	  0 => 'radio',
	),array( 'hierarchical' => true, 'label' => 'Themas','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'radio', 'hierarchical' => true),'singular_label' => 'Thema') );
	
	register_taxonomy('link-themas',array (
	  0 => 'links',
	),array( 'hierarchical' => true, 'label' => 'Themas','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'links'),'singular_label' => 'Thema') );
}

function addHomeMenuLink($menuItems, $args)
{
	if('main' == $args->theme_location)
	{
		if ( is_front_page() )
			$class = 'class="current_page_item"';
		else
			$class = '';	

		$homeMenuItem = '<li ' . $class . '>' .
						$args->before .
						'<a href="' . home_url( '/' ) . '" title="Home">' .
							$args->link_before .
							'~/' .
							$args->link_after .
						'</a>' .
						$args->after .
						'</li>';

		$menuItems = $homeMenuItem . $menuItems;
	}

	return $menuItems;
}

add_filter( 'wp_nav_menu_items', 'addHomeMenuLink', 10, 2 );

function remove_menus () {
global $menu;
	//$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	end ($menu);
	$restricted = array(__('Posts'), __('Comments'), __('Links'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
	return 40; 
}

function custom_thumbsize( $size, $attachment_id, $file )
{
	$th_width = 150;

	$image_attr = getimagesize( $file );

	if ( $image_attr[0] < $image_attr[1] )
	{
		// 	image is portrait, make it fit in the width
		return round( $image_attr[1] / $image_attr[0] * $th_width );
	}
	else
	{
		// 	image square or landscape, make it fit the width
		return $th_width;
	}
}

add_filter( 'wp_thumbnail_max_side_length', 'custom_thumbsize', 10, 3 );

function WordLimiter($text,$limit=25){ 
    $explode = explode(' ',$text); 
    $string  = ''; 
    for($i=0;$i<$limit;$i++){ 
        $string .= $explode[$i]." "; 
    } 
        
    return $string; 
}

function add_rewrite_rules($rules) {
    $newrules['([^/]+)/([^\.]+).html$'] = 'index.php?$matches[1]=$matches[2]';
    $newrules['([^/]+)/([0-9]{4})/?$'] = 'index.php?post_type=$matches[1]&year=$matches[2]';
    $newrules['([^/]+)/([0-9]{4})/([0-9]{2})/?$'] = 'index.php?post_type=$matches[1]&year=$matches[2]&monthnum=$matches[3]';
    $newrules['([^/]+)/([0-9]{4})/page/([0-9]{1,})/?$'] = 'index.php?post_type=$matches[1]&year=$matches[2]&paged=$matches[3]';
    $newrules['([^/]+)/([0-9]{4})/([0-9]{2})/page/([0-9]{1,})/?$'] = 'index.php?post_type=$matches[1]&year=$matches[2]&monthnum=$matches[3]&paged=$matches[4]';
    $newrules['([^/]+)/([^/]+)/page/([0-9]{1,})/?$'] = 'index.php?post_type=$matches[1]&locations=$matches[2]&paged=$matches[3]';

    $rules = $newrules + $rules;
    return $rules;
}

function flushRules() {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}
add_filter('rewrite_rules_array', 'add_rewrite_rules');

/* This function should only really be run once per change of rules - comment out */
//add_filter('init','flushRules');

function filter_post_type_link($link, $post)
{
    return $link . '.html';//str_replace('_', '-', $link) . '.html';
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'bericht-icoon', 150);
}

add_filter( 'getarchives_where' , 'ucc_getarchives_where_filter' , 10 , 2 );

function ucc_getarchives_where_filter( $where , $r ) {
  $args = array(
    'public' => true ,
    '_builtin' => false
  );
  $output = 'names';
  $operator = 'and';

  $post_types = get_post_types( $args , $output , $operator );
  $post_types = array_merge( $post_types , array( 'post', 'radio' ) );
  $post_types = "'" . implode( "' , '" , $post_types ) . "'";

  return str_replace( "post_type = 'post'" , "post_type IN ( $post_types )" , $where );
}

function excludePages($query) {
 
if ($query->is_search) {
 
	$query->set('post_type', array('radio', 'televisie', 'gedachten', 'publicaties', 'page'));
 
}
	return $query;
 
}
 
add_filter('pre_get_posts','excludePages');
