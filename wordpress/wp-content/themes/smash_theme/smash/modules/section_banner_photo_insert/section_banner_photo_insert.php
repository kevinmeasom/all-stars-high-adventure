<?php

function smash_section_banner_photo_insert($args = null){
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $bgImage = (!empty($args['bgImage'])) ? $args['bgImage'] : null;
    $innerImage = (!empty($args['innerImage'])) ? $args['innerImage'] : null;
    $overlayLeft = (!empty($args['overlayLeft'])) ? $args['overlayLeft'] : null;
    $overlayRight = (!empty($args['overlayRight'])) ? $args['overlayRight'] : null;

    
    if($bgImage){ ?>

        <section id="banner_photo_insert" >
            <div class="banner-photo" data-bgratio="0.88" style="background: url(<?php echo $bgImage['url']; ?>) center/cover;">
            </div>

            <?php if($innerImage){ ?>
                <div class="banner-inner-photo" data-bgratio="1.32" style="background: url(<?php echo $innerImage['url']; ?>) center/cover;"></div>
            <?php } ?>

            <div class="banner-inner">

              <div class="banner-inner-body">
                <?php if($title){ ?>
                    <h2 class="banner-title"><?php echo $title; ?></h2>
                <?php } ?>

                <?php if($text){ ?>
                    <div class="banner-text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>

                <?php if($cta){ ?>
                  <div class="btn-holder">
                    <a href="<?php echo $link; ?>" class="all-products-link btn btn-primary">
                        <?php echo $cta; ?>
                    </a>
                  </div>
                <?php } ?>
              </div><!-- banner-inner-body-->

            </div><!-- banner-inner-->
        </section>
    <?php }
}