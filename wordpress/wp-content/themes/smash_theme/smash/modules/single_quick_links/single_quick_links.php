<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'single_quick_links_script', get_template_directory_uri() . '/smash/modules/single_quick_links/single_quick_links.js', array(), '1', true );
} );

function smash_single_quick_links($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $links = (!empty($args['links'])) ? $args['links'] : null;

    if($links){ ?>
        <div class="quick-links <?php echo $class; ?>">
            <h3 class="quick-links-header">Quick Links</h3>
            <?php echo $links; ?>
        </div>
    <?php }
}