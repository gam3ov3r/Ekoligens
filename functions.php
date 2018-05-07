<?php
/*------------------------------------------------------------ */
/* INCLUDES
-------------------------------------------------------------- */
require_once("_inc/urls.php");
/*------------------------------------------------------------ */
/* ADD SUPPORT FOR NEW ACF
-------------------------------------------------------------- */	
	define('ACF_EARLY_ACCESS', '5');
/*------------------------------------------------------------ */
/* HIDE ADMIN BAR
-------------------------------------------------------------- */
	add_filter('show_admin_bar', '__return_false');
/*------------------------------------------------------------ */
/* REGISTER CUSTOMS
-------------------------------------------------------------- */
require_once("_inc/js.php");
require_once("_inc/css.php");
/*------------------------------------------------------------ */
/* DEV
-------------------------------------------------------------- */
add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}
/*------------------------------------------------------------ */
/* SETTINGS
-------------------------------------------------------------- */
add_theme_support('post-thumbnails');
/*------------------------------------------------------------ */
/* ADD CLASS TO IMAGES
-------------------------------------------------------------- */
function img_responsive($content){
    return str_replace('<img class="','<img class="img-responsive ',$content);
}
add_filter('the_content','img_responsive');
/*------------------------------------------------------------ */
/* DEFAULT MEDIA SETTINGS
-------------------------------------------------------------- */
function wps_attachment_display_settings() {
        update_option( 'image_default_align', 'none' );
        update_option( 'image_default_link_type', 'none' );
        update_option( 'image_default_size', 'large' );
}
add_action( 'after_setup_theme', 'wps_attachment_display_settings' );

// Create three new image sizes
add_image_size('small', 479, 9999);
add_image_size('medium', 768, 9999);
add_image_size('large', 1800, 9999);
/*------------------------------------------------------------ */
/* STOP SCROLL ON READ MORE
-------------------------------------------------------------- */
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
/*------------------------------------------------------------ */
/* DISPLAY READ MORE ON EXERPT
-------------------------------------------------------------- */
// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<div class="read-more"><a href="'. get_permalink($post->ID) . '" class="animsition-link">Read the full article...</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');
/*------------------------------------------------------------ */
/* ADD MENUS
-------------------------------------------------------------- */
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main menu' ),
      'extra-menu' => __( 'Extra menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
//Remove extra classes and add "active" to current page
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
/*------------------------------------------------------------ */
/* LOAD CF7
-------------------------------------------------------------- */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );
/*------------------------------------------------------------ */
/* ADD 'FORM' TO CF7
-------------------------------------------------------------- */
add_filter( 'wpcf7_form_class_attr', 'your_custom_form_class_attr' );

function your_custom_form_class_attr( $class ) {
	$class .= ' form';
	return $class;
}
/*------------------------------------------------------------ */
/* REMOVE SMILEYS
-------------------------------------------------------------- */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
/*------------------------------------------------------------ */
/* TEXT DOMAIN
-------------------------------------------------------------- */
load_theme_textdomain( 'custom', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
/*------------------------------------------------------------ */
/* REMOVE RECENT COMMENTS FROM INLINE
-------------------------------------------------------------- */
function twentyten_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );
/*------------------------------------------------------------ */
/* REMOVE JUNK
-------------------------------------------------------------- */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);