<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_loading_screen_script', get_template_directory_uri() . '/smash/modules/block_loading_screen/block_loading_screen.js', array(), '1', true );
} );

function smash_block_loading_screen($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;

    if($image || $text){ ?>
        <section id="loading_screen" class="<?php echo $class; ?>">
            <div class="loading-screen-wrap">
                <?php if($image){ ?>
                    <div class="loading-gif">
                        <img class="" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                <?php } ?>
                <?php if($text){ ?>
                    <h5 class="loading-msg"><?php echo $text; ?></h5>
                <?php } ?>
            </div>
        </section>
    <?php }
}