<!-- sidebar begin-->
<div id="root-container"><div id="inner-container"><div id="side-container"><div id="logo-wrapper"> <a href="/"> <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" width="169" height="71" /> </a> <span id="tagline">包头本色影像工作室</span></div><div id="menu-wrapper">
<ul id="menu-main-menu" class="sf-menu sf-vertical">
<?php 
echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'primary', 'echo' => false)) )); 
?>
</ul>
<nav id="mobile-menu" class="top-bar">
<ul class="title-area"><li class="name"></li><li class="toggle-topbar menu-icon"><a href="#"><span>菜单</span></a></li></ul>
<section class="top-bar-section"></section>
</nav>
</div>

<div id="side-footer-wrapper"> <span id="copyright"> 2005-<?php the_time('Y'); ?> <?php bloginfo('name'); ?>.<br />&#x672C;&#x7AD9;&#x7531;<a href="http://www.louyuwu.net" target="_blank" >&#x7CBE;&#x667A;&#x79D1;&#x6280;</a>&#x63D0;&#x4F9B;&#x6280;&#x672F;&#x652F;&#x6301;. </span>
<ul class="bar-social">
<li><a href="http://weibo.com/pedeer" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/weibo.png" alt="微博" title="微博" width="30" height="30" /></a></li>
<li><a href="http://weibo.com/pedeer" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/weixin.png" alt="微信" title="微信" width="30" height="30" /></a></li>
<li><a href="http://weibo.com/pedeer" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/qq.png" alt="QQ" title="QQ" width="30" height="30" /></a></li>
<li><a href="http://yun.baidu.com/share/home?uk=3575608494" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social/pan.png" alt="网盘" title="网盘" width="30" height="30" /></a></li>
</ul></div></div>
<!-- sidebar end-->


