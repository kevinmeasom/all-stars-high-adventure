<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_search_script', get_template_directory_uri() . '/smash/modules/block_search/block_search.js', array(), '1', true );
} );

function smash_block_search($args = null){
    $class = (!empty($args['class'])) ? $args['class'] : null;
    ?>
        <aside id="search-modal" class="modal <?php echo $class; ?>">
            <div id="search-modal-box" class="modal-box">
                <div id="search-close">
                    <svg class="icon"><use xlink:href="#close" /></svg>
                </div>
                <div id="search-modal-inner" class="modal-inner">
                    <div class="site-search">
                        <?php smash_block_custom_search(['form' => 'custom_search_form_button_right']); ?>
                    </div>
                </div>
            </div>
        </aside>
    <?php
}