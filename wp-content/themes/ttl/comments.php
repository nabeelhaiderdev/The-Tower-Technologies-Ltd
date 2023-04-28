<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */

/**
 *
 * If the user tries to load the comments page directly
 * not inside a page or single etc. /1/
 *
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments. /2/
 */

if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) { /*1*/
		die( __( 'Please do not load this page directly. Thanks!', 'ttl_td' ) );
}
if ( post_password_required() ) { /*2*/ ?>
<?php _e( 'This post is password protected. Enter the password to view comments.', 'ttl_td' ); ?>
<?php
	return;
}

?>
<div class="widget-content widget-comments">
	<div class="widget-holder">
		<h4>0 Comments</h4>
		<ol class="comments-list">
		</ol>
	</div>
	<div class="widget-holder widget-reply">
		<h4>Leave a Reply</h4>
		<p>Your address will not be published. Required fields are marked *</p>
		<div class="reply-form">
			<form>
				<div class="input-holder">
					<textarea class="form-control" placeholder="Comment"></textarea>
				</div>
				<div class="input-holder">
					<input type="text" class="form-control" placeholder="Your Name*">
				</div>
				<div class="input-holder">
					<input type="email" class="form-control" placeholder="Email*">
				</div>
				<div class="input-holder">
					<input type="text" class="form-control" placeholder="Your Website">
				</div>
				<div class="input-holder">
					<label class="custom-checkbox">
						<input type="checkbox">
						<span class="checkbox"><i class="fa fa-check"></i></span>
						<span class="label-text">Save my name, email and website in this
							browser for the next time i comment.</span>
					</label>
				</div>
				<div class="btn-block">
					<button type="submit" class="btn btn-primary btn-lg">Post Comment</button>
				</div>
			</form>
		</div>
	</div>
</div>
