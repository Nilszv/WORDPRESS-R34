<?php
/**
 * The template for displaying search results pages
 *
 * @package Custom_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    printf(
                        /* translators: %s: search query. */
                        esc_html__( 'Search Results for: %s', 'custom-theme' ),
                        '<span>' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
            </header><!-- .page-header -->

            <?php
            // Start the Loop
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'search' );

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
