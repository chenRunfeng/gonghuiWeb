<?php get_header(); ?>
	<!-- Column 1 / Content -->
	<div class="grid_8">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel porta erat. Quisque sit amet risus at odio pellentesque sollicitudin. Proin suscipit molestie facilisis. Aenean vel massa magna. Proin nec lacinia augue. Mauris venenatis libero nec odio viverra consequat. In hac habitasse platea dictumst.</p>
		<!-- Contact Form -->
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