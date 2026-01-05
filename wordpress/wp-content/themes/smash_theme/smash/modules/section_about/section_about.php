<?php

function smash_section_about($args = null) {
    $id = (!empty($args['id'])) ? $args['id'] : null;
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $subtitle = (!empty($args['subtitle'])) ? $args['subtitle'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $ctas = (!empty($args['ctas'])) ? $args['ctas'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;

    if($text){ ?>
        <section <?php echo 'id="'.$id.'"'; ?> class="about-section <?php echo $class; ?>">
            <div class="about-section-container">
                <?php if($image){ ?>
                    <div class="about-section-image" data-bgratio="1.28" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                <?php } ?>
                <div class="about-section-body">
                    <?php if($title){ ?>
                        <h2 class="about-section-title"><?php echo $title; ?></h2>
                    <?php } ?>
                    <?php if($subtitle){ ?>
                        <div class="about-section-subtitle">
                            <?php echo $subtitle; ?>
                        </div>
                    <?php } ?>
                    <?php if($text){ ?>
                        <div class="about-section-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    <?php if($ctas){ ?>
                        <div class="about-section-ctas">
                            <?php foreach($ctas as $cta) { ?>
                                <a href="<?php echo $cta['link']; ?>" class="about-cta"><?php echo $cta['label']; ?></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}