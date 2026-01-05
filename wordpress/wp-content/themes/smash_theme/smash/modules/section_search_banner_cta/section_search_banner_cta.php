<?php

function smash_section_search_banner_cta($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $subtitle = (!empty($args['subtitle'])) ? $args['subtitle'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';

    if($image){ ?>
        <section class="search-banner-cta <?php echo $class; ?>">
            <div class="search-banner-cta-image" data-bgratio="0.4" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                <?php if($subtitle || $title || $cta){ ?>
                    <div class="search-banner-cta-body">
                        <?php if($subtitle){ ?>
                            <div class="search-banner-cta-subtitle">
                                <?php echo $subtitle; ?>
                            </div>
                        <?php } ?>
                        <?php if($title){ ?>
                            <h2 class="search-banner-cta-title"><?php echo $title; ?></h2>
                        <?php } ?>
                        <?php if($cta){ ?>
                            <a href="<?php echo $link; ?>" class="search-banner-cta-btn animate-right">
                                <span><?php echo $cta; ?></span>
                                <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php }
}