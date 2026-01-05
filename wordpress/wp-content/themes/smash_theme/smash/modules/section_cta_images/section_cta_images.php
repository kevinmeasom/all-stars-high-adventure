<?php

function smash_section_cta_images($args = null) {
    $images = (!empty($args['images'])) ? $args['images'] : null;
    $subtitle = (!empty($args['subtitle'])) ? $args['subtitle'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';

    if($cta){ ?>
        <section class="cta-images-wrapper">
            <div class="cta-images-container">
                <?php if($images[0]){ ?>
                    <div class="cta-image-left" data-bgratio="1" style="background: url(<?php echo $images[0]['sizes']['large']; ?>) no-repeat center/cover;"></div>
                <?php } ?>
                <div class="cta-images-body">
                    <?php if($subtitle){ ?>
                        <div class="cta-images-subtitle">
                            <?php echo $subtitle; ?>
                        </div>
                    <?php } ?>
                    <?php if($title){ ?>
                        <h2 class="cta-images-title"><?php echo $title; ?></h2>
                    <?php } ?>
                    <?php if($text){ ?>
                        <div class="cta-images-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    <?php if($cta){ ?>
                        <a href="<?php echo $link; ?>" class="cta-images-cta"><?php echo $cta; ?></a>
                    <?php } ?>
                </div>
                <?php if($images[1]){ ?>
                    <div class="cta-image-right" data-bgratio="1" style="background: url(<?php echo $images[1]['sizes']['large']; ?>) no-repeat center/cover;"></div>
                <?php } ?>
            </div>
        </section>
    <?php }
}