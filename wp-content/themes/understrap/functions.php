<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/cpt.php',                         	// Enqueue CPT custom File.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}


register_nav_menus( array(
    'categories_sidebar_menu' => 'Categories Sidebar Menu',
    'mobile_menu'			  => 'Mobile Menu',
) );


add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $path;
    
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Event Settings',
		'menu_title'	=> 'Theme Event Settings',
		'menu_slug' 	=> 'theme-event-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Sidebar Settings',
		'menu_title'	=> 'Theme Sidebar Settings',
		'menu_slug' 	=> 'theme-sidebar-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	
}

wp_enqueue_style( 'jquery-ui-css-air', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css');
wp_enqueue_script('flatpicker-date', 'https://cdn.jsdelivr.net/npm/flatpickr');
wp_enqueue_script('flatpickr-date-de', 'https://npmcdn.com/flatpickr/dist/l10n/de.js');

add_filter( 'comment_form_defaults', 'remove_title_reply_comments' );

function remove_title_reply_comments( $defaults ) {
    $defaults['title_reply'] = '';
    $defaults['comment_notes_before'] = "VERÖFFENTLICHEN SIE EINEN KOMMENTAR";
    return $defaults;
}


function bs_modified_comment_reply_text( $link ) {
 $link = str_replace( 'Kommentare', 'Kommentare', $link );
 return $link;
 }
add_filter( 'comment_reply_link', 'bs_modified_comment_reply_text' );


add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
 
function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs');
    return $defaults;
}
 
function posts_custom_columns($column_name, $id){
    if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'thumbnail' );
    }
}

function change_ul_item_classes_in_nav( $classes, $args, $depth ) {
    if ( 0 == $depth ) {
        $classes[] = 'second-level-menu';
    }
    if ( 1 == $depth ) {
        $classes[] = 'third-level-menu';
    }
    // ...
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'change_ul_item_classes_in_nav', 10, 3 );