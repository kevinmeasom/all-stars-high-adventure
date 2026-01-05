<?php

function smash_section_banner_cta($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $align = (!empty($args['align'])) ? $args['align'] : 'align-center';
    $justify = (!empty($args['justify'])) ? $args['justify'] : 'justify-center';
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $scroll = (!empty($args['scroll'])) ? $args['scroll'] : null;

    if($image){ ?>
        <section class="banner-cta <?php echo $class; ?>">
            <div class="banner-cta-image flex-row <?php echo $align . ' ' . $justify; ?>" data-bgratio="0.42" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;">
                <?php if($title || $text || $cta){ ?>
                    <div class="banner-cta-body">
                        <?php if($title){ ?>
                            <h2 class="banner-cta-title"><?php echo $title; ?></h2>
                        <?php } ?>
                        <?php if($text){ ?>
                            <div class="banner-cta-text">
                                <?php echo $text; ?>
                            </div>
                        <?php } ?>
                        <?php if($cta){ ?>
                            <a href="<?php echo $link; ?>" class="banner-cta-btn btn btn-secondary <?php echo $scroll; ?>"><?php echo $cta; ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php }
}