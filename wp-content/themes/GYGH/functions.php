 <?php
/**
*Author: Ashuwp
*Author url: http://www.ashuwp.com
*Version: 3.2
**/

/**Add the cod into your functions.php**/
require get_template_directory() . '/include/metaboxclass.php';
require get_template_directory() . '/include/simple-term-meta.php';
require get_template_directory() . '/include/class-taxonomy-feild.php';
require get_template_directory() . '/include/optionclass.php';
require get_template_directory() . '/include/import_export.php';
// require get_template_directory() . '/include/config.php';
 //幻灯片
 //1. 先注册一个幻灯片文章类型
add_action('init', 'ashu_post_type');
function ashu_post_type() {
    register_post_type( 'slider_type',
        array(
            'labels' => array(
                'name' => '幻灯片',
                'singular_name' => '幻灯片列表',
                'add_new' => '添加',
                'add_new_item' => '添加新幻灯片',
                'edit_item' => '编辑幻灯片',
                'new_item' => '新幻灯片'
            ),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'menu_position' => 8,
        'supports' => array( 'title')
        )
    );
}
//2. 修改幻灯片文章列表
add_filter( 'manage_edit-slider_type_columns', 'slider_type_custom_columns' );
function slider_type_custom_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => '幻灯片名',
        'haslink' => '链接到',
        'thumbnail' => '幻灯片预览',
        'date' => '日期'
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
//3. Ashuwp_framework框架配置代码，增加自定义字段
/******slider*******/
$slider_boxinfo = array('title' => '编辑', 'id'=>'sliderbox', 'page'=>array('slider_type'), 'context'=>'normal', 'priority'=>'low', 'callback'=>'');
$slider_metas[] = array(
  'name' => '链接',
  'desc' => '',
  'id' => 'ashuwp_slider_link',
  'size'=> 40,
  'std'=>'',
  'type' => 'text'
);
$slider_metas[] = array(
  'name' => '图片',
  'desc' => '',
  'std'=>'',
  'size'=>60,
  'button_label'=>'上传',
  'id' => 'ashuwp_slider_pic',
  'type' => 'upload'
);
$ashuwp_slider = new ashu_meta_box($slider_metas, $slider_boxinfo);
//编辑器增加按钮   
function enable_more_buttons($buttons) {       
$buttons[] = 'hr';       
$buttons[] = 'fontselect';   
$buttons[] = 'fontsizeselect';    
return $buttons;     
}     
add_filter("mce_buttons_3", "enable_more_buttons"); 
?>