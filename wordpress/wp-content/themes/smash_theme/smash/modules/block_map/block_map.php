<?php

function smash_block_map($args = null) {
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $markers = (!empty($args['markers'])) ? $args['markers'] : null;

    if($image && $markers){ ?>
        <div class="map-wrapper">
            <img class="map-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
            <?php if($markers){ ?>
                <?php foreach($markers as $key=>$marker) { 
                    $x = (!empty($marker['x_coordinate'])) ? $marker['x_coordinate'] : null;
                    $y = (!empty($marker['y_coordinate'])) ? $marker['y_coordinate'] : null;
                    $marker_image = (!empty($marker['image'])) ? $marker['image'] : null;
                    $title = (!empty($marker['title'])) ? $marker['title'] : null;
                    $cta = (!empty($marker['cta'])) ? $marker['cta'] : null;
                    $link = (!empty($marker['link'])) ? $marker['link'] : '#';
                    $top = ($y && $y <= 50) ? 'top: 100%;' : 'bottom: 100%;';
                    $left = ($x && $x >= 75) ? 'right: 0;' : (($x && $x >= 25) ? 'left: 100%;' : 'left: 0;');
                    $transform = ($x && $x >= 75) ? '' : (($x && $x >= 25) ? 'transform: translate(-50%, 0);' : '');
                ?>
                    <?php if(($title || $text || $cta) && $x && $y){ ?>
                        <div class="marker-wrapper" style="top: <?php echo $y; ?>%; left: <?php echo $x; ?>%;">
                            <div class="marker"></div>
                            <div class="marker-item" style="<?php echo $top . ' ' . $left . ' ' . $transform; ?>">
                                <?php if($marker_image){ ?>
                                    <div class="marker-item-image" data-bgratio="1" style="background: url(<?php echo $marker_image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                                <?php } ?>
                                <div class="marker-item-body">
                                    <?php if($title){ ?>
                                        <h4 class="marker-item-title"><?php echo $title; ?></h4>
                                    <?php } ?>
                                    <?php if($cta){ ?>
                                        <a href="<?php echo $link; ?>" target="_blank" class="marker-item-cta"><?php echo $cta; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    <?php }
}