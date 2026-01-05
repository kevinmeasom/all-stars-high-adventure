<?php
/**
 * Template name: Downloadables
 * 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smash_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>
            <div id="downloadables_page">

                <!-- Content -->
                <?php get_template_part( 'template-parts/content', 'page' ); ?>

                <!-- Grid Links -->
                <?php if ( ! post_password_required() ) {
                    smash_section_downloadables(['items' => get_field('downloadables')]);
                } ?>

            </div>
		<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
