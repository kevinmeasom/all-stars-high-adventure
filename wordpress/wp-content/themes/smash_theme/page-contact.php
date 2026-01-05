<?php
/**
 * Template name: Contact
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
            <div id="contact_page">

                <!-- Page Content -->
                <?php get_template_part( 'template-parts/content', 'page-contact' ); ?>

                <!-- Contact Form -->
                <?php if ( get_field('title') || get_field('text') || get_field('form') ) : ?>
                    <div class="contact-container">
                        <?php if ( get_field('title') || get_field('text') ) : ?>
                            <div class="contact-body">
                                <?php if ( get_field('title') ) : ?>
                                    <h3 class="contact-body-title"><?php echo get_field('title'); ?></h3>
                                <?php endif; ?>
                                <?php if ( get_field('text') ) : ?>
                                    <div class="contact-text">
                                        <?php echo get_field('text'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( get_field('form') ) : ?>
                            <div class="contact-form">
                                <?php echo get_field('form'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
		<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
