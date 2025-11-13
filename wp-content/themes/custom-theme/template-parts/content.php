<?php
/**
 * Template part for displaying posts
 *
 * @package Custom_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
                <span class="posted-on">
                    <?php
                    printf(
                        esc_html__( 'Posted on %s', 'custom-theme' ),
                        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date() . '</a>'
                    );
                    ?>
                </span>
                <span class="byline">
                    <?php
                    printf(
                        esc_html__( ' by %s', 'custom-theme' ),
                        '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
                    );
                    ?>
                </span>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if ( has_post_thumbnail() && ! is_singular() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'custom-theme-featured' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if ( is_singular() ) :
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'custom-theme' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'custom-theme' ),
                    'after'  => '</div>',
                )
            );
        else :
            the_excerpt();
        endif;
        ?>
    </div><!-- .entry-content -->

    <?php if ( is_singular() ) : ?>
        <footer class="entry-footer">
            <?php
            $categories_list = get_the_category_list( esc_html__( ', ', 'custom-theme' ) );
            if ( $categories_list ) {
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'custom-theme' ) . '</span>', $categories_list );
            }

            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'custom-theme' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'custom-theme' ) . '</span>', $tags_list );
            }
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
