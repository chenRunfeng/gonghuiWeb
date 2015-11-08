<div id="top_slide">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li><li data-target="#myCarousel" data-slide-to="1"></li><li data-target="#myCarousel" data-slide-to="2"></li>                      </ol>
                      <div class="carousel-inner">
<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 1);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 1) );
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>



<!-- box -->											 
<div class="item active">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(660,360)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" width="660" height="360" border="0" alt="<?php the_title(); ?>">
						<?php } ?>
						</a>
                          <div class="container">
                            <div class="carousel-caption">
                              <h1><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h1>
                            </div>
                          </div>
</div>
						
  <!-- box end -->      

<?php endwhile; ?>
<?php else : ?><p>没有数据。</p>
<?php endif; wp_reset_query(); ?>

<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 3);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 2,'offset' => 1) );
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>



<!-- box -->											 
<div class="item">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(array(660,360)); ?>
						<?php } else {?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noneimg.png" width="660" height="360" border="0" alt="<?php the_title(); ?>">
						<?php } ?>
						</a>
                          <div class="container">
                            <div class="carousel-caption">
                              <h1><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h1>
                            </div>
                          </div>
</div>
						
  <!-- box end -->      

<?php endwhile; ?>
<?php else : ?><p>没有数据。</p>
<?php endif; wp_reset_query(); ?>

                          

						
						</div>
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
</div>

