<?php
/**
 * The template for displaying archive pages
 *
 * @package Custom_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->

            <?php
            // Start the Loop
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );

            endwhile;

            // Previous/next page navigation
            the_posts_navigation(
                array(
                    'prev_text' => __( '&larr; Older posts', 'custom-theme' ),
                    'next_text' => __( 'Newer posts &rarr;', 'custom-theme' ),
                )
            );

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
    </div><!-- .site-container -->
</main><!-- #primary -->

<?php
get_footer();
