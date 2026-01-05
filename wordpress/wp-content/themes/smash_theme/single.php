<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Smash_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; ?>

		</main><!-- #main -->
    </div><!-- #primary -->
    
    <?php if(function_exists('smash_section_more_posts')){
        smash_section_more_posts([
            'layout' => 'posts-slider',
            'title' => 'explore more', 
            'cta' => 'View All Posts', 
            'link' => get_permalink( get_option( 'page_for_posts' ) ), 
            'args' => ['post_type' => 'post', 'posts_per_page' => 7],
            'isSingular' => true
        ]);
    } ?>

<?php
get_footer();
