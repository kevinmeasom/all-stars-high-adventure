<?php
/**
 * Template name: Blog
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

        <?php if ( have_posts() ) : ?>
        
            <section id="archive_page">

                <?php smash_nav_page(['mobile' => true, 'title' => 'Lately on the Blog', 'index' => get_permalink( get_option( 'page_for_posts' ) ), 'terms' => get_terms(['taxonomy' => 'category', 'parent' => 0])]); ?>
    
                <div class="archive-bg">

                    <div class="archive-items container-xl">

                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php $p = get_post(get_the_ID());
                            if($p){
                                smash_block_post(['class' => 'archive-item', 'post' => $p]);
                            } ?>
                        <?php endwhile; ?>

                    </div>

                    <!-- Load More -->
                    <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_1" css_classes="container-xl" post_type="post" posts_per_page="12" offset="12" pause="true" scroll="false" button_label="Load More"]'); ?>
                </div>
            </section>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->    
        
<?php
get_footer();
