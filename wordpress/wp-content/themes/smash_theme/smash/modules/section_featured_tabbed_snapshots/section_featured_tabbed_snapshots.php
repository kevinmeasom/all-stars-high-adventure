<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_featured_tabbed_snapshots_script', get_template_directory_uri() . '/smash/modules/section_featured_tabbed_snapshots/section_featured_tabbed_snapshots.js', array(), '1', true );
} );

function smash_section_featured_tabbed_snapshots($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $categories = (!empty($args['categories'])) ? $args['categories'] : null;
    
    if($categories){ ?>
        <div class="featured-tabbed-snapshots smash-tabbed-wrapper <?php echo $class; ?>">
            <?php if($title){ ?>
                <h2 class="featured-tabbed-snapshots-title smash-tabbed-title"><?php echo $title; ?></h2>
            <?php } ?>
            <?php if($text){ ?>
                <div class="featured-tabbed-snapshots-text">
                    <?php echo $text; ?>
                </div>
            <?php } ?>
            <div class="smash-tabbed-tabs-wrapper">
                <div class="smash-tabbed-tabs-inner">
                    <div class="smash-tabbed-tabs">
                        <?php $tab = 1; foreach($categories as $cat) { $active = ($tab == 1) ? 'active' : ''; ?>
                            <div class="snapshot-tab smash-tab <?php echo $active; ?>" data-tab="snapshot_tab_<?php echo $tab; ?>"><?php echo $cat->name; ?></div>
                        <?php $tab++; } ?>
                    </div>
                    <?php if($cta){ ?>
                        <a href="<?php echo $link; ?>" class="smash-tabbed-cta"><?php echo $cta; ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="smash-tabbed-content">
                <?php $content = 1; foreach($categories as $cat) { 
                    $active = ($content == 1) ? 'active' : '';
                    $lp = new WP_Query([
                        'post_type' => 'snapshot',
                        'posts_per_page' => 4,
                        'tax_query' => [
                            [
                                'taxonomy' => 'snapshot_category',
                                'terms' => $cat->term_id,
                            ]
                        ],
                    ]);

                    if($lp->have_posts()) : ?>
                        <div id="snapshot_tab_<?php echo $content; ?>" class="snapshot-tab-content smash-tab-content <?php echo $active; ?>">
                            <div class="smash-tab-content-inner">
                                <?php while($lp->have_posts()) : $lp->the_post(); ?>
                                    <?php 
                                    $p = get_post(get_the_ID());
                                    if($p){ 
                                        smash_block_snapshot(['class' => 'archive-item', 'extras' => false, 'snapshot' => $p]); 
                                    } ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; wp_reset_query(); ?>
                <?php $content++; } ?>
            </div>
        </div>
    <?php }
}