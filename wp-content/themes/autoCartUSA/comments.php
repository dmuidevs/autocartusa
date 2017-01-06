<?php
/**
 * The template for displaying comments
 */

?>

<div id="comments" class="comments-area">
<h4 class="discuss">Comments</h4>
<ul class="comment-list">
	<?php wp_list_comments('type=comment&callback=format_comment'); ?>
</ul><!-- .comment-list -->
<?php the_comments_navigation(); ?>
<h4 class="discuss">Leave a reply</h4>
	
	
	<div class="replyWrap clearfix">
	<?php
		$comments_args = array(
		        // change the title of send button 
				'class_submit' => 'replySubmit',
		        'label_submit'=>'Submit',
		        // remove "Text or HTML to be displayed after the set of comment fields"
		        'comment_notes_after' => '',
		        // redefine your own textarea (the comment body)
		        'comment_field' => '<div class="comment-form-comment clearfix"><div class="commentTextArea"><textarea id="comment" name="comment" aria-required="true" placeholder="comment:"></textarea></div></div>',
		);

		comment_form($comments_args);
	?>
	</div>

</div><!-- .comments-area -->
