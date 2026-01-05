<?php

function smash_block_highlights($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $dots = (!empty($args['dots'])) ? $args['dots'] : null;
    $products = (!empty($args['products'])) ? $args['products'] : null;
    
    if($image){ ?>
        <div class="shop-highlights-image <?php echo $class; ?>" data-bgratio="1.25" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
            <?php if($dots){ ?>
                <?php foreach($dots as $key=>$dot) { 
                    $product = ($products) ? $products[$key] : null;
                    $x = (!empty($dot['x_coordinate'])) ? $dot['x_coordinate'] : null;
                    $y = (!empty($dot['y_coordinate'])) ? $dot['y_coordinate'] : null;
                    $top = ($y && $y <= 50) ? 'top: 100%;' : 'bottom: 100%;';
                    $left = ($x && $x >= 75) ? 'right: 0;' : (($x && $x >= 25) ? 'left: 100%;' : 'left: 0;');
                    $transform = ($x && $x >= 75) ? '' : (($x && $x >= 25) ? 'transform: translate(-50%, 0);' : '');
                ?>
                    <?php if($product && $x && $y){ ?>
                        <div class="shop-dot-wrapper" style="top: <?php echo $y; ?>%; left: <?php echo $x; ?>%;">
                            <div class="shop-dot"></div>
                            <div class="shop-dot-product" style="<?php echo $top . ' ' . $left . ' ' . $transform; ?>">
                                <div class="shop-dot-product-image" data-bgratio="1" style="background: url(<?php echo get_the_post_thumbnail_url($product->ID, 'large'); ?>) no-repeat center/cover;"></div>
                                <div class="shop-dot-product-body">
                                    <h4 class="shop-dot-product-title"><?php echo get_the_title($product->ID); ?></h4>
                                    <div class="shop-dot-product-meta">
                                        <?php if ( get_field('brand', $product->ID) ) : ?>
                                            <span>
                                                <?php echo get_field('brand', $product->ID) ?><?php echo (get_field('brand', $product->ID) && get_field('price', $product->ID)) ? ', ' : ''; ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ( get_field('price', $product->ID) ) : ?>
                                            <?php echo '$' . get_field('price', $product->ID); ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ( get_field('link', $product->ID) ) : ?>
                                        <a href="<?php echo get_field('link', $product->ID); ?>" target="_blank" class="shop-dot-product-cta animate-right">
                                            <span>Buy Now</span>
                                            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    <?php }
}