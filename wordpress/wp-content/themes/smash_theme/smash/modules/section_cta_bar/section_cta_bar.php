<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_cta_bar_script', get_template_directory_uri() . '/smash/modules/section_cta_bar/section_cta_bar.js', array(), '1', true );
} );

function smash_section_cta_bar($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';

    if($title || $cta){ ?>
        <div class="cta-bar">
            <?php if($title){ ?>
                <h2 class="cta-bar-title"><?php echo $title; ?></h2>
            <?php } ?>
            <?php if($cta){ ?>
                <a href="<?php echo $link; ?>" class="cta-bar-cta"><?php echo $cta; ?></a>
            <?php } ?>
        </div>
    <?php }
}