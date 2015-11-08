<div class="modle">
<b>选取颜色模板只有付费版本才能使用，具体请查看付费版本介绍：<br /><br /><br /><a target="_blank" href="http://www.themepark.com.cn/qjqywordpresszt.html"> http://www.themepark.com.cn/qjqywordpresszt.html</a><br /><br /><br />
付费版演示：<br /><br /><br /><a target="_blank" href="http://www.themepark.com.cn/demo/?themedemo=lightpark-yanshi"> http://www.themepark.com.cn/demo/?themedemo=lightpark-yanshi</a></b>

</div> 
                <div class="up">
                 
                     
                    <b class="bt">ICO图标上传</b>
                    <input type="text" size="80"  name="ico" id="ico" value="<?php echo get_option('mytheme_ico'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                    <p><a href="http://www.themepark.com.cn/icotpssmrhzzicowj.html" target="_blank">ico是什么？ico图片制作教程</a></p>
                </div>       
                
                
                
				<div class="up">
                  <b class="bt">LOGO的图片地址</b>
                     <div class="yulan">
                  <?php if (get_option('mytheme_logo')!=""): ?>
                    <img title="logo预览" src="<?php echo get_option('mytheme_logo'); ?>"alt="logo预览" /> 
                 <?php else : ?>
                    <img title="上传图片，这里可以预览" src="<?php bloginfo('template_url'); ?>/images/xuanxiang/yulan2.gif"alt="上传图片，这里可以预览"/>
                    <?php endif; ?>  
                    
                     </div>
                    <input type="text" size="80"  name="logo" id="logo" value="<?php echo get_option('mytheme_logo'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                    <p>请上传logo图片，图片格式为PNG,或者带有深色底色的jpg和gif均可（ 高度为100px，宽度自定，宽度请勿上传太大，以防止导航位置不够。）</p>
                </div>    
                
                
                	
                
            
              <div class="xiaot">
                      <b class="bt">调用数据选项</b><br />
                      <p>你建立了一些分类和页面，想要他们调用在首页上，程序傻傻分不清楚，所以你要手动选择一下，在选择之前，一定要记得建立好分类和页面哦！<strong>小提示，有的模块只有指定了分类他们才会显示，如果不指定，他们是不会显示的，所以你可以自由的选择哪些模版需要在首页显示，哪些模块不需要在首页显示！</strong>你可以点击这里对照演示主题的样式：<a  target="_blank" href="http://www.themepark.com.cn/demo/?themedemo=lightpark-yanshi">首页演示</a></p>
                    
                      </p>
                        </div>
                     <div class="xiaot">
                     <b class="bt">焦点图</b><br />
                     <img  src="<?php bloginfo('template_url'); ?>/images/xuanxiang/themepark-help_02.jpg" />
                    <p>这个主题的焦点图是使用文章来调用的，这样你就可以设置无线张数的焦点图，并且程序更加优化，建立一个分类，目录并在下面指定，即可使用文章编辑中的焦点图选项调用了。</p>
              <label  for="hot_cat">请选择分类目录:</label>
                  <select name="hot_cat" id="hot_cat">
	 <option value=''>请选择</option>
		<?php 
		 $categorys = get_categories(array('hide_empty' => 0));
		 $hot_cat= get_option('mytheme_hot_cat');
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $hot_cat == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
   <p>目前最大限制为20张焦点图，设置过多的焦点图可能会使你的网站加载变慢，推荐设置5张以下的焦点图，并且在上传时，请压缩图片到最小<a target="_blank" href="http://www.themepark.com.cn/sqzykflhdwtxw.html">如何压缩图片？</a></p> 
                      </div>
                      
  
            
           
                      
                      
                       <div class="xiaot">
                     <b class="bt">产品展示</b><br />
                      <img  src="<?php bloginfo('template_url'); ?>/images/xuanxiang/themepark-he5456.jpg" />
                     <p>产品展示可以调用最新产品【<a href="http://www.themepark.com.cn/qjqywordpresszt.html">付费版可以调用滚动展示产品</a>】</p>
             <?php  
			         $case_title=get_option('mytheme_case_title');
					 $case_title2=get_option('mytheme_case_title2');
					 $case_title3=get_option('mytheme_case_title3');
					 $case_en=get_option('mytheme_case_en');
			         $case1=get_option('mytheme_case1'); 
					 $case2=get_option('mytheme_case2'); 
					 $case3=get_option('mytheme_case3');  
			 ?>
             
                 
             
             <p>标题：<br />
              <label  for="case2_bt">中文：</label>        
           <input type="text" size="20"  name="case_title" id="case_title" value="<?php if($case_title!=""){echo $case_title;}else {echo '最新';} ?>"/> 
           <input type="text" size="20"  name="case_title2" id="case_title2" value="<?php if($case_title2!=""){echo $case_title2;}else {echo '产品';} ?>"/>  
            <input type="text" size="20"  name="case_title3" id="case_title3" value="<?php if($case_title3!=""){echo $case_title3;}else {echo '展示';} ?>"/> <br />
            <label  for="case2_bt">英文：</label>        
           <input type="text" size="20"  name="case_en" id="case_en" value="<?php if($case_en1!=""){echo $case_en1;}else {echo 'Our latest work';} ?>"/> 
             
             </p>
             
              <label  for="case1">请选择分类目录:</label>
                  <select name="case1" id="case1">
	 <option value=''>请选择</option>
		<?php 
		 $categorys = get_categories(array('hide_empty' => 0));
		 $case1= get_option('mytheme_case1');
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if (  $case1== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select><br />

                      </div>    
            
            
                     
            
            
    
                 <div class="xiaot">
                     <b class="bt">新闻目录(左)</b><br />
                        <img  src="<?php bloginfo('template_url'); ?>/images/xuanxiang/themepark-he2221lp.jpg" />
                    <p>请按照提示，选择一个分类目录，这将会调用在首页上，标题你也可以重新自定义</p>
              <label  for="news1">请选择分类目录:</label>
                  <select name="news1" id="news1">
	 <option value=''>请选择</option>
		<?php 
		 $categorys = get_categories(array('hide_empty' => 0));
		 $news1= get_option('mytheme_news1');
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if (  $news1== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
    
     <p>模块标题</p>
           <?php   $news1_bt_b1=get_option('mytheme_news1_bt_b1');
		           $news1_bt_b2=get_option('mytheme_news1_bt_b2');
		           $news1_bt_a=get_option('mytheme_news1_bt_a');
				   $news1_bt_p=get_option('mytheme_news1_bt_p');
		    ?>
           
           <label  for="case2_bt">"中文："</label>        
           <input type="text" size="20"  name="news1_bt_b1" id="news1_bt_b1" value="<?php if($news1_bt_b1!=""){echo $news1_bt_b1;}else {echo '最新';} ?>"/> 
           <input type="text" size="20"  name="news1_bt_a" id="news1_bt_a" value="<?php if($news1_bt_a!=""){echo $news1_bt_a;}else {echo '公司';} ?>"/>  
           <input type="text" size="20"  name="news1_bt_b2" id="news1_bt_b2" value="<?php if($news1_bt_b2!=""){echo $news1_bt_b2;}else {echo '动态';} ?>"/>  
         
          <p>
           <label  for="case2_bt">"英文："</label>  
           <input type="text" size="60"  name="news1_bt_p" id="news1_bt_p" value="<?php if($news1_bt_p!=""){echo $news1_bt_p;}else {echo 'COMPANY NEWS';} ?>"/  /> 
           </p> 
                     
                      </div>      
                      
           
                                     
           
                 <div class="xiaot">
                     <b class="bt">新闻目录和视频（右）</b><br />
                    <p>这里你可以选择另一个文字为主的分类目录列表，并且可以设定一个视频，如果不想设定视频，此处也接受html自定义代码（如图片）的输入。</p>
              <label  for="news2">请选择分类目录:</label>
                  <select name="news2" id="news2">
	 <option value=''>请选择</option>
		<?php 
		 $categorys = get_categories(array('hide_empty' => 0));
		 $news2= get_option('mytheme_news2');
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if (  $news2== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
    
     <p>模块标题</p>
           <?php   $news2_bt_b1=get_option('mytheme_news2_bt_b1');
		            $news2_bt_b1=get_option('mytheme_news2_bt_b2');
		           $news2_bt_a=get_option('mytheme_news2_bt_a'); 
				   $news2_bt_p=get_option('mytheme_news2_bt_p');
		    ?>
           
           <label  for="case2_bt">"中文："</label>        
           <input type="text" size="20"  name="news2_bt_b1" id="news2_bt_b1" value="<?php if($news2_bt_b1!=""){echo $news2_bt_b1;}else {echo '最新';} ?>"/> 
           <input type="text" size="20"  name="news2_bt_a" id="news2_bt_a" value="<?php if($news2_bt_a!=""){echo $news2_bt_a;}else {echo '行业';} ?>"/> 
            <input type="text" size="20"  name="news2_bt_b2" id="news2_bt_b2" value="<?php if($news2_bt_b2!=""){echo $news1_bt_b2;}else {echo '资讯';} ?>"/>   
         
          <p>
           <label  for="case2_bt">"英文："</label>  
           <input type="text" size="60"  name="news2_bt_p" id="news2_bt_p" value="<?php if($news2_bt_p!=""){echo $news2_bt_p;}else {echo 'INDUSTRY NEWS';} ?>"/  /> 
           </p> 
           
           
           <p>视频[视频请复制优酷等通用视频代码粘贴在此，此处也支持html代码]</p>
            <textarea name="video" cols="86" rows="4" id="video"><?php echo stripslashes(get_option('mytheme_video')); ?></textarea>    
                     
                      </div>      
                                                     
            
            
            
                       
                                                     
            
            
           <div class="xiaot">
                     <b class="bt">底部文章</b><br />
                    <p>在网站的底部，可以看到一个六图的展示，这里你可以设定一个分类目录，将这些内容以小图的方式展示出来，你也可以上传一张图片来代替这个列表展示。</p>
                     <?php   $footer_loop=get_option('mytheme_footer_loop'); 
		                     $footer_loop_bt=get_option('mytheme_footer_loop_bt'); 
				             $footer_loop_other=get_option('mytheme_footer_loop_other');	
				     
		    ?>
              <label  for="footer_loop">请选择分类目录:</label>
                  <select name="footer_loop" id="footer_loop">
	 <option value=''>请选择</option>
		<?php 
		 $customers = get_categories(array('hide_empty' => 0));
		 $footer_loop=get_option('mytheme_footer_loop'); 
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if (  $footer_loop== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	
    
     <p>模块标题</p>
          <p>
           
           <label  for="footer_loop_bt">标题：</label>        
            <input type="text" size="20"  name="footer_loop_bt" id="footer_loop_bt" value="<?php if($footer_loop_bt!=""){echo $footer_loop_bt;}else {echo 'HOT READ';} ?>"/>   
        </p>
       
         
          </div>      
                                                     
            
            
            
           
                   
                         
           
                   
                     