<?php

function smash_section_featured_cats($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $terms = (!empty($args['terms'])) ? $args['terms'] : null;
    
    if($terms) : ?>
        <section id="featured_cats" class="<?php echo $class; ?>">
            <?php if($title){ ?>
                <h2 class="featured-cats-title"><?php echo $title; ?></h2>
            <?php } ?>
            <div class="featured-cats-container">
                <?php foreach( $terms as $term ) : $image = (!empty($term['image'])) ? $term['image'] : null; ?>
                    <?php if($image){ ?>
                        <div class="featured-cat">
                            <div class="featured-cat-image" data-bgratio="1.4" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                                <a href="<?php echo get_term_link($term['category']->term_id); ?>" class="featured-cat-title btn btn-primary"><?php echo $term['category']->name; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </section>
    <?php
    endif;
}