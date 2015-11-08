<?php get_header(); ?>
<!-- category begin-->
<div id="main">
<div id="part">
<?php get_sidebar(); ?>
<div id="part_right">
<div class="title">产品展示<span>/ Product</span></div>
<div id="theread">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				

<p style="text-align:center;"> 

<?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?>
 
</p>
	


				<?php the_content('Read the rest of this entry &raquo;'); ?>

       
	<?php endwhile; else: ?>


		<p>Sorry, no posts matched your criteria.</p>
		

	<?php endif; ?>
</div>
<!-- theread end -->
</div>
<!-- part_right end-->
</div>
<!-- part end-->
</div>
<!-- category end-->
<?php get_footer(); ?>