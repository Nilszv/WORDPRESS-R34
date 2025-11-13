<?php
/**
 * The template for displaying comments
 *
 * @package Custom_Theme
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    // Check if there are comments to display
    if ( have_comments() ) :
        ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                printf(
                    /* translators: 1: title. */
                    esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'custom-theme' ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'custom-theme' ) ),
                    number_format_i18n( $comment_count ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 64,
                )
            );
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Comment navigation
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a note
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'custom-theme' ); ?></p>
            <?php
        endif;

    endif; // Check for have_comments()

    // Comment form
    comment_form();
    ?>

</div><!-- #comments -->
