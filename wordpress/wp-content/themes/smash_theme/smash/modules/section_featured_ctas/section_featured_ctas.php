<?php

function smash_section_featured_ctas($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $ctas = (!empty($args['ctas'])) ? $args['ctas'] : null;
    
    if($ctas): ?>
        <section class="featured-ctas <?php echo $class; ?>">
            <div class="featured-ctas-container">
                <?php if($title){ ?>
                    <h2 class="featured-ctas-title"><?php echo $title; ?></h2>
                <?php } ?>
                <div class="featured-ctas-wrapper">
                    <?php foreach( $ctas as $cta ): ?>
                        <?php if($cta['label'] && $cta['link']){ ?>
                            <a href="<?php echo $cta['link']; ?>" class="featured-cta btn-primary"><?php echo $cta['label']; ?></a>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php
    endif;
}