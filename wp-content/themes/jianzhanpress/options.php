<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	


	$options[] = array(
		'name' => __('图片广告管理', 'options_framework_theme'),
		'type' => 'heading' );


	$options[] = array(
		'name' => __('首页右侧广告图片', 'options_framework_theme'),
		'desc' => __('请选择要上传的图片', 'options_framework_theme'),
		'id' => 'hotpic_one_img',
		"std" => "$blogpath/wp-content/themes/jianzhanyes/images/noneimg.png",
		'type' => 'upload');

	$options[] = array(
		'name' => __('首页右侧广告链接', 'options_framework_theme'),
		'desc' => __('请输入内容', 'options_framework_theme'),
		'id' => 'hotpic_one_link',
		'std' => '',
		'class' => 'small',
		'type' => 'text');

	$options[] = array(
		'name' => __('联系方式管理', 'options_framework_theme'),
		'type' => 'heading' );

	$options[] = array(
		'name' => __('热点推荐右侧联系方式管理', 'options_framework_theme'),
		'desc' => __('请输入内容', 'options_framework_theme'),
		'id' => 'hotpic_right_text',
		'std' => '',
		'class' => 'small',
		'type' => 'text');


	return $options;
}