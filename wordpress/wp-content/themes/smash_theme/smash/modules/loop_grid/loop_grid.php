<?php

function smash_loop_grid($args = null){
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $load_more = (!empty($args['load_more'])) ? $args['load_more'] : false;
    $a = (!empty($args['args'])) ? $args['args'] : ['post_type' => 'post', 'posts_per_page' => 4];
    $lp = new WP_Query($a);

    if($lp->have_posts()) : ?>
        <section class="grid-loop <?php echo $class; ?>">
            <?php if($title){ ?>
                <div class="grid-loop-header">
                    <h2 class="grid-loop-title"><?php echo $title; ?></h2>
                </div>
            <?php } ?>
            
            <div class="grid-loop-container">
                <?php while($lp->have_posts()) : $lp->the_post(); ?>
                    <?php $p = get_post(get_the_ID());
                    if($p){
                        smash_block_post(['class' => 'archive-item', 'post' => $p, 'hide_cat' => true, 'hide_text' => true, 'hide_link' => true]);
                    } ?>
                <?php endwhile; ?>
            </div>

            <?php if($load_more){ $offset = (!empty($a['offset'])) ? $a['offset'] + $a['posts_per_page'] : $a['posts_per_page']; ?>
                <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_1" css_classes="grid-loop-container" post_type="post" posts_per_page="'.$a['posts_per_page'].'" offset="'.$offset.'" pause="true" scroll="false" button_label="Load More"]'); ?>
            <?php } ?>
        </section>
    <?php endif; wp_reset_query();
}