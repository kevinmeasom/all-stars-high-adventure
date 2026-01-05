<?php

function smash_section_featured_look($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : 'Featured Look';
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $product = (!empty($args['product'])) ? $args['product'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $links = (!empty($args['links'])) ? $args['links'] : null;
    $products_title = (!empty($args['products_title'])) ? $args['products_title'] : null;
    $products = (!empty($args['products'])) ? $args['products'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;
    
    if($image || $products){
    ?>
        <section id="featured_look" class="<?php echo $class; ?>">
            <h2 class="featured-look-header"><?php echo $title; ?></h2>
            <div class="featured-look-container">
                <?php if($image){ ?>
                    <div class="featured-look-left">
                        <div class="featured-look-image-wrap">
                            <?php if($image){ ?>
                                <div class="featured-look-image" data-bgratio="1.35" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                            <?php } ?>
                        </div>
                        <?php if($text || ($left_label && $left_link) || ($right_label && $right_link)){ ?>
                            <div class="featured-look-text-wrap">
                                <?php if($product){ ?>
                                    <div class="featured-look-product">
                                        <img src="<?php echo $product['sizes']['large']; ?>" alt="<?php echo $product['alt']; ?>" />
                                    </div>
                                <?php } ?>
                                <div class="featured-look-text-inner">
                                    <?php if($text){ ?>
                                        <div class="featured-look-text">
                                            <?php echo $text; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if($links){ ?>
                                        <div class="featured-look-actions">
                                            <?php foreach($links as $link) { 
                                                $label = (!empty($link['label'])) ? $link['label'] : null;
                                                $link = (!empty($link['link'])) ? $link['link'] : null;
                                            ?>
                                                <a href="<?php echo $link; ?>" class="featured-look-action"><span><?php echo $label; ?></span></a>
                                                <div class="dot-sep"></div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if($products){ ?>
                    <div class="featured-look-right">
                        <?php if($products_title){ ?>
                            <h2 class="featured-look-title"><?php echo $products_title; ?></h2>
                        <?php } ?>
                        <div class="featured-look-products">
                            <?php foreach($products as $product) { ?>
                                <?php smash_block_product(['class' => 'look-product product-grid-item', 'product' => $product, 'description' => false]); ?>
                            <?php } ?>
                        </div>
                        <?php if($cta && $link){ ?>
                            <a href="<?php echo $link; ?>" class="btn btn-primary featured-look-cta"><?php echo $cta; ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php }
}