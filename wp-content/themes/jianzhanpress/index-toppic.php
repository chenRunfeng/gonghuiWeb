<div class="topic_box">
            	<div class="topic_box_left">热门推荐</div>
                <div class="topic_box_right">
				<?php echo of_get_option( 'hotpic_right_text', 'no entry'); ?>
				</div>
                <div class="clear"></div>
</div>
<div class="topic_box_list">	
<div class="above">
<ul>
<?php $cmntCnt = 1; ?>
<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 6);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 3,'offset' => 3) );
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li class="last<?php echo($cmntCnt++); ?>"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(240,160)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" width="240" height="160" border="0" alt="<?php the_title(); ?>">
						<?php } ?>
						</a>
<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php echo cut_str($post->post_title,30); ?></a>
</li>
<?php endwhile; ?>
<?php else : ?><p>没有数据。</p>
<?php endif; wp_reset_query(); ?>
</ul>
</div>
<div class="under">
<div class="under_left">
<div class="title">
<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 7);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 1,'offset' => 6) );
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php echo cut_str($post->post_title,38); ?></a>
<?php endwhile; ?>
<?php else : ?><p>没有数据。</p>
<?php endif; wp_reset_query(); ?>
</div>
<!-- title -->
<div class="title_two">
<ul>
<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 9);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 2,'offset' => 7) );
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li>[<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php echo cut_str($post->post_title,18); ?></a>]</li>
<?php endwhile; ?>
<?php else : ?><p>没有数据。</p>
<?php endif; wp_reset_query(); ?>
</ul>
</div>
<!-- title -->
<ul>
<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 17);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 8,'offset' => 9) );
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php echo cut_str($post->post_title,42); ?></a></li>
<?php endwhile; ?>
<?php else : ?><p>没有数据。</p>
<?php endif; wp_reset_query(); ?>
</ul>
</div>
<div class="under_right">
<div class="title"><span><a href="#">投稿</a></span>专栏</div>
<div class="pic">
<ul>
<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 18);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 1,'cat' => 1) );
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(240,160)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" width="120" height="80" border="0" alt="<?php the_title(); ?>">
						<?php } ?>
						</a>
		        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
</li>
<?php endwhile; ?>
<?php else : ?><p>没有数据。</p>
<?php endif; wp_reset_query(); ?>
</ul>
</div>
<ul>
<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 24);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 6,'offset' => 1,'cat' => 1) );
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li>
<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php echo cut_str($post->post_title,32); ?></a>
</li>
<?php endwhile; ?>
<?php else : ?><p>没有数据。</p>
<?php endif; wp_reset_query(); ?>
</ul>
</div>
</div>
<!-- under -->
 <div class="clear"></div>
</div>