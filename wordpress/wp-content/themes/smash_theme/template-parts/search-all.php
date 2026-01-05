<div class="archive-bg">
    <div class="site-search">
        <?php smash_block_custom_search(['form' => 'custom_search_form_icon_right']); ?>
    </div>

    <div class="search-archive archive-items container-lg">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php 
            $p = get_post(get_the_ID());
            $type = $p->post_type;
            if($p){
                if ($type == 'affiliate_product') { 
                    smash_block_product(['class' => 'product-grid-item', 'product' => $p, 'description' => false]);
                } elseif ($type == 'post') { 
                    smash_block_post(['class' => 'archive-item', 'post' => $p]);
                }
            }
            ?>
        <?php endwhile; ?>
    </div>

    <!-- Load More -->
    <?php echo do_shortcode('[ajax_load_more container_type="div" css_classes="search-archive archive-items container-lg alm-grid-loop-container" post_type="post, affiliate_product" search="'.get_search_query().'" posts_per_page="12" offset="12" pause="true" scroll="false" button_label="Load More"]'); ?>
</div>