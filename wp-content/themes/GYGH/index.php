<?php get_header();?>

</div>
</div>
<?php
$args = array(
  'post_type'=>'slider_type',
  'orderby'=>'menu_order',
  'showposts'=>6
);
query_posts($args);
?>
<?php if(have_posts()): ?>
<div class="h25"></div>
<div class="shang">
<div class="datu">
  <div id="wrapper">
    <div id="slider-wrapper">
      <div id="slider" class="nivoSlider">
		      <?php
				while(have_posts()): the_post();
				$slider_pic = get_post_meta($post->ID,'ashuwp_slider_pic',true);
				$slider_link = get_post_meta($post->ID,'ashuwp_slider_link',true);
				?>
			<a href="<?php echo $slider_link; ?>" target="_blank"><img src="<?php echo $slider_pic ?>" title="<?php the_title(); ?>" /></a>
			<?php endwhile; ?>
        </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong><a href="http://www.divcss5.com/">DIVCSS5幻灯hnhh片测试</a></strong>
            </div>
    </div>
</div>
<?php endif; wp_reset_query(); ?>

</div>
<div class="shang2">
<div><img src="<?php bloginfo('template_url'); ?>/images/11.gif" width="260" height="142" /></div>
 <div >
 <form action="" method="get">
<div id="search-box">
	<input type="text" class="input-box" value=" 广东医学院搜索" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:#999999" />
    <input name="" type="submit" value="搜索" class="button" />
</div>
</form>
 </div>
 <div align="left" class="liuyan" style="font-size: 16px; font-weight: bold;">
 留言板
 </div>
  <div class="liuyan" align="left">
    <form id="form1" name=form1" method="post" action="">
      <label form="textarea"></label>
      <textarea name="textarea" id="textarea" cols="39" rows="5" class="liuyan-box" ></textarea>
      <div align="right" class="tijiao"><input type="button" value="提交"  /></div>
    </form>
   
  </div>
</div> 
</div>

&nbsp;
<div class="zhongjian">
  <div class="part1">
  <div class="part1-1" style="font-size: 18px; color: #039; font-weight: bold;">最新动态
  </div>
    <div class="part1-2"><img src="<?php bloginfo('template_url'); ?>/images/BANNER下方图片.png" width="243" height="172" /></div>
</div>
  <?php
    /*根据文章ID获取分类ID —— 文章页调用
	$post_id = $post->ID; 
	$category = get_the_category($post_id); 	
	$cat_id = $category[0]->cat_ID;
	$cat_name = $category[0]->cat_name;
	*/
	$cat_id ='最新动态'; //指定分类ID
	$args = array( 
				'category_name' => $cat_id,  //分类ID
				'orderby' => 'ID',
				'order' => 'ASC',
				'showposts'=>7,
				);
	query_posts( $args );
	if( have_posts() ) : while( have_posts() ) : the_post();
  ?>
  <div class="part2">
  <table width="450" height="160
  " border="0" cellpadding="0" cellspacing="0" class="part2-1">
  <tr>
    <td width="354"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></td>
    <td width="113"><?php the_time(get_option(date_format))?></td>
  </tr>
  <?php endwhile;endif;?>
</table>
  </div>
  <div class="part3">
  <div class="part3-2">
    <img src="<?php bloginfo('template_url'); ?>/images/2337524_160720262174_2.png" width="260" height="260" /> </div>
  <div class="part3-1" style="font-family: '宋体'; color: #039; font-size: 18px; font-weight: bold;">最新通知</div>
  <div id="up_zzjs">
<div id="marqueebox">
<div id="up_li">
  <?php
    /*根据文章ID获取分类ID —— 文章页调用
	$post_id = $post->ID; 
	$category = get_the_category($post_id); 	
	$cat_id = $category[0]->cat_ID;
	$cat_name = $category[0]->cat_name;
	*/
	$cat_name ='最新通知'; //指定分类ID
	$args = array( 
				'category_name' => $cat_name,  //分类ID
				'orderby' => 'ID',
				'order' => 'ASC'
				);
	query_posts( $args );
	for($i=0;$i<6;$i++)
	{
	  if( have_posts())
	  {
	    the_post();
     ?>
<div id="up_li">
  <p><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a></p>
  </div>
  <?php
	  }
	  else{
	  break;
	  }
	}
	 // : while( have_posts() ) : the_post();
  ?>
<script language="javascript">
function startmarquee(lh,speed,delay) {
var p=false;
var t;
var o=document.getElementById("marqueebox");
o.innerHTML+=o.innerHTML;
o.style.marginTop=0;
o.onmouseover=function(){p=true;}
o.onmouseout=function(){p=false;}
function start(){
t=setInterval(scrolling,speed);
if(!p) o.style.marginTop=parseInt(o.style.marginTop)-1+"px";
}

function scrolling(){
if(parseInt(o.style.marginTop)%lh!=0){
o.style.marginTop=parseInt(o.style.marginTop)-1+"px";
if(Math.abs(parseInt(o.style.marginTop))>=o.scrollHeight/2) o.style.marginTop=0;
}else{
clearInterval(t);
setTimeout(start,delay);
}
}
setTimeout(start,delay);
}
startmarquee(20,20,1500);
</script>
  </div>
  </div>
  </div>
  </div>
</div>

<?php get_footer(); ?>
