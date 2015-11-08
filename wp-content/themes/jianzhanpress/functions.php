<?php

 
//标题截断
function cut_str($src_str,$cut_length){$return_str='';$i=0;$n=0;$str_length=strlen($src_str);
		while (($n<$cut_length) && ($i<=$str_length))
		{$tmp_str=substr($src_str,$i,1);$ascnum=ord($tmp_str);
		if ($ascnum>=224){$return_str=$return_str.substr($src_str,$i,3); $i=$i+3; $n=$n+2;}
        elseif ($ascnum>=192){$return_str=$return_str.substr($src_str,$i,2);$i=$i+2;$n=$n+2;}
        elseif ($ascnum>=65 && $ascnum<=90){$return_str=$return_str.substr($src_str,$i,1);$i=$i+1;$n=$n+2;}
        else {$return_str=$return_str.substr($src_str,$i,1);$i=$i+1;$n=$n+1;}
    }
    if ($i<$str_length){$return_str = $return_str . '';}
    if (get_post_status() == 'private'){ $return_str = $return_str . '（private）';}
    return $return_str;};
//分页
function pagination($query_string){
global $posts_per_page, $paged;
$my_query = new WP_Query($query_string ."&posts_per_page=-1");
$total_posts = $my_query->post_count;
if(empty($paged))$paged = 1;
$prev = $paged - 1;
$next = $paged + 1;
$range = 2; // only edit this if you want to show more page-links
$showitems = ($range * 2)+1;
 
$pages = ceil($total_posts/$posts_per_page);
if(1 != $pages){
echo "<ul class='pagination'>";
echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "
<li><a href='".get_pagenum_link(1)."'>最前</a></li>":"";
echo ($paged > 1 && $showitems < $pages)? "
<li><a href='".get_pagenum_link($prev)."'>上一页</a></li>":"";
 
for ($i=1; $i <= $pages; $i++){
if (1 != $pages &&( !($i >= $paged+$range+1 ||
    $i <= $paged-$range-1) || $pages <= $showitems )){
echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":
"<li><a href='".get_pagenum_link($i)."' class='num'>".$i."</a></li>";
}
}
echo ($paged < $pages && $showitems < $pages) ?
"<li><a href='".get_pagenum_link($next)."'>下一页</a></li>" :"";
echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ?
"<li><a href='".get_pagenum_link($pages)."'>最后</a></li>":"";
echo "</ul>\n";
}
}





//用户

function get_user_id($user=''){
 $user="'".$user."'";
 global $wpdb;
 $user_ids = $wpdb->get_col("SELECT ID FROM $wpdb->users WHERE user_login = $user ORDER BY ID");
 foreach($user_ids as $user_id){
 return $user_id;
 }
}


// WordPress 后台用户列表显示用户昵称

add_filter('manage_users_columns','add_user_nickname_column');

function add_user_nickname_column($columns){$columns['user_nickname']='昵称';return$columns;}

add_action('manage_users_custom_column','show_user_nickname_column_content',20,3);
function show_user_nickname_column_content($value,$column_name,$user_id){$user= get_userdata($user_id);$user_nickname=$user->nickname;
if('user_nickname'==$column_name)return$user_nickname;return$value;}
unset($columns['name']);//移除“姓名”这一栏



//使用昵称替换用户名，通过用户ID进行查询
add_filter( 'request', 'wpdaxue_request' );
function wpdaxue_request( $query_vars )
{
    if ( array_key_exists( 'author_name', $query_vars ) ) {
        global $wpdb;
        $author_id = $wpdb->get_var( $wpdb->prepare( "SELECT user_id FROM {$wpdb->usermeta} WHERE meta_key='nickname' AND meta_value = %s", $query_vars['author_name'] ) );
        if ( $author_id ) {
            $query_vars['author'] = $author_id;
            unset( $query_vars['author_name'] );    
        }
    }
    return $query_vars;
}
 
//使用昵称替换链接中的用户名
add_filter( 'author_link', 'wpdaxue_author_link', 10, 3 );
function wpdaxue_author_link( $link, $author_id, $author_nicename )
{
    $author_nickname = get_user_meta( $author_id, 'nickname', true );
    if ( $author_nickname ) {
        $link = str_replace( $author_nicename, $author_nickname, $link );
    }
    return $link;
}


//给 wp_tag_cloud 生成的链接加上 rel="nofollow"
    add_filter('wp_tag_cloud', 'cis_nofollow_wp_tag_cloud');
    function cis_nofollow_wp_tag_cloud ($link) {
    return str_replace('<a href=', '<a rel="nofollow" class="hot_tag_link" href=',  $link);
    }

//给 the_tags() 生成的链接 加上 rel="nofollow"
add_filter('the_tags', 'cis_nofollow_the_tag');
function cis_nofollow_the_tag($text) {
return str_replace('<a href=', '<a rel="nofollow" class="article_info_tag" href=',  $text);
}

//给 wp_list_categories() 生成的链接加上 rel="nofollow"
add_filter( 'wp_list_categories', 'cis_nofollow_wp_list_categories' );
function cis_nofollow_wp_list_categories( $text ) {

$text = stripslashes($text);
$text = preg_replace_callback('|&lt;a (.+?)&gt;|i', 'wp_rel_nofollow_callback', $text);
return $text;
}

//给 the_category() 生成的链接加上 rel="nofollow"
add_filter( 'the_category', 'cis_nofollow_the_category' );
function cis_nofollow_the_category( $text ) {

$text = str_replace('rel="category tag"', "", $text);
$text = cis_nofollow_wp_list_categories($text);
return $text;
}

//给 the_author_post_link 生成的链接加上 rel="nofollow"
add_filter('the_author_posts_link', 'cis_nofollow_the_author_posts_link');
function cis_nofollow_the_author_posts_link ($link) {
return str_replace('&lt;/a&gt;&lt;a href=', '&lt;a rel="nofollow" href=', $link);
}

//给 comments_popup_link_attributes() 生成的链接加上 rel="nofollow"
add_filter('comments_popup_link_attributes', 'cis_nofollow_comments_popup_link_attributes');
function cis_nofollow_comments_popup_link_attributes () {
echo ' rel="nofollow"';
}
//给外部链接添加nofollow属性
add_filter('the_content','web589_the_content_nofollow',999);
function web589_the_content_nofollow($content){
	preg_match_all('/href="(.*?)" rel="external nofollow" /',$content,$matches);
	if($matches){
		foreach($matches[1] as $val){
			if( strpos($val,home_url())===false ) $content=str_replace("href=\"$val\"", "href=\"$val\" rel=\"external nofollow\" ",$content);
		}
	}
	return $content;
}




// 自定义菜单
if ( function_exists('register_nav_menus') ) {
    register_nav_menus(array(
        'primary-one' => '主菜单'
    ));

    register_nav_menus(array(
        'primary-two' => '小菜单1'
    ));
	register_nav_menus(array(
        'primary-three' => '小菜单2'
    ));
	register_nav_menus(array(
        'primary-four' => '小菜单3'
    ));
	register_nav_menus(array(
        'primary-five' => '小菜单4'
    ));

}

//特色图调用
add_theme_support( 'post-thumbnails' );
//给page加摘要
add_action( 'admin_menu', 'my_page_excerpt_meta_box' );
function my_page_excerpt_meta_box() {
 add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
}
//显示文章别名
function the_slug() {
$post_data = get_post($post->ID, ARRAY_A);
$slug = $post_data['post_name'];
return $slug; 
}
########################################################   

#      去除WordPress自动插入原生相册样式代码   

########################################################   

function remove_css_gal() {   

return "\n" . '<div class="gallery">';//ici vous pouvez changer de classe   

}   

add_filter( 'gallery_style', 'remove_css_gal', 9 );  


/**
 * WordPress 后台禁用Google Open Sans字体，加速网站
 * http://www.louyuwu.net
 */
add_filter( 'gettext_with_context', 'wpdx_disable_open_sans', 888, 4 );
function wpdx_disable_open_sans( $translations, $text, $context, $domain ) {
  if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
    $translations = 'off';
  }
  return $translations;
}
 //文章浏览数     
     function get_post_views ($post_id) {     
         
         $count_key = 'views';     
         $count = get_post_meta($post_id, $count_key, true);     
         
         if ($count == '') {     
             delete_post_meta($post_id, $count_key);     
             add_post_meta($post_id, $count_key, '0');     
             $count = '0';     
         }     
         
         echo number_format_i18n($count);     
         
     }     
         
     function set_post_views () {     
         
         global $post;     
         
         $post_id = $post -> ID;     
         $count_key = 'views';     
         $count = get_post_meta($post_id, $count_key, true);     
         
         if (is_single() || is_page()) {     
         
             if ($count == '') {     
                 delete_post_meta($post_id, $count_key);     
                 add_post_meta($post_id, $count_key, '0');     
             } else {     
                 update_post_meta($post_id, $count_key, $count + 1);     
             }     
         
         }     
         
     }     
     add_action('get_header', 'set_post_views');    





/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

if ( ! function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}




 //把页面从搜索结果中排除
add_filter('pre_get_posts','search_filter');
function search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

//为WordPress页面添加标签和分类
 
class PTCFP{
 
  function __construct(){
 
    add_action( 'init', array( $this, 'taxonomies_for_pages' ) );
 
    /**
     * 确保这些查询修改不会作用于管理后台，防止文章和页面混杂 
     */
    if ( ! is_admin() ) {
      // add_action( 'pre_get_posts', array( $this, 'category_archives' ) );
      add_action( 'pre_get_posts', array( $this, 'tags_archives' ) );
    } // ! is_admin
 
  } // __construct
 
  /**
   * 为“页面”添加“标签”和“分类”
   *
   * @uses register_taxonomy_for_object_type
   */
  function taxonomies_for_pages() {
      register_taxonomy_for_object_type( 'post_tag', 'page' );
      // register_taxonomy_for_object_type( 'category', 'page' );
  } // taxonomies_for_pages
 
  /**
   * 在标签存档中包含“页面”
   */
  function tags_archives( $wp_query ) {
 
    if ( $wp_query->get( '' ) )
      $wp_query->set( 'post_type', 'any' );
 
  } // tags_archives
 
  /**
   * 在分类存档中包含“页面”
   */
  function category_archives( $wp_query ) {
 
    if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
      $wp_query->set( 'post_type', 'any' );
 
  } // category_archives
 
} // PTCFP
 
$ptcfp = new PTCFP();


?>

