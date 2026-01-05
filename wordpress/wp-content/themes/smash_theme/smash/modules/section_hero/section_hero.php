<?php

function smash_section_hero($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';

    if($image){ ?>
        <section class="hero <?php echo $class; ?>">
            <div class="hero-image" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;">
                <?php if($title || $text || $cta){ ?>
                    <div class="hero-body">
                        <?php if($title){ ?>
                            <h1 class="hero-title"><?php echo $title; ?></h1>
                        <?php } ?>
                        <?php if($text){ ?>
                            <div class="hero-text">
                                <?php echo $text; ?>
                            </div>
                        <?php } ?>
                        <?php if($cta){ ?>
                            <a href="<?php echo $link; ?>" class="hero-btn"><?php echo $cta; ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php }
}