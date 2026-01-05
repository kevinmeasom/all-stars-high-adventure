<?php

function smash_section_featured_post($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $p = (!empty($args['post'])) ? $args['post'][0] : null;
    if($p){ ?>
        <div class="featured-post <?php echo $class; ?>" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>) no-repeat center/cover;">
            <div class="featured-post-body">
                <h2 class="featured-post-title"><?php echo get_the_title($p->ID); ?></h2>
                <a href="<?php echo get_the_permalink($p->ID); ?>" class="featured-post-link">Read The Post</a>
            </div>
        </div>
    <?php }
}