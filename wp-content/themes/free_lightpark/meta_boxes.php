<?php 
$new_meta_boxes =
array(

    "hoturl" => array(
        "name" => "hoturl",
        "std" => "",
        "title" => "链接"),
		
   

	"hots_tlye" => array(
        "name" => "hots_tlye",
        "std" => "",
        "title" => "焦点图样式"),
);
function new_meta_boxes() {
    global $post, $new_meta_boxes;
  
        $meta_box_value = get_post_meta($post->ID,"hoturl", true);
	    $meta_box_value2 = get_post_meta($post->ID,"hots_tlye", true);
		 $meta_box_value3 = get_post_meta($post->ID,"png_pic", true);
       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			

    echo'
	<div style=" width:200px; display:inline-block;overflow: hidden;"><input type="hidden" name="hoturl_noncename" id="hoturl_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';


        echo'<h4>链接</h4>'; 
   	 echo'<input  style="border:1px #ccc solid" name="hoturl" id="hoturl" value="'.$meta_box_value.'" /></div>';
	
      
      echo '<input type="hidden" name="hots_tlye_noncename" id="hots_tlye_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	   echo'<div style=" width:200px; display:inline-block;overflow: hidden;"><h4>焦点图文字动画：</h4>'; 
	      	
	  ?>
      <select name="hots_tlye" id="hots_tlye">
	         <option value='leftpictext'<?php if ( $meta_box_value2 == "leftpictext" ) {echo "selected='selected'";}?>>文字从左边上方掉下</option>
			 <option value='rightpictext'<?php if ( $meta_box_value2 == "rightpictext" ) {echo "selected='selected'";}?>>文字从右上方掉下</option>
             <option value='no_pictext'<?php if ( $meta_box_value2 == "bottompictext" ) {echo "selected='selected'";}?>>不显示</option>
     
          
		
	</select>
      </div>
      <div style=" display:inline-block;overflow: hidden;"><h4>提示：焦点图图片的上传请在右侧"特色图片"中上传，图片尺寸为：1920*526（px）</h4></div>
      
      <?php   
    }

function create_meta_box() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '焦点图选项。[选择焦点图分类，可以填写链接，连接到你想要的地方]', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
}

function save_postdata( $post_id ) {
    global $post, $new_meta_boxes;
  
    foreach($new_meta_boxes as $meta_box) {
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
            return $post_id;
        }
  
        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        }
        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }
  
        $data = $_POST[$meta_box['name']];
  
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

?>
