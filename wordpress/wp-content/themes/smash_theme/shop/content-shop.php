<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jessa
 */

?>

				<?php 
				global $product;
				$id = $product->get_id();
				$_product = wc_get_product( $id );
				if( $_product->is_type( 'grouped' ) ) {
					$type = 'grouped';
					$link = get_permalink();
					$btn = 'view products';
					$price = '';
				} else {
					$type = '';
					$link = get_permalink() . '?add-to-cart=' . $id;
					$btn = 'add to cart';
					$price = '$' . $_product->get_price();
				}
				?>
				<div class="smash-product">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('woocommerce_thumbnail'); ?>
						<h5 class="woocommerce-loop-product__title"><?php the_title(); ?></h5>
					  <div class="product-price"><?php echo $price; ?></div>
					</a>
					<a class="btn btn-primary shop-btn <?php echo $type; ?>" href="<?php echo $link; ?>"><?php echo $btn; ?></a>
				</div>
