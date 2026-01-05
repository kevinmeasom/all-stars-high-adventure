<?php
/**
 * Template name: About
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
            <div id="about_page">
                
                <!-- Content -->
                <?php get_template_part( 'template-parts/content', 'page' ); ?>

                <!-- Team -->
                <?php smash_section_team(['id' => 'leadership', 'title' => get_field('team_team_title'), 'text' => get_field('team_team_text'), 'members' => get_field('team_team_members')]); ?>

                <!-- Tabs -->
                <?php smash_section_tabs(['title' => get_field('tabs_tabs_title','option'), 'tabs' => get_field('tabs_tabs','option')]); ?>

            </div>
		<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
