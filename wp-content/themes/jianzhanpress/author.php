<?php get_header(author); ?>
<div id="author_page_content">
	<div id="author_info_box">




	<?php
    if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name);
    else :
        $curauth = get_userdata(intval($author));
    endif;
    ?>

    	<div class="author_avatar"><div class="avatar-img img-responsive author_avatar_img" ><?php echo get_avatar(get_the_author_meta('ID')); ?></div></div>
        <div class="author_info">
        	<div class="author_info_top">
            	<a href="#" title="<?php echo $curauth->nickname; ?>" class="author_info_name"><?php echo $curauth->nickname; ?></a>
            	
            </div>
            <p class="uc_top_info_desc">
            	                <attr title="<?php echo $curauth->user_description; ?>"><?php echo $curauth->user_description; ?></attr> </p>
        </div>
        <div class="uc_top_stat">
        	<p class="uc_top_stat_item">文章数：<span><?php the_author_posts(); ?></span></p>

            <p class="uc_top_stat_item">
            	<a class="author_stat_btn" id="author_stat_btn_weibo" href="<?php echo $curauth->user_url; ?>" target="_blank" title="<?php echo $curauth->nickname; ?>的微博"></a>            	<a class="author_stat_btn" id="author_stat_btn_weixin" href="#" title="点击查看<?php echo $curauth->nickname; ?>的微信"><span id="author_weixin_qr"><?php the_author_meta('weixin'); ?></span></a>            </p>
            <script type="text/javascript">
            $(function(){
				$('#author_stat_btn_weixin').click(function(){
					$('#author_weixin_qr').show('slow');
					$('#author_weixin_qr').css('opacity','1');	
				});
			})
            </script>
        </div>
	</div>
</div>

    <div class="box" id="page_content" style="margin-top:10px;">
        <div id="page_left">
            <div id="article_list_box">
            	<div id="article_list">
                	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
<p>作者还木有发表任何文章</p>
<?php endif; ?>
</div>
            	<div><?php pagination($query_string); ?></div>
            </div>
        </div>
        <?php get_sidebar(author); ?>
        <div class="clear"></div>
    </div>
    

<script type="text/javascript">
    $(function(){
        $(window).resize(function(){
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>



<?php get_footer();
