<?php get_header(); ?>
<!-- 主体 -->
	


    <div class="box" id="page_content">
        <div id="page_left">
		<?php get_template_part( 'index', 'slider' ); // Loads index-slider.php template. ?>
		<?php get_template_part( 'index', 'toppic' ); // Loads index-toppic.php template. ?>
              
            <div id="article_list_box">
            	<div id="article_list">


<?php
	$post_num = 0; // 显示文章的数量.
	$args=array(
	'post_status' => 'publish',
	'paged' => $paged,
	'caller_get_posts' => 1,
	'posts_per_page' => $post_num
	);
	query_posts($args);
	// 主循环
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?> 							
<div class="article">
                    	<div class="article_left">
						<a href="<?php the_permalink() ?>" target="_blank" title="<?php the_title_attribute(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(180,120)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" width="180" height="120" border="0" alt="<?php the_title(); ?>">
						<?php } ?>
						</a>
						</div>
                        <div class="article_right">
                        	<h1 class="article_title"><a href="<?php the_permalink() ?>" target="_blank" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <p class="article_brief"><?php echo mb_strimwidth(strip_tags(apply_filters(‘the_content’, $post->post_content)), 0, 350,…); ?></p>
                            <div class="article_meta">
                            	<div class="article_author"><?php the_author_posts_link(); ?></div>
                                <div class="article_date"><?php the_time(get_option('date_format')) ?></div>
                                <div class="article_tag"><?php the_tags("","&nbsp;&nbsp;&nbsp;","");?></div>
                            </div>
                        </div>
 </div>


						<?php endwhile; else: ?>

						<p>没有内容</p>
								
						<?php endif; ?>







                	                </div>
            	<div>
				<?php pagination($query_string); ?>
				</div>
            </div>
        </div>


        
		<?php get_sidebar(index); ?>
        <div class="clear"></div>
    </div>



	

    <div id="friend_link_box">
    	<div id="friend_link_box_content" class="box">
            友情链接：
			<?php get_links(-1, '', '', '', TRUE, 'id', FALSE); ?>
			</div>
    </div>
    <style>#page_foot{ margin-top:0;}</style>



<script type="text/javascript">
    $(function(){
        $(window).resize(function(){
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>
	<!-- /主体 -->

<?php get_footer(); ?>