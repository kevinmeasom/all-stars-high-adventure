<?php

function smash_section_instagram($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $type = (!empty($args['type'])) ? $args['type'] : 'feed';
    $title = (!empty($args['title'])) ? $args['title'] : null; 
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;
    $embed = (!empty($args['embed'])) ? $args['embed'] : null;
    $images = (!empty($args['images'])) ? $args['images'] : null;

    if($embed || $images){
    ?>
    <section class="ig-section <?php echo $class; ?>">
        <div class="ig-container">
            <?php if($title){ ?>
                <div class="ig-header">
                    <h2 class="ig-title"><?php echo $title; ?></h2>
                </div>
            <?php } ?>
            <?php if($type == 'manual' && $images){ ?>
                <div class="ig-images">
                    <?php foreach($images as $image) { ?>
                        <div class="ig-image" data-bgratio="1" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                    <?php } ?>
                </div>
                <?php if($cta && $link){ ?>
                    <a class="ig-cta" href="<?php echo $link; ?>" target="_blank"><?php echo $cta; ?></a>
                <?php } ?>
            <?php } elseif($type == 'feed' && $embed) { ?>
                <div class="ig-feed">
                    <?php if($cta && $link){ ?>
                        <a class="ig-cta" href="<?php echo $link; ?>" target="_blank"><?php echo $cta; ?></a>
                    <?php } ?>
                    <?php echo $embed; ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <?php }
}