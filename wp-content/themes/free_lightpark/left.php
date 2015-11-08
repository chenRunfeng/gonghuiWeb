<div class="widget">
  <div class="widget_zs"></div>
       <?php       $cat = get_category_root_id(the_category_ID(false));
		           $cat2 = get_query_var('cat'); 
				   $category2 = get_category($cat2);
                   $category = get_category($cat);?>
          <h2>
        <a href="<?php if ( get_category_children($cat) != "" ) { echo   get_category_link($cat);} else{ echo  get_category_link($cat2);} ; ?>">
           <?php if ( get_category_children($cat) != "" ) { echo $category->name . ' <b>'.$category->slug  .' </b>' ;} else{echo $category2->name . ' <b>'.$category2->slug  .' </b>'; }?> </a></h2> 
        
          <ul class="nav_left"> <?php  if ( get_category_children($cat) != "" ) {wp_list_categories("child_of=".$cat. "&depth=0&hide_empty=0&title_li="); }?></ul>
           <div class="nav_contact">
           <a>联系电话</a>
           <b><?php echo get_option('mytheme_tell');  ?></b>
           </div>
       
</div>  
<?php get_sidebar(); ?>