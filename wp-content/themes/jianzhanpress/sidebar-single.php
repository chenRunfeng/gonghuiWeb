<!-- sidebar begin-->
<div id="page_right">
            
        	<div class="post_box no_margin_top" id="box_follow_us">
            	<div class="post_box_title">
                	<h1>关注我们</h1>
                </div>
                <div class="post_box_content">
            	<img src="<?php echo get_template_directory_uri(); ?>/images/weixin.png" style="margin-top:10px;" alt="微信公众号" />
            	</div>
            </div>
            <div class="post_box">
<div class="post_box_title"><h1>每周十大热门新闻</h1></div>
<div class="post_box_content">
<div class="best_post_item">
<?php $cmntCnt = 1; ?>
<?php 
function mostmonth($where = '') {
    //获取最近300天文章
    $where .= " AND post_date > '" . date('Y-m-d', strtotime('-3000 days')) . "'";
    return $where;
}
add_filter('posts_where', 'mostmonth'); ?>
<?php query_posts("v_sortby=views&caller_get_posts=1&orderby=date&v_orderby=desc&showposts=1&cat=1")?>
<?php while (have_posts()) : the_post(); ?>
<span style="color:#f30"><?php echo($cmntCnt++); ?></span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" class="best_post_link" style="font-weight:bold;"><?php echo cut_str($post->post_title,40); ?></a>
<p><?php echo mb_strimwidth(strip_tags(apply_filters(‘the_content’, $post->post_content)), 0, 350,…); ?></p>
<?php endwhile; ?>
</div>
<?php query_posts("showposts=9&offset=1&cat=1")?>
<?php while (have_posts()) : the_post(); ?>
<div class="best_post_item">
<span style="color:#f30"><?php echo($cmntCnt++); ?></span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" class="best_post_link"><?php echo cut_str($post->post_title,40); ?></a></div>
<?php endwhile; ?>


              	
							  </div>
</div>

<div class="post_box" style=" margin-top:0;margin-bottom:20px; border-top:0;">
<div class="post_box_title" style="border-bottom:0"><h1><a href="#" title="热门标签" target="_blank">热门标签</a></h1></div>
<div class="post_box_content">
<!-- <?php wp_tag_cloud('smallest=12&largest=12&unit=px&number=20&orderby=count&order=DESC');?> -->
<?php wp_tag_cloud('smallest=12&largest=12&number=20&orderby=count&order=DESC'); ?>
</div>

</div>


	<div class="clear" style="height:6px;"></div>
<div class="post_box">            	<div class="post_box_title">
                	<h1><a href="#" title="用品相关文章" target="_blank">用品相关文章</a></h1>
                </div>
                <div class="post_box_content">
                	<div class="post_box_headline">
                    	<?php query_posts("showposts=1&cat=72")?>
<?php while (have_posts()) : the_post(); ?>
<div class="post_box_headline_image"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(120,80)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" width="120" height="80" border="0" alt="<?php the_title(); ?>">
						<?php } ?></a></div>
<div class="post_box_headline_title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></div>
                    	<div class="clear"></div>
<?php endwhile; ?>
                    </div>
                    <div class="post_box_list">
                    	<ul>
<?php query_posts("showposts=5&cat=84,85,86,87,88,89,90,91,92,93,94&offset=1")?>
<?php while (have_posts()) : the_post(); ?>
<li class="post_box_list_item"><span></span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php echo cut_str($post->post_title,38); ?></a>
<div class="clear"></div>
</li>
<?php endwhile; ?>
</ul>
                    </div>
                </div>
            </div><div class="post_box">            	<div class="post_box_title">
                	<h1><a href="#" title="服务相关文章" target="_blank">服务相关文章</a></h1>
                </div>
                <div class="post_box_content">
                	<div class="post_box_headline">
                    	<?php query_posts("showposts=1&cat=80,81")?>
<?php while (have_posts()) : the_post(); ?>
<div class="post_box_headline_image"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(120,80)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" width="120" height="80" border="0" alt="<?php the_title(); ?>">
						<?php } ?></a></div>
<div class="post_box_headline_title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></div>
                    	<div class="clear"></div>
<?php endwhile; ?>
                    </div>
                    <div class="post_box_list">
                    	<ul>
<?php query_posts("showposts=5&cat=95,96,97,98,99,100&offset=1")?>
<?php while (have_posts()) : the_post(); ?>
<li class="post_box_list_item"><span></span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php echo cut_str($post->post_title,38); ?></a>
<div class="clear"></div>
</li>
<?php endwhile; ?>
</ul>
                    </div>
                </div>
            </div><div class="post_box">            	<div class="post_box_title">
                	<h1><a href="#" title="知识相关文章" target="_blank">知识相关文章</a></h1>
                </div>
                <div class="post_box_content">
                	<div class="post_box_headline">

<?php query_posts("showposts=1&cat=1,108")?>
<?php while (have_posts()) : the_post(); ?>
<div class="post_box_headline_image"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(120,80)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" width="120" height="80" border="0" alt="<?php the_title(); ?>">
						<?php } ?></a></div>
<div class="post_box_headline_title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></div>
                    	<div class="clear"></div>
<?php endwhile; ?>
                    	
                    </div>
                    <div class="post_box_list">
                    	<ul>
<?php query_posts("showposts=5&cat=101,102,103,104,105,106,107,108&offset=1")?>
<?php while (have_posts()) : the_post(); ?>
<li class="post_box_list_item"><span></span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php echo cut_str($post->post_title,38); ?></a>
<div class="clear"></div>
</li>
<?php endwhile; ?>
</ul>
                    </div>
                </div>
            </div>	
			
        </div>
<!-- sidebar end-->


