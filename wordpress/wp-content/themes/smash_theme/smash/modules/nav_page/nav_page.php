<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'nav_page_script', get_template_directory_uri() . '/smash/modules/nav_page/nav_page.js', array(), '1', true );
} );

function smash_nav_page($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $mobile = (!empty($args['mobile'])) ? $args['mobile'] : false;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $index = (!empty($args['index'])) ? $args['index'] : null;
    $index_text = (!empty($args['index_text'])) ? $args['index_text'] : 'All';
    $menu = (!empty($args['menu'])) ? $args['menu'] : null;
    $terms = (!empty($args['terms'])) ? $args['terms'] : null;
    $links = (!empty($args['links'])) ? $args['links'] : null;
    $current = (!empty($args['terms'])) ? get_queried_object() : null;
    $search = (!empty($args['search'])) ? $args['search'] : null;

    if($title || $text || $menu || $terms || $links){ ?>
        <div class="page-nav <?php echo $class; ?> <?php echo ($mobile) ? 'show-mobile' : 'hide-mobile'; ?>">
            <h2 class="page-nav-title <?php echo ($menu || $terms) ? 'between' : 'center'; ?>">
                <span><?php echo $title; ?></span>
                <?php if($menu || $terms){ ?>
                    <svg class="icon"><use xlink:href="#down-angle" /></svg>
                <?php } ?>
            </h2>

            <?php if($text){ ?>
                <div class="page-nav-text">
                    <?php echo $text; ?>
                </div>
            <?php } ?>
            
            <?php if($search){ ?>
                <?php smash_block_custom_search(['form' => $search]); ?>
            <?php } ?>
            
            <?php if($menu){
                wp_nav_menu( array(
                    'menu' 	            => $menu,
                    'menu_class'        => 'page-menu',
                    'container_class'	=> 'page-menu-container',
                ) );
            } ?>
            <?php if($terms){ ?>
                <div class="page-menu-container">
                    <ul class="page-menu menu">
                        <?php if($index){ ?>
                            <li class="menu-term menu-item">
                                <a href="<?php echo $index; ?>" class="term"><?php echo 'View All'; ?></a>
                            </li>
                        <?php } ?>
                        <?php foreach($terms as $term) { $isCurrent = ($current && $term->term_id == $current->term_id) ? 'current-menu-item' : ''; ?>
                            <li class="menu-term menu-item <?php echo $isCurrent; ?>">
                                <a href="<?php echo get_term_link($term->term_id); ?>" class="term"><?php echo $term->name; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?php if($links){ ?>
                <div class="page-menu-container">
                    <ul class="page-menu menu">
                        <?php if($index){ ?>
                            <li class="menu-link menu-item">
                                <a href="<?php echo $index; ?>" class="link"><?php echo $index_text; ?></a>
                            </li>
                        <?php } ?>
                        <?php foreach($links as $link) { 
                            $label = (!empty($link['label'])) ? $link['label'] : null;    
                            $l = (!empty($link['link'])) ? $link['link'] : '#';
                        ?>
                            <li class="menu-term menu-item">
                                <a href="<?php echo $l; ?>" class="term"><?php echo $label; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
    <?php }
}