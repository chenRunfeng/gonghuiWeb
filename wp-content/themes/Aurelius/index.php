<?php get_header();?>
	<!-- Column 1 /Content -->
	<div class="grid_8">
		<!-- Blog Post -->
	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
         <!-- Post Title -->
         <h3 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            <!-- Post Data -->
            <?php the_tags('标签：', ', ', ''); the_time('Y年n月j日')?>
            <div class="hr dotted clearfix">&nbsp;</div>
            <!-- Post Image -->
            <img class="thumb" alt="" src="<?php bloginfo('template_url'); ?>/images/610x150.gif" />
            <!-- Post Content -->
            <?php the_excerpt(); ?>
            <!-- Read More Button -->
            <p class="clearfix"><a href="<?php the_permalink(); ?>" class="button right"> Read More...</a></p>
        </div>
        <div class="hr clearfix">&nbsp;</div>
		<?php endwhile; ?>
		<!-- Blog Navigation -->
		<p class="clearfix"> <a href="#" class="button float">&lt;&lt; Previous Posts</a> <a href="#" class="button float right">Newer Posts >></a> </p>
		 <?php else : ?>
        <h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
        <p>没有找到任何文章！</p>
        <?php endif; ?>
	</div>
	<!-- Column 2 / Sidebar -->
	<div class="grid_4">
		<h4>Catagories</h4>
		<ul class="sidebar">
			<li><a href="">So who are we?</a></li>
			<li><a href="">Philosophy</a></li>
			<li><a href="">History</a></li>
			<li><a href="">Jobs</a></li>
			<li><a href="">Staff</a></li>
			<li><a href="">Clients</a></li>
		</ul>
		<h4>Archives</h4>
		<ul class="sidebar">
			<li><a href="">January 2010</a></li>
			<li><a href="">December 2009</a></li>
			<li><a href="">Novemeber 2009</a></li>
			<li><a href="">October 2009</a></li>
			<li><a href="">September 2009</a></li>
			<li><a href="">August 2009</a></li>
		</ul>
	</div>
	<div class="hr grid_12 clearfix">&nbsp;</div>
	<!-- Footer -->
	<p class="grid_12 footer clearfix"> <span class="float"><strong>Design By</strong> QwibbleDesigns&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Code By</strong> <a href="http://www.ludou.org/">Ludou</a></span> <a class="float right" href="#">top</a> </p>
</div>
<!--end wrapper-->
</body>
</html>
