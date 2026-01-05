<?php
function smash_block_title($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $main = (!empty($args['main'])) ? $args['main'] : false;

    if($title){ ?>
        <div class="title-section <?php echo $class; ?>">
            <?php
            switch ($main) {
                case true: ?>
                    <h1 class="title-section-title"><?php echo $title; ?></h1>
                    <?php break;
                
                default: ?>
                    <h2 class="title-section-title"><?php echo $title; ?></h2>
                    <?php break;
            } ?>
        </div>
    <?php }
}