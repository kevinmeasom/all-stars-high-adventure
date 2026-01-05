<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_hero_script', get_template_directory_uri() . '/smash/modules/slider_hero/slider_hero.js', array(), '1', true );
} );

function smash_slider_hero($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $slides = (!empty($args['slides'])) ? $args['slides'] : null;

    if($slides){ ?>
        <div class="hero-slider-wrapper <?php echo $class; ?>">
            <div class="hero-slider">
                <?php foreach($slides as $slide) { 
                    $image = (!empty($slide['image'])) ? $slide['image'] : null;
                    $subtitle = (!empty($slide['subtitle'])) ? $slide['subtitle'] : null;
                    $title = (!empty($slide['title'])) ? $slide['title'] : null;
                    $text = (!empty($slide['text'])) ? $slide['text'] : null;
                    $cta = (!empty($slide['cta'])) ? $slide['cta'] : null;
                    $link = (!empty($slide['link'])) ? $slide['link'] : '#';
                ?>
                    <?php if($image){ ?>
                        <div class="hero-slide">
                            <div class="hero-slide-inner" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                                
                                <?php if($subtitle || $title || $text || $cta){ ?>
                                    <div class="hero-slide-body">
                                        <?php if($subtitle){ ?>
                                            <div class="hero-slide-subtitle">
                                                <?php echo $subtitle; ?>
                                            </div>
                                        <?php } ?>
                                        <?php if($title){ ?>
                                            <h2 class="hero-slide-title"><?php echo $title; ?></h2>
                                        <?php } ?>
                                        <?php if($text){ ?>
                                            <div class="hero-slide-text">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php } ?>
                                        <?php if($cta){ ?>
                                            <a href="<?php echo $link; ?>" class="hero-slide-cta"><?php echo $cta; ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php }
}