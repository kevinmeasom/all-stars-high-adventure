<?php

function smash_block_social_icons( $args = null ) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $icons = (!empty($args['icons'])) ? $args['icons'] : null;
    $labels = (!empty($args['labels'])) ? $args['labels'] : false;
    
    if($icons){ ?>
        <div class="social-icons <?php echo $class; ?>">
            <?php if($title){ ?>
                <span class="social-icons-header"><?php echo $title; ?></span>
            <?php } ?>
            <?php foreach($icons as $icon) { 
                $link = (!empty($icon['link'])) ? $icon['link'] : null;    
                $label = (!empty($icon['label']) && $labels) ? $icon['label'] : null;
                $icon = (!empty($icon['icon'])) ? $icon['icon'] : null;
            ?>
                <?php if($icon && $link){ ?>
                    <a class="social-icon" href="<?php echo $link; ?>" target="_blank"><?php echo $icon; ?><?php echo ($label) ? '<span>'.$label.'</span>' : ''; ?></a>
                <?php } ?>
            <?php } ?>
        </div>
    <?php }
}