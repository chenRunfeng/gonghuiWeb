   <div class="up">
                    <b class="bt">网站关键字填写（中文）</b>
                    <textarea name="keywords" cols="86" rows="3" id="keywords"><?php echo get_option('mytheme_keywords'); ?></textarea>   
                    <p>请填写网站的关键字，使用“ , ”分开，一个网站的关键字一般不超过100个字符。</p>
                </div>   
                
                 <div class="up">
                    <b class="bt">网站描述填写（中文）</b>
                    <textarea name="description" cols="86" rows="3" id="description"><?php echo get_option('mytheme_description'); ?></textarea>    
                    <p>请填写网站的描述，使用,分开，一个网站的描述一般不超过200个字符。</p>
                </div>   
                   

                      <div class="up">    
                    <b class="bt">网站统计代码添加</b>
                    <textarea name="analytics" cols="86" rows="4" id="analytics"><?php echo stripslashes(get_option('mytheme_analytics')); ?></textarea>    
                 
                 <a href="http://www.themepark.com.cn/wordpresswzseohj.html">网站的seo应该如何去做？ 我们给你一些文章作为参考</a>
  </div>  

  <div class="xiaot">
                      <b class="bt">联系资料</b><br />
                      <p>填写一些必要的联系资料，他们会显示在网页的顶部和底部，另外，你可以单独设定一个页面为“联系我们”。</p>
                  
            <p> <label  for="case2_bt">联系电话：</label> 
           <input type="text" size="60"  name="tell" id="tell" value="<?php echo get_option('mytheme_tell');  ?>"/  />
            </p>
            
               <p> <label  for="case2_bt">电子邮箱：</label> 
           <input type="text" size="60"  name="email" id="email" value="<?php echo get_option('mytheme_email');  ?>"/  />
            </p>
            
               <p> <label  for="case2_bt">传真：</label> 
           <input type="text" size="60"  name="fax" id="fax" value="<?php echo get_option('mytheme_fax');  ?>"/  />
            </p>
            
              <p> <label  for="case2_bt">联系地址：</label> 
           <input type="text" size="60"  name="address" id="address" value="<?php echo get_option('mytheme_address');  ?>"/  />
            </p>
            
               <p> <label  for="case2_bt">ICP备案号：</label> 
           <input type="text" size="60"  name="icp_b" id="icp_b" value="<?php echo get_option('mytheme_icp_b');  ?>"/  />
            </p>
                  
  
   
    
   
      
                  
                  
                  
</div>
   