<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0022)http://blog.csdn.net/electroniXtar/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title><?php if ( is_home() ) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
        wp_title('',true);
    } ?></title>
<meta name="Keywords" content="广东医学院"/>
<meta name="Description" content="中国教育工会广东医学院委员会"/>
    

<link href="<?php bloginfo('template_directory');?>/styles/common.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_directory');?>/styles/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_directory');?>/styles/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/styles/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/Scripts/111jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/Scripts/divselect.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/Scripts/jquery-2.nivo.slider.pack.js"></script>
     <script type="text/javascript">
$(function(){
	$.divselect(".divselect",".inputselect");
});
$(function(){
	$.divselect(".divselect2",".inputselect2");
});
$(function(){
	$.divselect(".divselect3",".inputselect3");
});
$(window).load(function() {
		$('#slider').nivoSlider();
	});
</script>

<base target="_blank" />
</head>
<body>
<div class="toubu"><div class="w1024"><img src="<?php bloginfo('template_url'); ?>/images/头部.gif" width="960" height="112" /></div>
</div>
<div class="h15"></div>
<div class="biaoti">
<div class="w1024">
<ul id="nav">
    <li><a href="http://www.divcss5.com/">首页</a></li>
    <li><a href="http://www.divcss5.com/html/">机构设置</a></li>
    <li><a href="http://www.divcss5.com/rumen
    /">岗位职责</a></li>
    <li><a href="http://www.divcss5.com/css-tool/">政策法规</a></li>
    <li><a href="http://www.divcss5.com/css-texiao/">双代会</a></li>
    <li><a href="http://www.divcss5.com/wenji/">女工之窗</a></li>
    <li><a href="http://www.divcss5.com/wenji/">计划生育</a></li>
    <li><a href="http://www.divcss5.com/wenji/">教工风采</a></li>
    <li><a href="http://www.divcss5.com/wenji/">办公指南</a></li>
    <li><a href="http://www.divcss5.com/wenji/">下载中心</a></li>
</ul>