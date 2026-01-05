<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_press_script', get_template_directory_uri() . '/smash/modules/slider_press/slider_press.js', array(), '1', true );
} );

function smash_slider_press($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $items = (!empty($args['items'])) ? $args['items'] : null;

    if($items){ ?>
        <div class="press <?php echo $class; ?>">
            <div class="press-container">
                <?php if($title){ ?>
                    <h1 class="press-title"><?php echo $title; ?></h1>
                <?php } ?>
                <div class="press-slider">
                    <?php foreach($items as $item) { 
                        $image = (!empty($item['image'])) ? $item['image'] : null;
                        $link = (!empty($item['link'])) ? $item['link'] : '#';
                    ?>
                        <?php if($image){ ?>
                            <div class="press-slide">
                                <a href="<?php echo $link; ?>" class="press-slide-inner">
                                    <img class="press-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
}