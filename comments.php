<?php
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments">
	<?php if( have_comments() ): ?>
	<h2 class="commets-title">この投稿へのコメント</h2>
	<ol class="commets-list">
		<?php wp_list_comments( array(
    'style'      => 'ul',
    'short_ping' => true,
    'callback'   => 'my_custom_comment_format'
)); ?>
	</ol>
	<?php endif; ?>
	<?php $comment_args = array(
    'title_reply'          => 'コメントを残す',
    'label_submit'         => '送信',
    'comment_notes_before' => '',
    'comment_notes_after'  => '',
    'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'コメントを残すには<a href="%s">ログイン</a>してください。' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
    'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="4" aria-required="true" placeholder="このコメントに投稿する"></textarea></p>',
);
	comment_form( $comment_args ); ?>
</div><!-- #comments -->