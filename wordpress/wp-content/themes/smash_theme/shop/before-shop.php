<?php
$shopID = get_option( 'woocommerce_shop_page_id' );

if(get_field('shop_featured_image','option')){ 
    $image = get_field('shop_featured_image','option');
?>
	<section class="shop-featured flex align-center justify-center" style="background: url(<?php echo $image['url']; ?>) no-repeat; background-size: cover; background-position: center center;">
		<div class="shop-featured-overlay"></div>
		<div class="shop-featured-body">
			<div class="shop-featured-title"><?php echo get_field('shop_featured_title','option'); ?></div>
			<div class="shop-featured-text"><?php echo get_field('shop_featured_text','option'); ?></div>
		</div>
	</section>
<?php } ?>

<?php if(is_tax('product_cat')){ ?>
    <header class="container-xl page-header">
        <?php the_archive_title( '<h1 class="page-title cat-title">', '</h1>' ); ?>
    </header><!-- .page-header -->
<?php } ?>