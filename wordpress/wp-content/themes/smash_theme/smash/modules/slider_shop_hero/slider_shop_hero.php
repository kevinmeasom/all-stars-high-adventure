<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_shop_hero_script', get_template_directory_uri() . '/smash/modules/slider_shop_hero/slider_shop_hero.js', array(), '1', true );
} );

function smash_slider_shop_hero($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $slides = (!empty($args['slides'])) ? $args['slides'] : null;
    
    if($slides){ ?>
        <section id="hero_slider" class="<?php echo $class; ?>">
            <div class="container-xl hero-slider">
                <?php foreach($slides as $slide) { 
                    $image = (!empty($slide['image'])) ? $slide['image'] : null;
                    $title = (!empty($slide['title'])) ? $slide['title'] : null;
                    $cta = (!empty($slide['cta'])) ? $slide['cta'] : null;
                    $link = (!empty($slide['link'])) ? $slide['link'] : '#';

                    if($image){ ?>
                        <div class="hero-slide">
                            <div class="hero-image" data-bgratio="0.60" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;">
                                <?php if($title || $cta){ ?>
                                    <div class="hero-body">
                                        <?php if($title){ ?>
                                            <h2 class="hero-title"><?php echo $title; ?></h2>
                                        <?php } ?>
                                        <?php if($cta){ ?>
                                            <a href="<?php echo $link; ?>" class="btn btn-primary"><?php echo $cta; ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </section>
    <?php }
}