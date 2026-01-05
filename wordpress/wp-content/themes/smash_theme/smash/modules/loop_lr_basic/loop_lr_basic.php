<?php 

function smash_loop_lr_basic($args = null){
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $load_more = (!empty($args['load_more'])) ? $args['load_more'] : false;
    $a = (!empty($args['args'])) ? $args['args'] : null;
    $loop = new WP_Query($a);
    if($loop->have_posts()) :
    ?>
        <section class="home-loop <?php echo $class; ?>">
            <?php while($loop->have_posts()) : $loop->the_post(); ?>
                <div class="home-post container-lg">
                    <div class="home-post-inner flex align-center justify-between">
                        <div class="home-post-image" data-bgratio="1.3" style="background: url(<?php the_post_thumbnail_url('full'); ?>) center/cover;"></div>
                        <div class="home-post-content">
                            <div class="home-post-content-inner">
                                <h3 class="home-post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="home-post-meta flex align-center justify-start">
                                    <?php 
                                        $cats = get_the_category();
                                        if($cats){
                                            echo '<a class="category-name" href="'.get_term_link($cats[0]->term_id).'">'.$cats[0]->name.'</a>';
                                        }
                                    ?>
                                    <div class="meta-sep"></div>
                                    <div class="post-date">
                                        <?php echo get_the_date(); ?>
                                    </div>
                                </div>
                                <div class="home-post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="home-post-products rs-code">
                                    <?php smash_single_products(['id' => get_the_ID(), 'products' => get_field('products'), 'class' => 'small-slider']); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                    <span>View Post</span>
                                    <!-- <svg class="icon"><use xlink:href="#right-arrow" /></svg> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); wp_reset_query(); ?>
        </section>

        <?php if($load_more){
            $offset = $a['posts_per_page']+$a['offset'];
            $ppp = $a['posts_per_page'];
            echo do_shortcode('[ajax_load_more container_type="div" css_classes="home-loop" post_type="post" posts_per_page="'.$ppp.'" offset="'.$offset.'" pause="true" scroll="false" button_label="Load More"]'); 
        } ?>
    <?php 
    endif; 
}