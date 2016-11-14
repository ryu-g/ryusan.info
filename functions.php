<?php

add_theme_support('post-thumbnails');
add_theme_support('menus');

register_sidebar(
	array(
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	)
);



// ここからフォーム改造
// オリジナル comment_form in wp-includes/comment-template.php
add_filter( "comment_form_defaults", "my_comment_form_defaults");
function my_comment_form_defaults($defaults){
//  'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    $defaults['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="70" rows="8" aria-required="true" placeholder="
    コメントはここ！送信前に間違いがないか確認してね！"></textarea></p>';
    return $defaults;
}


// オリジナル comment_form in wp-includes/comment-template.php
add_filter( 'comment_form_default_fields', 'my_comment_form_default_fields');
function my_comment_form_default_fields($fields){
    $commenter = wp_get_current_commenter();

    $fields =  array(
        // 名前
        'author' => '<p class="comment-form-author">' . '<input id="author" name="author" type="text" placeholder="　名前はここ！" value="' . esc_attr( $commenter['comment_author'] ) . '" size="68"' . $aria_req . ' />' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
        // メールアドレス
        // 'email'  => '<p class="comment-form-email">' . '<input id="email" name="email" type="text" placeholder="' . __( 'Email' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
        'email'  => '',
        // URL(ウェブサイト)
        'url' =>''

        // 'url'    => '<p class="comment-form-url">' . '<input id="url" name="url" type="text" placeholder="' . __( 'Website' ) . '"value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
    );
    return $fields;
}

// オリジナル comment_form in wp-includes/comment-template.php
// htmlタグが使えます　を削除
add_filter( "comment_form_defaults", "my_comment_notes_before");
function my_comment_notes_before( $defaults){
    $defaults['comment_notes_before'] = '';//めっせーじを空白で置き換え
    return $defaults;
}

// 「コメントを残す」の文言を変更、ログイン時のテキスト(ooでログインしています)を削除
add_filter( 'comment_form_defaults', 'my_title_reply');
function my_title_reply( $defaults){
    $defaults['title_reply'] = '';
    $defaults['logged_in_as'] = '';

    return $defaults;
}

// ここまでフォーム改造

// ここからコメントリスト関係

function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
        <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php
            /* translators: 1: date, 2: time */
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
        ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply">
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
}

