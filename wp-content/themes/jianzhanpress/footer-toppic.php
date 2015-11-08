<div id="box_footer_hotpic">
	<div class="title"><p>热点推荐</p></div>
<ul>
<?php $cmntCnt = 1; ?>
<?php query_posts("showposts=3&cat=1")?>
<?php while (have_posts()) : the_post(); ?>
<li class="last<?php echo($cmntCnt++); ?>"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(120,80)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" border="0" alt="<?php the_title(); ?>">
						<?php } ?></a>
<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php echo cut_str($post->post_title,36); ?></a></h1>
<p><?php echo mb_strimwidth(strip_tags(apply_filters(‘the_content’, $post->post_content)), 0, 86,…); ?></p>
</li>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</ul>
</div>