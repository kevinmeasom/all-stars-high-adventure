<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smash_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header container-lg">
        <div class="entry-header-inner">
            <?php $cats = get_the_category(); 
            if($cats) { ?>
                <a href="<?php echo get_term_link($cats[0]->term_id); ?>" class="entry-cat"><?php echo $cats[0]->name; ?></a>
            <?php } ?>
            <div class="dot-sep"></div>
            <div class="entry-date"><?php echo get_the_date(); ?></div>
        </div>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->


    <div class="entry-content container-lg">
        <?php
        get_the_password_form();
        the_content( sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'our_family_passport' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'our_family_passport' ),
            'after'  => '</div>',
        ) );
        ?>

        <?php //smash_single_quick_links(['links' => get_field('quick_links')]); ?>
    </div><!-- .entry-content -->

    <?php if ( have_rows('products') ) : ?>
        <div class="entry-products">
            <div class="entry-products-wrap container-lg">
                <div class="entry-product-header">
                    <svg class="icon"><use xlink:href="#shopping-bag" /></svg>
                    <span>Shop the Post</span>
                </div>
                <?php smash_single_products(['id' => get_the_ID(), 'products' => get_field('products')]); ?>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="article-sidebar article-sidebar-right">
        <?php smash_block_share_icons(['title' => 'Share', 'class' => 'vertical-share', 'post' => get_the_ID()]); ?>
        <?php if ( get_field('products') ) : ?>
            <div class="post-products-wrap">
                <a href="#products_slider_<?php echo get_the_ID(); ?>" class="post-products-trigger">
                    <svg class="icon"><use xlink:href="#shopping-bag" /></svg>
                    <span>Shop</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
    
    <div id="hide_sidebars"></div>

    <div class="entry-footer">
        <div class="container-md">
            <div class="entry-footer-actions flex align-center justify-center">
                <?php if ( comments_open() || get_comments_number() ) { ?>
                    <a href="#comments" id="comment-btn" class="comment-btn scrollLink flex align-center justify-center">Leave A Comment</a>
                    <div class="dot-sep"></div>
                <?php } ?>
                <?php smash_block_share_icons(['class' => 'fade-share', 'title' => 'Share The Post', 'post' => get_the_ID()]); ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->