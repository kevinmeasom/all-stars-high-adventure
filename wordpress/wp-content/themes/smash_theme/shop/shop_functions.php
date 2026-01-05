<?php

/**
 * Enqueue scripts and styles.
 */
function shop_scripts() {
    wp_enqueue_style( 'shop-style', get_template_directory_uri() . '/shop/shop.css');
    
	if(is_product()){
		wp_enqueue_script( 'product-script', get_template_directory_uri() . '/shop/product.js', array(), '1', true );
	}
}
add_action( 'wp_enqueue_scripts', 'shop_scripts' );


//Custom Thumbnail Sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'product_thumb', 300, 300, true ); // (cropped)
}


/**
 * Add custom posts_per_page perameters.
 **/
function my_shop_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    if(is_shop() || is_product_category() || is_product_tag()){
      $query->set('posts_per_page', 12);
      $query->set('orderby', 'date');
      $query->set('order', 'DESC');
    }
  }
}
add_action( 'pre_get_posts', 'my_shop_queries' );


// function woocommerce_template_product_description() {
// 	wc_get_template( 'single-product/tabs/description.php' );
// }
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );


function woocommerce_sharing(){
	global $post; ?>
    <div id="share-<?php echo get_the_ID(); ?>" class="social-share">
        <span class="share-title">Share</span>
        <input class="image" type="hidden" value="<?php echo get_the_post_thumbnail_url(); ?>">
        <input class="url" type="hidden" value="<?php echo get_the_permalink(); ?>">
        <input class="title" type="hidden" value="<?php echo get_the_title(); ?>">
        <button class="share s_facebook btn-off"><i class="fab fa-facebook-f" aria-hidden="true"></i></button>
        <button class="share s_pinterest btn-off"><i class="fab fa-pinterest-p" aria-hidden="true"></i></button>
        <button class="share s_twitter btn-off"><i class="fab fa-twitter" aria-hidden="true"></i></button>
        <button class="share email btn-off"><a href="mailto:?subject=I%20LOVE%20this%20article%20and%20thought%20of%20you%21&body=<?php echo urlencode(get_the_permalink()); ?>"><i class="far fa-envelope" aria-hidden="true"></i></a></button>
    </div>
<?php }
add_action( 'woocommerce_share', 'woocommerce_sharing' );
