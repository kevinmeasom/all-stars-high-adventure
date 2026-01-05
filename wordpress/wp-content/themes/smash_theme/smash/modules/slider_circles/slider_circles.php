<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_circles_script', get_template_directory_uri() . '/smash/modules/slider_circles/slider_circles.js', array(), '1', true );
} );

function smash_slider_circles($args = null){
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $slides = (!empty($args['slides'])) ? $args['slides'] : null;

    if($slides){ ?>
        <section id="circle_links" class="<?php echo $class; ?>">
            <?php if($title){ ?>
                <div class="circle-links-header <?php echo ($cta) ? 'has-cta' : ''; ?>">
                    <?php if($title){ ?>
                        <h2 class="circle-links-title">
                            <?php echo $title; ?>
                        </h2>
                    <?php } ?>
                    <?php if($cta){ ?>
                        <a href="<?php echo $link; ?>" class="circle-links-cta">
                            <span><?php echo $cta; ?></span>
                            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="circle-links-container">
                <div class="circle-links-slider">
                    <?php foreach($slides as $slide) { ?>
                        <a href="<?php echo $slide['link']; ?>" class="circle-slide">
                            <div class="circle-slide-inner">
                                <?php if ( $slide['image'] ) : $image = $slide['image']; ?>
                                    <div class="circle-slide-image" data-bgratio="1" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                                <?php endif; ?>
                                <div class="circle-slide-text"><?php echo $slide['text']; ?></div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}