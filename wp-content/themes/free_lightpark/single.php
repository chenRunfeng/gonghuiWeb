<?php get_header();?>
<div id="page_top" <?php if(get_option('mytheme_top_pic')!=""){ echo 'style="background:url('.get_option('mytheme_top_pic').')"';} ?> >

<div class="page_top_in">
   <?php    $cat = get_category_root_id(the_category_ID(false));
                   $category = get_category($cat);?>
                        
<h1> <?php echo $category->name  . ' <a>'.$category->slug.' </a>'?></h1>
   <p><?php echo category_description($cat)?> </p>
</div>


</div>

<div id="page_muen_nav">  <b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{if (function_exists('get_breadcrumbs')){get_breadcrumbs();}}?></div>

<div id="content">
<div class="left_mian">
<div class="widget">
  <div class="widget_zs"></div>
     <?php    $cat = get_category_root_id(the_category_ID(false));
                   $category = get_category($cat);
				  $category_link=  get_category_link($cat);
				   ?>
          <h2>
          <?php echo '<a href="'. $category_link .'">'.$category->name   . ' <b>'.$category->slug.' </b>'; ?> </a></h2> 
          <ul class="nav_left">  <?php  if ( get_category_children($cat) != "" ) {wp_list_categories("child_of=".$cat. "&depth=0&hide_empty=0&title_li="); }?></ul>
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
