<?php

function smash_section_featured_snapshots($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $snapshots = (!empty($args['snapshots'])) ? $args['snapshots'] : null;

    if($snapshots){ ?>
        <div class="featured-snapshots-wrapper <?php echo $class; ?>">
            <div class="featured-snapshots-header">
                <div class="featured-snapshots-header-left">
                    <?php if($title){ ?>
                        <h2 class="featured-snapshots-title smash-tabbed-title"><?php echo $title; ?></h2>
                    <?php } ?>
                    <?php if($text){ ?>
                        <div class="featured-snapshots-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="featured-snapshots-header-right">
                    <?php if($cta){ ?>
                        <a href="<?php echo $link; ?>" class="featured-snapshots-cta"><?php echo $cta; ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="featured-snapshots">
                <?php foreach($snapshots as $snapshot) { ?>
                    <?php smash_block_snapshot(['class' => 'archive-item', 'extras' => false, 'snapshot' => $snapshot]); ?>
                <?php } ?>
            </div>
        </div>
    <?php }
}