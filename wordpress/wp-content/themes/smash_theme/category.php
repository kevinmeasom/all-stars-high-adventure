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

                    <?php
                    $cats = get_categories(['child_of' => $cat]);
                    $current_cat = get_queried_object();
                    $parent = get_queried_object()->category_parent;

                    if($parent){
                        $cats = get_categories(['child_of' => $parent]);
                        if($cats){ ?>
                            <?php smash_nav_page(['mobile' => true, 'title' => $current_cat->name, 'index' => get_term_link($parent), 'terms' => get_terms(['taxonomy' => 'category', 'child_of' => $parent])]); ?>
                        <?php } ?>
                    <?php } elseif($cats) { ?>
                        <?php smash_nav_page(['mobile' => true, 'title' => $current_cat->name, 'index' => get_permalink( get_option( 'page_for_posts' ) ), 'terms' => get_terms(['taxonomy' => 'category', 'child_of' => $cat])]); ?>
                    <?php } ?>

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
                        <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_1" css_classes="container-xl" post_type="post" category="'.$current_cat->slug.'" posts_per_page="12" offset="12" pause="true" scroll="false" button_label="Load More"]'); ?>
                    </div>
                </section>


            <?php else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
