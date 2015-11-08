<?php
/*
Template Name: User List
*/
?>
<?php get_header(author); ?>
<!-- page begin-->

<div id="author_list_top">
	<div id="author_list_top_box">
    	    	<a id="author_apply_btn" href="<?php bloginfo('url'); ?>/wp-login.php?action=register" title="申请成为作者">　　</a>
    	    </div>
</div>
<div id="author_list_content">
	<div id="author_info_list">
    	
	




<?php
     $display_admins = false; //是否显示管理员，ture - 显示，false -不显示
     $order_by = 'post_count'; // 排序依据，可选 'nicename', 'email', 'url', 'registered', 'display_name', 或 'post_count'
     $order = 'DESC'; //排列方式，ASC - 升序，DESC - 降序
     $role = 'author'; // 用户角色，可选 'subscriber', 'contributor', 'editor', 'author' - 留空显示全部 'all'
     $avatar_size = 108; //头像大小
     $hide_empty = false; // 是否隐藏没有文章的用户，ture - 显示，false -不显示
 
     if(!empty($display_admins)) {
          $blogusers = get_users('orderby='.$order_by.'&role='.$role);
     } else {
 
     $admins = get_users('role=administrator');
     $exclude = array();
 
     foreach($admins as $ad) {
          $exclude[] = $ad->ID;
     }
 
     $exclude = implode(',', $exclude);
     $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&order='.$order.'&role='.$role);
     }
 
     $authors = array();
     foreach ($blogusers as $bloguser) {
     $user = get_userdata($bloguser->ID);
 
     if(!empty($hide_empty)) {
          $numposts = count_user_posts($user->ID);
          if($numposts < 1) continue;
          }
          $authors[] = (array) $user;
     }
 
     echo '<div>';
     foreach($authors as $author) {
          $display_name = $author['data']->display_name;
          $avatar = get_avatar($author['ID'], $avatar_size);
          $author_profile_url = get_author_posts_url($author['ID']);
		  $author_description = get_the_author_meta( 'description',$author['ID']);
 
          echo '<div class="author_info_item col-md-2">';
     	  echo '<div class="author_avatar_item">
                    <a href="', $author_profile_url, '" title="', $display_name,'" target="_blank">', $avatar , '</a>
                </div>';
          echo '<div class="author_info_item_name">
                <a href="', $author_profile_url, '" title="', $display_name,'" target="_blank" class="author_name">', $display_name,'</a>
                </div>';
          echo '<div class="author_info_item_title">', $author_description,'</div>';
          echo '</div>';
          }
     echo '</div>';
?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content('Read the rest of this entry &raquo;'); ?>
<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

          <div class="clear"></div>
        </div>
	</div>

<script type="text/javascript">
    $(function(){
        $(window).resize(function(){
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>




<!-- page end-->
<?php get_footer(); ?>