<?php get_header();?>
<div id="page_top" <?php if(get_option('mytheme_top_pic')!=""){ echo 'style="background:url('.get_option('mytheme_top_pic').')"';} ?> >

<div class="page_top_in">
  <?php     $post_data = get_post($post->ID, ARRAY_A);
			$slug = $post_data['post_name'];
			
			 ?>         
<h1> <?php echo get_the_title() . ' <a>'.$slug .' </a>'?></h1>
  <?php the_excerpt();?> 
</div>

</div>

<div id="page_muen_nav">  <b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{if (function_exists('get_breadcrumbs')){get_breadcrumbs();}}?></div>

<div id="content">
<div class="left_mian">
<div class="widget">
  <div class="widget_zs"></div>
    <?php $post_data = get_post($post->ID, ARRAY_A);
			$slug = $post_data['post_name'];
			$name = $slug; //page别名
            global $wpdb;
            $page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$name'");
			$parent_id =get_post($post->post_parent, ARRAY_A);
			$parent_slug = $parent_id['post_name'];
			$parent_title = get_the_title($post->post_parent);
			$parent_link =get_page_link($post->post_parent);
			 ?>
          <h2>
          <?php if($post->post_parent){echo '<a href="'.$parent_link .'">'.$parent_title  . ' <b>'.$parent_slug .' </b>'; }else{echo  '<a href="#">'. get_the_title() . ' <b>'.$slug .' </b>';}?> </a></h2> 
         
          
            <?php if($post->post_parent):  ?>
          <ul class="nav_left">  <?php $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0"); if ($children){ echo $children; }  ?></ul>
        <?php else: ?>
         <ul class="nav_left"> <?php  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");  if ($children){ echo $children; }?></ul>
           <?php endif; ?> 



           <div class="nav_contact">
           <a>联系电话</a>
           <b><?php echo get_option('mytheme_tell');  ?></b>
           </div>
       
</div>  
<?php get_sidebar(); ?>
</div>
<div class="right_mian">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
<?php if(is_single()):?> <div class="title_page"><h1><?php the_title();?></h1></div>
<?php endif; ?>


  <div class="enter"> <?php the_content(); ?></div>
 <?php endwhile; endif; ?>

<div id="respond">
 <?php if ( comments_open() ){ comments_template();} ?>
</div>
</div>
</div>

<?php get_footer(); ?>
