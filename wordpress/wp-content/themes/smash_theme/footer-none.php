<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smash_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
            <div class="site-copy">
                &COPY; <?php bloginfo( 'name' ); ?>. All Rights Reserved.
            </div>

            <div class="site-space"></div>

			<div class="site-built flex align-center">
                <!-- <span>Site by <a href="https://smashcreative.com/" target="_blank"><img src="<?php //echo bloginfo('stylesheet_directory').'/smash/images/smash.png'; ?>"></a></span> -->
				<span>Site by <a href="https://smashcreative.com/" target="_blank">Smash</a></span>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

    <!-- Icon Footer -->
    <?php smash_nav_footer_icons(['links' => get_field('icon_navigation_links','option')]); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
