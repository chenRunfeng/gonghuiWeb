<?php
function themepark_init_css() {
if ( !is_admin()) {
	
	   wp_deregister_script('jquery');
	   wp_register_script( 'jquery', get_template_directory_uri() ."/js/jquery.min.js", false);
	   wp_enqueue_script('jquery');
	    wp_deregister_script('easing');
	   wp_register_script( 'easing',get_template_directory_uri() ."/js/jquery.easing.1.3.js");
	   wp_enqueue_script('easing');

	    // 加载  lazyload

	   wp_deregister_script('png');
	   wp_register_script( 'png', get_template_directory_uri() ."/png/pngtm.js");
	   wp_enqueue_script('png');
	   

	     wp_deregister_script('script');
	   wp_register_script( 'script', get_template_directory_uri() ."/js/lightpark_free.js",false, '', true );
	   wp_enqueue_script('script');

	
	    wp_deregister_style('stylesheet');
	   wp_register_style( 'stylesheet', get_template_directory_uri() ."/style.css");
	   wp_enqueue_style('stylesheet');
	   

	}}

add_action('wp_print_styles', 'themepark_init_css');
	?>