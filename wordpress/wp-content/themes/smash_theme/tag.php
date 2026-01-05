<?php
/**
 * The template for displaying archive pages
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

                    <?php $current_cat = get_queried_object(); ?>
                    
                    <?php smash_nav_page(['mobile' => false, 'title' => $current_cat->name]); ?>

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
                        <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_1" css_classes="archive-items container-xl" post_type="post" tag="'.$current_cat->slug.'" posts_per_page="12" offset="12" pause="true" scroll="false" button_label="Load More"]'); ?>
                    </div>
                </section>


            <?php else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
