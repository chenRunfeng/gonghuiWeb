  <div class="xiaot">
 <b class="bt">首页布局</b><br />
 <p>首页上的模块在这里可以调整上下排序的位置，还可以选择是否显示他们，这里默认的排序是从上至下的，在各个模块的选项卡中选择需要显示的模块即可<br />
 <strong style="color:#F00">注意：每个模块只能选择一次，如果重复选择，会在首页上显示重复的模块</strong>
 </p>

</div>

<div class="modle"><b>首页的布局功能在付费版中才能使用，具体请去付费版本介绍查看该功能：<br /><br /><br /><a target="_blank" href="http://www.themepark.com.cn/qjqywordpresszt.html"> http://www.themepark.com.cn/qjqywordpresszt.html</a><br /><br /><br />
付费版演示：<br /><br /><br /><a target="_blank" href="http://www.themepark.com.cn/demo/?themedemo=lightpark-yanshi"> http://www.themepark.com.cn/demo/?themedemo=lightpark-yanshi</a></b>

</div> 













                 <div class="xiaot">
                     <b class="bt">模板微调</b><br />
                    <p>这里你可以设定各个页面、分类目录的显示数量、顶部图片</p>
                 
  </div>
            
            <div class="xiaot">
            <p>内页（页面、分类目录、文章页）的顶部图片设定，顶部图片这里统一为一张图片，这样做可以减少请求，让网站速度更快，并且看起来网站风格比较统一</p>
            <div class="up">
            <label  for="about_pic">背景图片(尺寸：1920*157)</label> 
              <input type="text" size="60"  name="top_pic" id="top_pic" value="<?php echo get_option('mytheme_top_pic'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div>   
            </div>  
             <?php
		    $list_nmber1=get_option('mytheme_list_nmber1');
			$list_nmber2=get_option('mytheme_list_nmber2');

		    ?>    
                      
              <div class="xiaot">
            <p>显示文章数量自定义，在设定分类目录的列表页现实的数量时，记得要把默认的WordPress数量设为1，否则会出现404错误，设置方法请在 “设置” -- “阅读”中 ，将现实的文章数量设为1，即可。</p>
              <p> <label  for="list_nmber1">纯文字列表模板：</label> 
                <input type="text" size="20"  name="list_nmber1" id="list_nmber1" value="<?php if($list_nmber1!=""){echo $list_nmber1;}else{echo '12';}  ?>"/  /> 
                
                   
              </p>  
              
               <p> <label  for="list_nmber2">默认模板（小图片加上文字）：</label> 
                <input type="text" size="20"  name="list_nmber2" id="list_nmber2" value="<?php if($list_nmber2!=""){echo $list_nmber2;}else{echo '12';}  ?>"/  />
                
                      
              </p> 
              
            </div>          
                      
                                                     
            
            
            
           
                   
                     