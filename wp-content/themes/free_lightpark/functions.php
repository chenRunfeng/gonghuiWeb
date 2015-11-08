<?php
include_once("load.php"); 
include_once("meta_boxes.php"); 
include_once("xuanxiang.php");
//去掉仪表盘“概况”下的WordPress版本信息 
//Hide the Upgrade Notice to Recent Versions
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
/**
 * 自定义 WordPress 仪表盘欢迎面板
 * http://www.wpdaxue.com/remove-or-customize-wordpress-welcome-panel.html
*/
function rc_my_welcome_panel() {
	?>
	<script type="text/javascript">
		/* 隐藏默认的欢迎信息 */
		jQuery(document).ready( function($) 
		{
			$('div.welcome-panel-content').hide();
		});
	</script>
	<!-- 添加自定义信息 -->
	<div class="custom-welcome-panel-content">
		<h3><?php _e( '欢迎使用！' ); ?></h3>
		<div class="welcome-panel-column-container">
			<div class="welcome-panel-column">
				<a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://www.trickspanda.com"><?php _e( '关于我们' ); ?></a>
				<p class="hide-if-no-customize"><?php printf( __( '或者, <a href="%s">进行设置</a>' ), admin_url( 'options-general.php' ) ); ?></p>
			</div>
			<div class="welcome-panel-column">
				<h4><?php _e( 'Next Steps' ); ?></h4>
				<ul>
					<?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
						<li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
						<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
					<?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
						<li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
						<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
						<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
					<?php else : ?>
						<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
						<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add an About page' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
					<?php endif; ?>
					<li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site' ) . '</a>', home_url( '/' ) ); ?></li>
				</ul>
			</div>
			<div class="welcome-panel-column welcome-panel-last">
				<h4><?php _e( 'More Actions' ); ?></h4>
				<ul>
					<li><?php printf( '<div class="welcome-icon welcome-widgets-menus">' . __( 'Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>' ) . '</div>', admin_url( 'widgets.php' ), admin_url( 'nav-menus.php' ) ); ?></li>			
				</ul>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'welcome_panel', 'rc_my_welcome_panel' );
get_template_part( 'init' ); 
//删除更新提醒
//remove_action('load-update-core.php’, ‘wp_update_themes’);
//add_filter(‘pre_site_transient_update_themes',create_function('$a',“return null”));
add_action('admin_menu','wp_hide_nag'); 

function wp_hide_nag() { 

     remove_action( 'admin_notices', 'update_nag', 3 ); 

}
//删除左侧菜单
function remove_menus() {
  global $menu;
  $restricted = array( __('Tools'),  __('Comments'), __('Plugins'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(strpos($value[0], '<') === FALSE) {
      if(in_array($value[0] != NULL ? $value[0]:"" , $restricted)){
        unset($menu[key($menu)]);
      }
    }
    else {
      $value2 = explode('<', $value[0]);
      if(in_array($value2[0] != NULL ? $value2[0]:"" , $restricted)){
        unset($menu[key($menu)]);
      }
    }
  }
}

if ( is_admin() ) {
  // 删除左侧菜单
  add_action('admin_menu', 'remove_menus');
}
function remove_submenu() {
    // 删除"设置"下面的子菜单"讨论"
    //remove_submenu_page( __('Dashboard'), 'update-code.php' );
	//remove_submenu_page( 'options-general.php’,'options-discussion.php');
	global $submenu;
	unset($submenu['options-general.php'][25]); // Removes 'Discussion'.
	unset($submenu['index.php'][10]); // Removes 'Updates'.
	
}
if ( is_admin() ) {
    add_action('admin_init','remove_submenu');
}
function my_edit_toolbar($wp_toolbar) { 
$wp_toolbar->remove_node('wp-logo'); //去掉Wordpress LOGO 
$wp_toolbar->remove_node('updates'); //去掉更新提醒 
$wp_toolbar->remove_node('comments'); //去掉评论提醒 
} 
add_action('admin_bar_menu', 'my_edit_toolbar', 999); 

if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => '这个主题的免费版本只提供WordPress默认的小工具，付费版本提供5种图文显示的多功能小工具，小工具显示在页面、分类和内页的左侧。',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
    }
	function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Categories');

}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);
/*特色图片*/

register_nav_menus(
array(
'hezdr_m' => __( '菜单导航' ),
'ff_m' => __( '底部双层导航' ),
'ff_m2' => __( '底部单层导航' ),
'ff_m3' => __( '友情链接' )
)
);

function remove_open_sans() {
wp_deregister_style( 'open-sans' );
wp_register_style( 'open-sans', false );
wp_enqueue_style('open-sans','');
}
add_action( 'init', 'remove_open_sans' );

/*特色图片*/
if ( function_exists( 'add_theme_support' ) ) {add_theme_support( 'post-thumbnails' );}
if ( function_exists( 'add_image_size' ) ) {
   	  add_image_size( 'default_fist-list-thumbb', 150,150,true );
      add_image_size( 'footer-small-thumbb', 64,64,true );
	  add_image_size( 'news-sidbar-thumb', 230, 230,true );
      add_image_size( 'default-list-thumbb', 130,130,true );
	
		
}

function get_category_root_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}


/*分页函数*/
    add_action( 'admin_menu', 'my_page_excerpt_meta_box' );
    function my_page_excerpt_meta_box() {
        add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
    }
	
	function par_pagenavi($range = 10){

global $paged, $wp_query;

if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}

if($max_page > 1){if(!$paged){$paged = 1;}

if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend'

title='跳转到首页'> 返回首页 </a>";}

previous_posts_link(' 上一页 ');

if($max_page > $range){

if($paged < $range){for($i = 1; $i <= ($range + 1); $i++)

{echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

elseif($paged >= ($max_page - ceil(($range/2)))){

for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){

for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)

{echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}

else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

next_posts_link(' 下一页 ');

if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend'

title='跳转到最后一页'> 最后一页 </a>";}}

}
/*分页函数*/

//面包屑
function get_breadcrumbs()
{
global $wp_query;
if ( !is_home() ){
// Start the UL

// Add the Home link
echo '<a href="'. get_settings('home') .'">'. 首页 .'</a>';
if ( is_category() )
{
global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo '<a> ></a>'.(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . '<a> ></a><a>';
      single_cat_title();
      echo '' . $currentAfter."</a>";
}
elseif ( is_archive() && !is_category() )
{
echo "<a> > </a><a>产品筛选</a>";
}
elseif ( is_search() ) {
echo "<a> > </a>; <a>搜索结果</a>";
}
elseif ( is_404() )
{
echo "<a> > </a><a>没有找到您所要的信息</a>";
}
elseif ( is_single() )
{
$category = get_the_category();
$category_id = get_cat_ID( $category[0]->cat_name );
echo '<a> > </a> '. get_category_parents( $category_id, TRUE, " <a> > </a> " );
echo " <a> ".the_title('','', FALSE)."</a>";
}
elseif ( is_page() )
{
$post = $wp_query->get_queried_object();
if ( $post->post_parent == 0 ){
echo " <a> > </a><a> ".the_title('','', FALSE)."</a>";
} else {
$title = the_title('','', FALSE);
$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
array_push($ancestors, $post->ID);
foreach ( $ancestors as $ancestor ){
if( $ancestor != end($ancestors) ){
echo ' <a> > </a> <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a>';
} else {
echo '<a> > </a> <a>'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a>';
}
}
}
}
// End the UL

}
}


//增强编辑器开始
add_editor_style('/css/editor-style.css');  
function add_editor_buttons($buttons) {

$buttons[] = 'fontselect';

$buttons[] = 'fontsizeselect';

$buttons[] = 'cleanup';

$buttons[] = 'styleselect';

$buttons[] = 'hr';

$buttons[] = 'del';

$buttons[] = 'sub';

$buttons[] = 'sup';

$buttons[] = 'copy';

$buttons[] = 'paste';

$buttons[] = 'cut';

$buttons[] = 'undo';

$buttons[] = 'image';

$buttons[] = 'anchor';

$buttons[] = 'backcolor';

$buttons[] = 'wp_page';

$buttons[] = 'charmap';

return $buttons;

}

add_filter("mce_buttons_3", "add_editor_buttons");

//custom admin logo
function custom_logo() {
  echo '<style type="text/css">
    #header-logo { background-image: url('.get_bloginfo('template_directory').'/images/login.jpg) !important; }
    </style>';
}
add_action('admin_head', 'custom_logo');
//Customize the Footer
function modify_footer_admin () {
}
add_filter('admin_footer_text', 'modify_footer_admin');
?>