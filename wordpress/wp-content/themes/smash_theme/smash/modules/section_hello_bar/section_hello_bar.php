<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_hello_bar_script', get_template_directory_uri() . '/smash/modules/section_hello_bar/section_hello_bar.js', array(), '1', true );
} );

function smash_section_hello_bar($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;
    $close = (array_key_exists('close', $args)) ? $args['close'] : false;

    if($text || ($cta && $link)){ ?>
        <div id="hello_bar" class="<?php echo $class; ?>">
            <div class="hello-bar-inner">
                <div class="hello-bar-container">
                    <?php if($text){ ?>
                        <div class="hello-bar-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    <?php if($cta && $link){ ?>
                        <a href="<?php echo $link; ?>" class="hello-bar-cta"><?php echo $cta; ?></a>
                    <?php } ?>
                </div>
                <?php if($close){ ?>
                    <div class="hello-bar-close">
                        <svg class="icon"><use xlink:href="#close" /></svg>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}