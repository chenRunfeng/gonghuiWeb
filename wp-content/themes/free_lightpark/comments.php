




	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	

			<div class="liuy3">
                <div class="liuy2">名　称:</div>
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="28" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="author">输入名称 <?php if ($req) echo "(必填)"; ?></label>
			</div>

			<div class="liuy3">
                <div class="liuy2">邮　箱:</div>
				<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="28" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="email">输入邮箱 <?php if ($req) echo "(必填)"; ?></label>
			</div>

	

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

		<div class="liuy3">
                <div class="liuy2">留　言:</div>
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
		</div>

		<div class="liuy3">
			<input name="submit" type="submit" id="submit" tabindex="5" value="提　交" />
			<?php comment_id_fields(); ?>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	
	


