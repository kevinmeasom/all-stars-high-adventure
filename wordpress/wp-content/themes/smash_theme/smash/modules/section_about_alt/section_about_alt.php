<?php

function smash_section_about_alt($args = null) {
    $subtitle = (!empty($args['subtitle'])) ? $args['subtitle'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $ctas = (!empty($args['ctas'])) ? $args['ctas'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $image = (!empty($args['image'])) ? $args['image'] : null;

    if($text){ ?>
        <section class="about-alt-section">
            <div class="about-alt-section-container">
                <div class="about-alt-section-image-wrap">
                    <?php if($image){ ?>
                        <div class="about-alt-section-image" data-bgratio="1.06" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                    <?php } ?>
                </div>
                <div class="about-alt-section-body">
                    <?php if($subtitle){ ?>
                        <div class="about-alt-section-subtitle">
                            <?php echo $subtitle; ?>
                        </div>
                    <?php } ?>
                    <?php if($title){ ?>
                        <h3 class="about-alt-section-title"><?php echo $title; ?></h3>
                    <?php } ?>
                    <?php if($text){ ?>
                        <div class="about-alt-section-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    <?php if($ctas){ ?>
                        <div class="about-alt-section-ctas">
                            <?php foreach($ctas as $cta) { ?>
                                <a href="<?php echo $cta['link']; ?>" class="btn btn-primary"><?php echo $cta['label']; ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}