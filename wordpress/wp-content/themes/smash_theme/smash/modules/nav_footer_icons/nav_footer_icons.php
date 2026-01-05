<?php

function smash_nav_footer_icons($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $links = (!empty($args['links'])) ? $args['links'] : null;

    if($links){ ?>
        <div class="icons-nav <?php echo $class; ?>">
            <ul class="menu">
                <?php foreach($links as $l) {
                    $icon = (!empty($l['icon'])) ? $l['icon'] : null;
                    $image = (!empty($l['image'])) ? $l['image'] : null;
                    $link = (!empty($l['link'])) ? $l['link'] : '#';
                    $css_class = (!empty($l['css_class'])) ? $l['css_class'] : null;
                ?>
                    <li class="icons-nav-menu-item menu-item <?php echo $css_class; ?>">
                        <a href="<?php echo $link; ?>" class="icons-nav-link">
                            <?php if($image){ ?>
                                <img class="icons-nav-menu-item-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php } elseif($icon){ ?>
                                <?php echo $icon; ?>
                            <?php } ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <script>
            jQuery(function($){
                $('body').addClass('has-icon-nav')
            })
        </script>
    <?php }
}