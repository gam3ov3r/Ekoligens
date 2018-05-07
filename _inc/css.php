<?php
/* =Load default styles
-------------------------------------------------------------- */

function load_styles()
{	
	wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), null, 'all' );
	wp_register_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), null, 'all' );
	
	wp_register_style( 'style', get_template_directory_uri() . '/css/base.css', array('bootstrap'), null, 'all' );
	
	// Load our Styles
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'bootstrap' );
		
	wp_enqueue_style( 'style' );

}
add_action( 'wp_enqueue_scripts', 'load_styles' );