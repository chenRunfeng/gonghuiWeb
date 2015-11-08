<?php get_header(); ?>
<!-- page begin-->

<!-- 主体 -->
	


    <div class="box" id="page_content">
    	<div id="single_page_left">
            <div class="list-group">
<a href="<?php bloginfo('url'); ?>" class="list-group-item active">网站首页</a>
<a href="<?php bloginfo('url'); ?>/?page_id=2" class="list-group-item">关于我们</a>
<a href="<?php bloginfo('url'); ?>/?page_id=53" class="list-group-item">加入我们</a>
<a href="<?php bloginfo('url'); ?>/?page_id=55" class="list-group-item">寻求报道</a>
<a href="<?php bloginfo('url'); ?>/?page_id=51" class="list-group-item">广告服务</a>
<a href="<?php bloginfo('url'); ?>/?page_id=49" class="list-group-item">投稿推荐</a>
<a href="<?php bloginfo('url'); ?>/?page_id=57" class="list-group-item">联系我们</a>
         </div>
        </div>
        <div id="single_page_right">
        <ol id="position_bar" class="breadcrumb">
          <li><a href="/">首页</a></li>
          <li class="active"><?php the_title(); ?></li>
        </ol>
        <div id="article_content">
        	<div id="single_article_title"><?php the_title(); ?></div>
        	<div id="article_description">
            	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				


	


				<?php the_content('Read the rest of this entry &raquo;'); ?>


	<?php endwhile; else: ?>


		<p>Sorry, no posts matched your criteria.</p>
		

	<?php endif; ?>
            </div>                
        </div>
        </div>
        <div class="clear" style="height:30px;"></div>
    </div>
    


<?php get_template_part( 'footer', 'toppic' ); // Loads footer-toppic.php template. ?>
<script type="text/javascript">
    $(function(){
        $(window).resize(function(){
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>
	<!-- /主体 -->


<!-- page end-->
<?php get_footer(); ?>