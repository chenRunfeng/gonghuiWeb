 <?php
include_once('metaboxclass.php');   
include_once('metabox.php'); 
 //幻灯片
add_action('init', 'ashu_post_type');
function ashu_post_type() {
    /**********幻灯片*****************/
    register_post_type( 'slider_type',
        array(
            'labels' => array(
                'name' => '幻灯片',
                'singular_name' => '幻灯片',
                'add_new' => '添加',
                'add_new_item' => '添加新幻灯片',
                'edit_item' => '编辑幻灯片',
                'new_item' => '新幻灯片'
            ),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'menu_position' => 5,
        'supports' => array( 'title','thumbnail'),
        )
    );
}
//2. 修改幻灯片文章列表
add_filter( 'manage_edit-slider_type_columns', 'slider_type_custom_columns' );
function slider_type_custom_columns( $columns ) {
    $columns = array(
        'title' => 'Name',
        'linked' => 'Link',
        'thumbnail' => 'View'
    );
    return $columns;
}
add_action( 'manage_slider_type_posts_custom_column', 'slider_type_manage_custom_columns', 10, 2 );
function slider_type_manage_custom_columns( $column, $post_id ) {
    global $post;
    switch( $column ) {
        case "linked":
            if(get_post_meta($post->ID, "ashuwp_slider_link", true)){
                echo get_post_meta($post->ID, "ashuwp_slider_link", true);
            } else {echo '----';}
                break;
        case "thumbnail":
                $thumb_url = get_post_meta($post->ID, "ashuwp_slider_pic", true);
                //$ds_image = vt_resize( '',$ds_thumb , 95, 41, true );
                echo '<img src="'.$thumb_url.'" width="50" height="50" alt="" />';
                break;
        default :
            break;
    }
}
//编辑器增加按钮   
function enable_more_buttons($buttons) {       
$buttons[] = 'hr';       
$buttons[] = 'fontselect';   
$buttons[] = 'fontsizeselect';    
return $buttons;     
}     
add_filter("mce_buttons_3", "enable_more_buttons"); 
?>