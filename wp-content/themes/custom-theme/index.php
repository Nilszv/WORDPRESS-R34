<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package Custom_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container">
        <div class="content-area">

            <?php
            if ( have_posts() ) :

                // Check if we're on the home page or blog page
                if ( is_home() && ! is_front_page() ) :
                    ?>
                    <header class="page-header">
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                    </header>
                    <?php
                endif;

                // Start the Loop
                while ( have_posts() ) :
                    the_post();

                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
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

                // If no content, include the "No posts found" template
                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>

        </div><!-- .content-area -->
    </div><!-- .site-container -->
</main><!-- #primary -->

<?php
get_footer();
