<?php

function smash_section_footer_blocks($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $blocks = (!empty($args['blocks'])) ? $args['blocks'] : null;

    if($blocks){ ?>
        <div class="footer-blocks <?php echo $class; ?>">
            <div class="footer-blocks-container footer-blocks-<?php echo count($blocks); ?>">
                <?php foreach($blocks as $key=>$block) { ?>
                    <div class="footer-block footer-<?php echo $key+1; ?> footer-<?php echo $block['type']; ?>">
                        <?php switch ($block['type']) {
                            case 'image':
                                if ( $block['image'] ) : $image = $block['image']; ?>
                                    <div class="footer-logo">
                                        <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                    </div>
                                <?php endif;
                                break;
                            
                            case 'menus':
                                if ( $block['menus'] ) : $menus = $block['menus']; ?>
                                    <?php foreach($menus as $menu) { ?>
                                        <div class="footer-menu-wrapper">
                                            <?php if($menu['title']){ ?>
                                                <div class="footer-menu-title">
                                                    <?php echo $menu['title']; ?>
                                                </div>
                                            <?php } ?>
                                            <?php
                                                wp_nav_menu( array(
                                                    'menu' 	            => $menu['menu'],
                                                    'menu_class'       	=> 'menu',
                                                    'container_class'	=> 'menu-container',
                                                ) );
                                            ?>
                                        </div>
                                    <?php } ?>
                                <?php endif;
                                break;
                            
                            case 'form':
                                if ( $block['form'] ) : ?>
                                    <?php if($block['title']){ ?>
                                        <h2 class="footer-block-title"><?php echo $block['title']; ?></h2>
                                    <?php } ?>
                                    <div class="footer-form">
                                        <?php echo $block['form']; ?>
                                    </div>
                                    <?php if($block['show_social']){ ?>
                                        <?php smash_block_social_icons(['icons' => get_field('social_icons','option')]); ?>
                                    <?php } ?>
                                <?php endif;
                                break;
                            
                            case 'search':
                                if ( $block['type'] == 'search' ) : ?>
                                    <?php if($block['title']){ ?>
                                        <h2 class="footer-block-title"><?php echo $block['title']; ?></h2>
                                    <?php } ?>
                                    <?php smash_block_custom_search(['form' => 'custom_search_form_button_right']); ?>
                                    <?php if($block['show_social']){ ?>
                                        <?php smash_block_social_icons(['icons' => get_field('social_icons','option')]); ?>
                                    <?php } ?>
                                <?php endif;
                                break;

                            case 'social':
                                if ( $block['social_title'] ) : $title = $block['social_title']; ?>
                                    <h2 class="footer-social-title"><?php echo $title; ?></h2>
                                <?php endif;
                                smash_block_social_icons(['icons' => get_field('social_icons','option')]);
                                break;
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}