<?php

function smash_loop_full_sidebar($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $a = (!empty($args['args'])) ? $args['args'] : null;
    $lp = new WP_Query($a);
    if($lp->have_posts()) : ?>
        <div class="loop-sidebar container-xl <?php echo $class; ?>">
            <div class="loop-sidebar-posts">
                <?php while($lp->have_posts()) : $lp->the_post(); ?>
                    <?php $p = get_post(get_the_ID());
                    if($p){
                        smash_block_post_full(['class' => 'archive-item', 'post' => $p]);
                    } ?>
                <?php endwhile; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    <?php endif; wp_reset_query();
}