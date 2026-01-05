<?php
function smash_section_image_text($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $layout = (!empty($args['layout'])) ? $args['layout'] : 'image-left';

    if($image && ($title || $text || $cta)){ ?>
        <div class="image-text <?php echo $class; ?>">
            <div class="image-text-container <?php echo $layout; ?>">
                <div class="image-text-image">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
                <div class="image-text-body">
                    <?php if($title){ ?>
                        <h2 class="image-text-title"><?php echo $title; ?></h2>
                    <?php } ?>
                    <?php if($text){ ?>
                        <div class="image-text-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    <?php if($cta){ ?>
                        <a href="<?php echo $link; ?>" class="image-text-cta"><?php echo $cta; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
}