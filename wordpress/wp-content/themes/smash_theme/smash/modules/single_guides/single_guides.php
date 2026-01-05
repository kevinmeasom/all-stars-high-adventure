<?php

function smash_single_guides($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $type = (!empty($args['type'])) ? $args['type'] : 'basic';
    $guides = (!empty($args['guides'])) ? $args['guides'] : null;
    $products = (!empty($args['products'])) ? $args['products'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $dots = (!empty($args['dots'])) ? $args['dots'] : null;

    if($guides || $products){ ?>
        <?php if($type == 'highlights'){ ?>
            <?php smash_section_shop_highlights(['class' => $class, 'image' => $image, 'dots' => $dots, 'products' => $products]); ?>
        <?php } elseif($type == 'grid') { ?>
            <div class="guides-grid <?php echo $class; ?>">
                <?php $count = 1; foreach($guides as $guide) { 
                    $layout = $guide['layout'];
                    $products = $guide['products'];
                ?>
                    <?php if($layout == 'horizontal'){ ?>
                        <div class="guide-grid horizontal">
                            <div class="guide-grid-body">
                                <div class="guide-count"><?php echo $count; ?></div>
                                <?php if($guide['title']){ ?>
                                    <h3 class="guide-grid-title"><?php echo $guide['title']; ?></h3>
                                <?php } ?>
                                <?php if($guide['text']){ ?>
                                    <div class="guide-grid-text">
                                        <?php echo $guide['text']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="guide-grid-products">
                                <?php smash_single_products(['id' => $count, 'products' => $products, 'class' => 'small-slider']); ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="guide-grid vertical">
                            <div class="guide-count"><?php echo $count; ?></div>
                            <?php if($guide['title']){ ?>
                                <h3 class="guide-grid-title"><?php echo $guide['title']; ?></h3>
                            <?php } ?>
                            <?php if($guide['text']){ ?>
                                <div class="guide-grid-text">
                                    <?php echo $guide['text']; ?>
                                </div>
                            <?php } ?>
                            <div class="guide-grid-products">
                                <?php smash_single_products(['id' => $count, 'products' => $products, 'class' => 'small-slider']); ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php $count++; } ?>
            </div>
        <?php } elseif($type == 'rows') { ?>
            <div class="guides-rows <?php echo $class; ?>">
                <?php foreach($guides as $guide) { $products = $guide['products']; ?>
                    <div class="post-guide-row">
                        <div class="guide-products">
                            <?php smash_single_products(['id' => $count, 'products' => $products, 'class' => 'xsmall-slider']); ?>
                        </div>
                        <div class="guide-body">
                            <?php if($guide['title']){ ?>
                                <h3 class="guide-title"><?php echo $guide['title']; ?></h3>
                            <?php } ?>
                            <?php if($guide['text']){ ?>
                                <div class="guide-text">
                                    <?php echo $guide['text']; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="guides-basic <?php echo $class; ?>">
                <?php foreach($guides as $guide) { $products = $guide['products']; ?>
                    <div class="guide-basic">
                        <?php if($guide['title']){ ?>
                            <h3 class="guide-title"><?php echo $guide['title']; ?></h3>
                        <?php } ?>
                        <?php if($guide['text']){ ?>
                            <div class="guide-text">
                                <?php echo $guide['text']; ?>
                            </div>
                        <?php } ?>
                        <?php if($products){ ?>
                            <div class="guide-products">
                                <?php foreach($products as $p) { ?>
                                    <?php smash_block_product(['product' => $p]); ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    <?php }
}