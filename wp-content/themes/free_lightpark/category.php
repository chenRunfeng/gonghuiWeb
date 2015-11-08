<?php get_header();
 
?>	
<div id="page_top" <?php if(get_option('mytheme_top_pic')!=""){ echo 'style="background:url('.get_option('mytheme_top_pic').')"';} ?> >

<div class="page_top_in">
   <?php    $cat = get_category_root_id(the_category_ID(false));
		           $cat2 = get_query_var('cat'); 
				   $category2 = get_category($cat2);
                   $category = get_category($cat);
				   ?>    
<h1>    <?php if ( get_category_children($cat) != "" ) { echo $category->name . ' <a>'.$category->slug  .' </a>' ;} else{echo $category2->name . ' <a>'.$category2->slug  .' </a>'; }?> </a></h1>
     <?php if ( get_category_children($cat) != "" ) {echo category_description($cat); } else{echo category_description($cat2); }?> 
</div>

</div>
<div id="page_muen_nav">  <b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{if (function_exists('get_breadcrumbs')){get_breadcrumbs();}}?></div>

<div id="content">
<div class="left_mian"><?php get_template_part( 'left' ); ?></div>
<div class="right_mian">

 <ul class="news_loop_01" id="default">
 
   <?php if(get_option('mytheme_list_nmber2')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber2');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
           <li id="fist">
             <a   href="<?php the_permalink() ?>" class="news_001_pic"> <?php  $tit= get_the_title();
					if (has_post_thumbnail()) { the_post_thumbnail('default-list-thumbb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> 
                    
                    </a>
              <span>
             <b><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></b>
             <a class="time">TIME:<?php the_time('Y-m-d') ?></a>
             <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),  0,300,"..."); ?></p>
             <a href="<?php the_permalink() ?>" class="news_btn">MORE>></a>
             </span>
           </li>
             <?php endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>      

           </ul> 
           
             <div class="pager">   <?php par_pagenavi(); ?>  </div>  

</div>
</div>  
    
<?php get_footer(); ?>
