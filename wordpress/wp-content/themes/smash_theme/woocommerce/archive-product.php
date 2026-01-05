<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );

?>

    <div id="primary" class="content-area">
		<main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>
			    <div id="shop-page">
                
                    <?php get_template_part( 'shop/before', 'shop' ); ?>
                
                    <div class="shop-container">
                        <section class="shop-products-list archive-items container-xl">
                            <?php while ( have_posts() ) : the_post();
                                get_template_part( 'shop/content', 'shop' ); 
                            endwhile; ?>
                        </section>
                        <?php 
                        $current_cat = get_queried_object();
                        echo do_shortcode('[ajax_load_more container_type="div" repeater="template_4" css_classes="shop-products-list archive-items container-xl" post_type="product" offset="12" posts_per_page="12" taxonomy="product_cat" taxonomy_terms="'.$current_cat->slug.'" taxonomy_operator="IN" pause="true" scroll="false" button_label="View More" button_loading_label="Loading products..."]'); ?>
                    </div>
                </div>
            <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer( 'shop' );
