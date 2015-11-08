<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<meta name=keywords content="<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?>">
<meta name="description" content="本站模板由www.moban.ren免费提供" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/toastr.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/author.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/toastr.min.js"></script>
</head>
<body>
<div id="author_page_header">
	<div id="author_page_header_box">
    	<a id="author_page_header_box_logo" href="<?php bloginfo('url'); ?>" target="_blank" title="<?php bloginfo('name'); ?>首页"></a>
    	<div id="author_page_header_menu">
        	<a href="<?php bloginfo('url'); ?>"  style="border-left:0px;">首页<span></span></a>
            <a href="<?php bloginfo('url'); ?>/?page_id=152">作家<span></span></a>
        </div>
        <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div id="author_page_header_search_box" class="input-group">
            	<input id="index_search_input" type="text" name="s" id="s" class="form-control" placeholder="请输入您感兴趣的关键词">
                <span class="input-group-btn"><button class="btn btn-primary" type="submit">搜索</button></span>
    		</div>
        </form>
	

        <div id="author_page_header_user_box">
        	          
						<?php wp_register('',''); ?> <?php wp_loginout(); ?>
            	
                    </div>
    </div>
</div>
<div id="author_page_header_bottom">
<div id="author_page_header_logo"><a id="author_page_header_box_logo" href="<?php bloginfo('url'); ?>" target="_blank" title="<?php bloginfo('name'); ?>首页"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_white_192x68.png" alt="<?php bloginfo('name'); ?>首页" /></a></div>
</div>