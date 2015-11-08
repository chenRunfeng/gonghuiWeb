<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1" />	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="keywords" content=" <?php
    // 如果是首页和文章列表页面
    if(is_front_page() || is_home()) { 
	echo get_option('mytheme_keywords');} else if( is_page()) {
        if(get_post_meta($post->ID, "关键字",true)){
		echo get_post_meta($post->ID, "关键字",true);}
		else{
		echo get_post_meta($post->ID, "关键字",true);
		}
	} else if(is_single()) {
  if(get_post_meta($post->ID, "关键字",true)){
		 if(get_post_meta($post->ID, "关键字",true)){
		echo get_post_meta($post->ID, "关键字",true);}
		else{
			echo get_option('mytheme_keywords');
		}
		}
	// 如果是类目页面, 显示类目表述
	}  else {
		echo get_option('mytheme_keywords');
	}
?>  
    " />
 <meta name="description" content="
<?php		
 // 如果是首页和文章列表页面
	if(is_front_page() || is_home()) { 
	echo get_option('mytheme_description');
 
	// 如果是文章详细页面和独立页面
	}
 else if(is_page() ) {
		if(get_post_meta($post->ID, "描述",true)){
		echo get_post_meta($post->ID, "描述",true);}
		else{
			echo  substr(strip_tags($post->post_content), 0, 420);
		}
	// 如果是类目页面, 显示类目表述
	} 
	 else if(is_single() ) {
		 if(get_post_meta($post->ID, "描述",true)){
		echo get_post_meta($post->ID, "描述",true);}
		else{
			echo  substr(strip_tags($post->post_content), 0, 420);
		}
	
	// 如果是类目页面, 显示类目表述
	}  else {
		echo   get_option('mytheme_description');
	}
?>
" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		   if(get_option('mytheme_word_t12')==""){$word_t12='找到标签';}else{ $word_t12=get_option('mytheme_word_t12');};
		   if(get_option('mytheme_word_t9')!=""){$word_t9=get_option('mytheme_word_t9');}else{$word_t9='搜索结果：';}  
		     if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';}  
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title($word_t12."&quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo '  - '; }
		      elseif (is_search()) {
		         echo $word_t9.' &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo $word_t10.'- '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged;echo ' - '; bloginfo('description'); }
		   ?>
          
	</title>
	<?php $logo= get_option('mytheme_logo') ;
	        $ico= get_option('mytheme_ico');
	
	?>
	<link rel="shortcut icon" href="<?php echo $ico; ?>" type="image/x-icon" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?><?php wp_head(); ?>

    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a , textarea , ol , p , span , h1 , h2 , h3 , h4 , h5');
		
    </script>

    
    
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	
       <div id="header">
            <div class="top">
            
                <div class="top_in">
                    <span class="tell"><b></b><a><?php echo get_option('mytheme_tell');  ?></a></span>
                    <span class="mail"><b></b><a><?php echo get_option('mytheme_email');  ?></a></span>
                    
                     <?php
		    $default_language=get_option('mytheme_default_language');
			$default_language_link=get_option('mytheme_default_language_link');
			$language1=get_option('mytheme_language1');
			$language2=get_option('mytheme_language2');
			$language3=get_option('mytheme_language3');
			$language4=get_option('mytheme_language4');
			$language_link1=get_option('mytheme_language_link1');
			$language_link2=get_option('mytheme_language_link2');
			$language_link3=get_option('mytheme_language_link3');
			$language_link4=get_option('mytheme_language_link4');

		    ?>
                    <span id="Language"><b></b>
                   <?php if( $default_language_link !=""){ echo '<a href="'.$default_language_link.'">';}else{ echo '<a>';} 
				         if($default_language ==""){ echo '简体中文';}else{echo $default_language;} 
				   ?>
                    </a><?php if($language1 !=""){echo '<a class="jiantou"></a></span><div class="Language_c"></a>'.'<a href="'.$language_link1.'">'.$language1.'</a>' ;
					          if($language2 !=""){echo '<a href="'.$language_link2.'">'.$language2.'</a>' ;};
						      if($language3 !=""){echo '<a href="'.$language_link3.'">'.$language3.'</a>' ;};
						      if($language4 !=""){echo '<a href="'.$language_link4.'">'.$language4.'</a>' ;};
                              echo '</div>';
				              	} else{ echo '</span>' ;}
					?>
                    
                    
                       
                     
                    

                </div>
            </div>
            <div id="header_in">
                <a href="<?php bloginfo('url'); ?>" class="logo"><img src="<?php  if($logo==""){ echo get_bloginfo('template_url').'/images/logo.png';}else{echo $logo; } ?>" /></a>
                
                <div class="search">
                     <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
                             <label for="s" class="screen-reader-text">Search for:</label>
                            
                             <input type="text" id="s" name="s" value="" />
                              <?php $select = wp_dropdown_categories('class=search_select&show_option_all=ALL&orderby=name&hierarchical=1&selected=-1&depth=1');?>
                              <input type="submit" value="SEARCH" id="searchsubmit" />
                          </form>
                </div>
            </div>
            <div id="nav">
            <?php wp_nav_menu(array( 'theme_location' => 'hezdr_m','menu_class'=> 'menu_nav' ) ); ?>
            
            </div>
            
		</div>

