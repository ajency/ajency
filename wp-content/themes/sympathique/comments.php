<?php
// Do not delete these sympathiques
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="no-comments"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'delicious'); ?></p>
	<?php
		return;
	}
?>
	
<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<div id="comments">
		<h3><?php comments_number(esc_html__('This post has no comments', 'delicious'), __('This post has 1 Comment', 'delicious'), __('This post has % Comments', 'delicious')); ?></h3>

		<ol class="commentlist">
			<?php wp_list_comments('type=comment&avatar_size=60&callback=delicious_comment'); ?>
		</ol>
		
		<div class="comments-navigation">
			<div class="align-left"><?php previous_comments_link(); ?></div>
			<div class="align-right"><?php next_comments_link(); ?></div>
		</div>	
	</div>

<?php else : // no comments yet ?>
	<div id="comments">
	<?php if ('open' == $post->comment_status) : ?>
		<p><?php esc_html_e('', 'delicious'); ?></p>

	 <?php else : ?>
		<!-- [comments are closed, and no comments] -->
		<p><?php esc_html_e('Comments are closed.', 'delicious'); ?></p>

	<?php endif; ?>
	</div>	
<?php endif; ?>


<?php

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

comment_form(array(
	'fields' => apply_filters( 'comment_form_default_fields', array(
		
		'comment_notes_after' => '',	
		'author' => '<div class="percent-one-third"><div class="comment-form-author"><fieldset>' . '<label for="author">' . esc_html__( 'Name', 'delicious' ). ( $req ? ' *' : '' )  . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></fieldset></div></div>',
		'email' => '<div class="percent-one-third"><div class="comment-form-email"><fieldset><label for="email">' . esc_html__( 'Email(will not be published)', 'delicious' ) . ( $req ? ' *' : '' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></fieldset></div></div>',
		'url' => '<div class="percent-one-third column-last"><div class="comment-form-url"><fieldset><label for="url">' . esc_html__( 'Website', 'delicious' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></fieldset></div></div>'

	)),
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'title_reply' => esc_html__( 'Leave a Comment', 'delicious' ),
	'title_reply_to' => esc_html__( 'Leave a  Comment', 'delicious' ),
	'cancel_reply_link' => esc_html__( 'Cancel Comment', 'delicious' ),	
	'comment_field' => '<div class="comment-form-comment"><fieldset><label for="comment">' . __( 'Your Comment', 'delicious' ) . ( $req ? ' *' : '' ) . '</label> ' . '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></fieldset></div>',
	'label_submit' => esc_html__( 'Submit Comment', 'delicious' ),
	'id_submit' => 'submit_my_comment'
	
));
?>