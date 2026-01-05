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

    <?php if(!is_front_page() && !get_field('faqs_faq_rows') && $post->post_parent != 1036){ ?>
        <!-- FAQs -->
        <?php smash_section_faqs(['title' => get_field('faqs_faqs_title','option'), 'cta' => get_field('faqs_faqs_cta','option'), 'link' => get_field('faqs_faqs_link','option'), 'faqs' => get_field('faqs_faqs','option')]); ?>
    <?php } ?>
    

    <!-- Register -->
    <?php smash_section_cta_bar(['title' => get_field('footer_cta_title','option'), 'cta' => get_field('footer_cta','option'), 'link' => get_field('footer_cta_link','option')]); ?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
            <div class="site-copy">
                &COPY; <?php bloginfo( 'name' ); ?>. All Rights Reserved.
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
