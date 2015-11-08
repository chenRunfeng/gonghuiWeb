<?php get_header(); ?>
	<!-- Column 1 /Content -->
	<div class="grid_8">
		<!-- Blog Post -->
		<div class="post">
			<!-- Post Title -->
			<h3 class="title"><a href="single.html">Loreum ipsium massa cras phasellus</a></h3>
			<!-- Post Title -->
			<p class="sub"><a href="#">News</a>, <a href="#">Products</a> &bull; 31st Sep, 09 &bull; <a href="#">7 Comments</a></p>
			<div class="hr dotted clearfix">&nbsp;</div>
			<!-- Post Title -->
			<img class="thumb" src="<?php bloginfo('template_url'); ?>/images/610x150.gif" alt=""/>
			<!-- Post Content -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel diam id mauris accumsan egestas. Sed sed lorem. Integer id mi vel sapien fermentum vehicula. Pellentesque vitae lacus a sem posuere fringilla. Vestibulum dolor. Phasellus cursus augue ac purus. Curabitur faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
			<h1>H1 Heading</h1>
			<p>Donec leo. Aliquam risus elit, luctus vel, interdum vitae, malesuada eget, elit. Nulla vitae ipsum. Donec ligula ante, bibendum sit amet, elementum quis, viverra eu, ante. Fusce tincidunt. Mauris pellentesque, arcu eget feugiat accumsan, ipsum mi molestie orci, ut pulvinar sapien lorem nec dui.</p>
			<h2>H2 Heading</h2>
			<p>Donec leo. Aliquam risus elit, luctus vel, interdum vitae, malesuada eget, elit. Nulla vitae ipsum. Donec ligula ante, bibendum sit amet, elementum quis, viverra eu, ante. Fusce tincidunt. Mauris pellentesque, arcu eget feugiat accumsan, ipsum mi molestie orci, ut pulvinar sapien lorem nec dui.</p>
			<h3>H3 Heading</h3>
			<p>Donec leo. Aliquam risus elit, luctus vel, interdum vitae, malesuada eget, elit. Nulla vitae ipsum. Donec ligula ante, bibendum sit amet, elementum quis, viverra eu, ante. Fusce tincidunt. Mauris pellentesque, arcu eget feugiat accumsan, ipsum mi molestie orci, ut pulvinar sapien lorem nec dui.</p>
			<h4>H4 Heading</h4>
			<p>Donec leo. Aliquam risus elit, luctus vel, interdum vitae, malesuada eget, elit. Nulla vitae ipsum. Donec ligula ante, bibendum sit amet, elementum quis, viverra eu, ante. Fusce tincidunt. Mauris pellentesque, arcu eget feugiat accumsan, ipsum mi molestie orci, ut pulvinar sapien lorem nec dui.</p>
			<h5>H5 Heading</h5>
			<p>Donec leo. Aliquam risus elit, luctus vel, interdum vitae, malesuada eget, elit. Nulla vitae ipsum. Donec ligula ante, bibendum sit amet, elementum quis, viverra eu, ante. Fusce tincidunt. Mauris pellentesque, arcu eget feugiat accumsan, ipsum mi molestie orci, ut pulvinar sapien lorem nec dui.</p>
			<h6>H6 Heading</h6>
			<p>Donec leo. Aliquam risus elit, luctus vel, interdum vitae, malesuada eget, elit. Nulla vitae ipsum. Donec ligula ante, bibendum sit amet, elementum quis, viverra eu, ante. Fusce tincidunt. Mauris pellentesque, arcu eget feugiat accumsan, ipsum mi molestie orci, ut pulvinar sapien lorem nec dui.</p>
			<!-- Post Links -->
			<p class="clearfix"> <a href="blog.html" class="button float" >&lt;&lt; Back to Blog</a> <a href="#commentform" class="button float right" >Discuss this post</a> </p>
		</div>
		<div class="hr clearfix">&nbsp;</div>
		<!-- Comment's List -->
		<h3>Comments</h3>
		<div class="hr dotted clearfix">&nbsp;</div>
		<ol class="commentlist">
			<li class="comment">
				<div class="gravatar"> <img alt="" src='images/gravatar.png' height='48' width='48' /> <a class="comment-reply-link" href=''>Reply</a> </div>
				<div class="comment_content">
					<div class="clearfix"> <cite class="author_name"><a href="">Joe Bloggs</a></cite>
						<div class="comment-meta commentmetadata">January 6, 2010 at 6:26 am</div>
					</div>
					<div class="comment_text">
						<p>Donec leo. Aliquam risus elit, luctus vel, interdum vitae, malesuada eget, elit. Nulla vitae ipsum. Donec ligula ante, bibendum sit amet, elementum quis, viverra eu, ante. Fusce tincidunt. Mauris pellentesque, arcu eget feugiat accumsan, ipsum mi molestie orci, ut pulvinar sapien lorem nec dui.</p>
					</div>
				</div>
			</li>
		</ol>
		<div class="hr clearfix">&nbsp;</div>
		<!-- Comment Form -->
		<form id="comment_form" action="" method="post">
			<h3>Add a comment</h3>
			<div class="hr dotted clearfix">&nbsp;</div>
			<ul>
				<li class="clearfix">
					<label for="name">Your Name</label>
					<input id="name" name="name" type="text" />
				</li>
				<li class="clearfix">
					<label for="email">Your Email</label>
					<input id="email" name="email" type="text" />
				</li>
				<li class="clearfix">
					<label for="email">Your Website</label>
					<input id="website" name="website" type="text" />
				</li>
				<li class="clearfix">
					<label for="message">Comment</label>
					<textarea id="message" name="message" rows="3" cols="40"></textarea>
				</li>
				<li class="clearfix">
					<!-- Add Comment Button -->
					<a type="submit" class="button medium black right">Add comment</a> </li>
			</ul>
		</form>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>