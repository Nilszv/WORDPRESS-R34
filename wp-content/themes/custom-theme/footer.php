    <footer id="colophon" class="site-footer">
        <div class="site-container">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
            <?php endif; ?>

            <div class="site-info">
                <?php
                printf(
                    /* translators: 1: Theme name, 2: WordPress. */
                    esc_html__( 'Powered by %1$s and %2$s', 'custom-theme' ),
                    '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a>',
                    '<a href="https://wordpress.org/">WordPress</a>'
                );
                ?>
            </div><!-- .site-info -->
        </div><!-- .site-container -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
