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

<?php 
    // Display comments
    $comments = get_comments(array(
        'post_id' => get_the_ID(),
        'status' => 'approve',
        'order' => 'ASC',
        'orderby' => 'comment_date'
    ));
    
    $comment_count = count($comments);
?>

<div class="widget-holder">
	<h4><?php echo $comment_count . ' Comment' . ($comment_count !== 1 ? 's' : ''); ?></h4>
	<ol class="comments-list">
		<?php
            foreach($comments as $comment) {
                $comment_id = $comment->comment_ID;
                $comment_author = $comment->comment_author;
                $comment_date = date('F j, Y', strtotime($comment->comment_date));
                $comment_content = $comment->comment_content;
        ?>
		<li>
			<div class="comment-holder">
				<div class="avatar">
					<?php echo get_avatar($comment->comment_author_email, 64); ?>
				</div>
				<div class="text-block">
					<ul class="comment-meta">
						<li><a href="#"><?php echo $comment_author; ?></a></li>
						<li><time datetime="<?php echo $comment->comment_date; ?>"><?php echo $comment_date; ?></time>
						</li>
					</ul>
					<p><?php echo $comment_content; ?></p>
					<ul class="comment-meta">
						<li><a href="#comment-<?php echo $comment_id; ?>" class="reply">REPLY</a></li>
					</ul>
				</div>
			</div>
			<?php
                // Display replies for each comment
                $args = array(
                    'status' => 'approve',
                    'order' => 'ASC',
                    'orderby' => 'comment_date',
                    'parent' => $comment_id
                );
                $replies = get_comments($args);
                
                if($replies) {
            ?>
			<ol>
				<?php
                    foreach($replies as $reply) {
                        $reply_id = $reply->comment_ID;
                        $reply_author = $reply->comment_author;
                        $reply_date = date('F j, Y', strtotime($reply->comment_date));
                        $reply_content = $reply->comment_content;
                ?>
				<li>
					<div class="comment-holder">
						<div class="avatar">
							<?php echo get_avatar($reply->comment_author_email, 64); ?>
						</div>
						<div class="text-block">
							<ul class="comment-meta">
								<li><a href="#"><?php echo $reply_author; ?></a></li>
								<li><time
										datetime="<?php echo $reply->comment_date; ?>"><?php echo $reply_date; ?></time>
								</li>
							</ul>
							<p><?php echo $reply_content; ?></p>
							<ul class="comment-meta">
								<li><a href="#comment-<?php echo $reply_id; ?>" class="reply">REPLY</a></li>
							</ul>
						</div>
					</div>
				</li>
				<?php } ?>
			</ol>
			<?php } ?>
		</li>
		<?php } ?>
	</ol>
</div>

<div class="widget-holder widget-reply">
	<h4>Leave a Reply</h4>
	<p>Your address will not be published. Required fields are marked *</p>
	<div class="reply-form">
		<form class="comment-form" action="<?php echo esc_url( site_url( '/wp-comments-post.php' ) ); ?>" method="post">
			<div class="input-holder">
				<textarea name="comment" class="form-control" placeholder="Comment"></textarea>
			</div>
			<div class="input-holder">
				<input name="author" type="text" class="form-control" placeholder="Your Name*"
					value="<?php echo esc_attr( $commenter['comment_author'] ); ?>"
					<?php if ( $req ) echo 'required'; ?>>
			</div>
			<div class="input-holder">
				<input name="email" type="email" class="form-control" placeholder="Email*"
					value="<?php echo esc_attr( $commenter['comment_author_email'] ); ?>"
					<?php if ( $req ) echo 'required'; ?>>
			</div>
			<div class="input-holder">
				<input name="url" type="text" class="form-control" placeholder="Your Website"
					value="<?php echo esc_attr( $commenter['comment_author_url'] ); ?>">
			</div>
			<div class="input-holder">
				<label class="custom-checkbox">
					<input type="checkbox" name="wp-comment-cookies-consent"
						<?php if ( isset( $consent ) && $consent ) echo 'checked'; ?>>
					<span class="checkbox"><i class="fa fa-check"></i></span>
					<span class="label-text">Save my name, email and website in this browser for the next time I
						comment.</span>
				</label>
			</div>
			<div class="btn-block">
				<button type="submit" name="submit" class="btn btn-primary btn-lg">Post Comment</button>
			</div>
			<?php comment_id_fields(); ?>
			<?php do_action( 'comment_form', $post->ID ); ?>
		</form>
	</div>
</div>
