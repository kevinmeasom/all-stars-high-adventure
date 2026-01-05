<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'nav_mobile_script', get_template_directory_uri() . '/smash/modules/nav_mobile/nav_mobile.js', array(), '1', true );
} );

function smash_nav_mobile($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    ?>
        <div id="mobile_nav_wrap" class="<?php echo $class; ?>">
            <svg class="mobile-nav-trigger mobile-nav-trigger-open icon">
                <use xlink:href="#burger" />
            </svg>
            <div id="mobile_nav_bg"></div>
            <div class="mobile-nav-outer">
                <svg class="mobile-nav-trigger mobile-nav-trigger-close icon">
                    <use xlink:href="#close" />
                </svg>
                <div class="mobile-nav-inner flex-col align-center justify-start">
                    <div class="mobile-nav-body flex-col align-center justify-start">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' 	=> 'mobile',
                                'menu_id'        	=> 'mobile_menu',
                                'menu_class'       	=> 'mobile-menu',
                                'container_id'	    => 'mobile_menu_container',
                                'container_class'	=> 'menu-container',
                                'walker'            => new Smash_Nav_Count_Walker()
                            ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php
}