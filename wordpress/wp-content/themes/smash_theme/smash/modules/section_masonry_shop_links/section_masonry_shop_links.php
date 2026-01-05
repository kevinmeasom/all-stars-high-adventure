<?php
function smash_section_masonry_shop_links($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $links = (!empty($args['links'])) ? $args['links'] : null;

    if($links){ ?>
        <section class="shop-masonry-links-wrapper <?php echo $class; ?>">
            <div class="shop-masonry-links-container">
                <div class="shop-masonry-links">
                    <?php foreach($links as $key => $l) { 
                        $image = (!empty($l['image'])) ? $l['image'] : null;
                        $text = (!empty($l['text'])) ? $l['text'] : null;
                        $lnk = (!empty($l['link'])) ? $l['link'] : '#';
                        $ratio = ($key == 0) ? 1.3 : (($key == 1 || $key ==2) ? 1.38 : 1.06);
                    ?>
                        <?php if($key == 1){ ?>
                            <div class="shop-masonry-links-grid">
                        <?php } ?>
                            <?php if($image){ ?>
                                <a href="<?php echo $lnk; ?>" class="shop-masonry-link">
                                    <div class="shop-masonry-link-image" data-bgratio="<?php echo $ratio; ?>" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                                    <?php if($text){ ?>
                                        <div class="shop-masonry-link-text">
                                            <?php echo $text; ?>
                                            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                                        </div>
                                    <?php } ?>
                                </a>
                            <?php } ?>
                        <?php if($key == 5){ ?>
                            </div><!-- end shop-masonry-links-grid -->
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}