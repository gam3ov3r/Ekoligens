<?php
/* =Load Javascript
-------------------------------------------------------------- */

function load_scripts() {
	if (!is_admin()) {

		wp_deregister_script('jquery');

		// Register our Javascript
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, 'all' );
		wp_register_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), null, 'all' );
		
		wp_register_script('js', get_template_directory_uri() . '/js/script.min.js', array('bootstrap'), null, 'all' );
			
		// Load our Javascript
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap');
				
		wp_enqueue_script('js');
	}
}
add_action('init', 'load_scripts');