<?php get_header();
$word_t8=get_option('mytheme_word_t8');
$word_t12=get_option('mytheme_word_t12');
?>	
<div id="page_top">
<div class="page_top_in">
  
<h1>   <?php if($word_t12!=""){echo $word_t12;}else{echo '找到标签：';} single_tag_title(); ?></h1>
    <p><?php if($word_t8!=""){echo $word_t8;}else{echo 'Screening using labels article';}  ?></p>
</div>

</div>

<div id="page_muen_nav">  <b><?php if(get_option('mytheme_word_t11')==""){echo  '您现在所在的位置';}else{ echo get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{if (function_exists('get_breadcrumbs')){get_breadcrumbs();}}?></div>

<?php get_template_part( 'category/product_nav' ); ?>
<div id="content">
<div class="left_mian"><?php get_sidebar(); ?></div>
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

</div>
</div>  
    
<?php get_footer(); ?>
