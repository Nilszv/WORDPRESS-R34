<?php
/**
 * Template part for displaying results in search pages
 *
 * @package Custom_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <span class="posted-on">
                    <?php
                    printf(
                        esc_html__( 'Posted on %s', 'custom-theme' ),
                        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date() . '</a>'
                    );
                    ?>
                </span>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
</article><!-- #post-<?php the_ID(); ?> -->
