<?php

function smash_section_map_links($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $markers = (!empty($args['markers'])) ? $args['markers'] : null;

    if($markers){ ?>
        <section class="map-wrapper <?php echo $class; ?>">
            <div class="map-container">
                <div class="map-body">
                    <?php if($title){ ?>
                        <h2 class="map-title"><?php echo $title; ?></h2>
                    <?php } ?>
                    <?php if($text){ ?>
                        <div class="map-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    <?php if($cta){ ?>
                        <a href="<?php echo $link; ?>" class="map-cta"><?php echo $cta; ?></a>
                    <?php } ?>
                </div>
                <div class="map-block">
                    <?php smash_block_map(['image' => $image, 'markers' => $markers]); ?>
                </div>
            </div>
        </section>
    <?php }
}