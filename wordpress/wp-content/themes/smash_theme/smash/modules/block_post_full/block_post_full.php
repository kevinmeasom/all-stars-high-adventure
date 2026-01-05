<?php
function smash_block_post_full($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $p = (!empty($args['post'])) ? $args['post'] : null;

    if($p){ ?>
        <div class="home-post-full <?php echo $class; ?>">
            <div class="home-post-inner">
                <div class="home-post-content">
                    <div class="home-post-content-inner">
                        <h3 class="home-post-title">
                            <a href="<?php echo get_the_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a>
                        </h3>
                        <div class="home-post-meta flex align-center justify-start">
                            <?php 
                                $cats = get_the_category($p->ID);
                                if($cats){
                                    echo '<a class="category-name" href="'.get_term_link($cats[0]->term_id).'">'.$cats[0]->name.'</a>';
                                }
                            ?>
                        </div>
                        <div class="home-post-excerpt entry-content">
                            <?php echo get_the_content($p->ID); ?>
                        </div>
                        <?php if ( get_field('products', $p->ID) ) : ?>
                            <div class="rs-code">
                                <?php echo get_field('products', $p->ID); ?>
                            </div>
                        <?php endif; ?>
                        <a href="<?php echo get_the_permalink($p->ID); ?>" class="btn btn-primary">
                            <span>View Post</span>
                            <!-- <svg class="icon">
                                <use xlink:href="#right-arrow" />
                            </svg> -->
                        </a>
                        <div class="full-post-footer flex align-center justify-between">
                            <div class="comments">
                                <?php comments_num(); ?>
                            </div>
                            <div id="share-<?php echo $p->ID; ?>" class="social-share">
                                <span class="share-title">Share</span>
                                <input class="image" type="hidden" value="<?php echo get_the_post_thumbnail_url($p->ID); ?>">
                                <input class="url" type="hidden" value="<?php echo get_the_permalink($p->ID); ?>">
                                <input class="title" type="hidden" value="<?php echo get_the_title($p->ID); ?>">
                                <button class="share s_facebook btn-off"><i class="fab fa-facebook" aria-hidden="true"></i></button>
                                <button class="share s_pinterest btn-off"><i class="fab fa-pinterest-p" aria-hidden="true"></i></button>
                                <button class="share s_twitter btn-off"><i class="fab fa-twitter" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}