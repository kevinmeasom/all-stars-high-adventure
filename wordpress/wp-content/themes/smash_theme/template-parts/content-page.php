<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smash_Theme
 */

?>

<!-- Hero -->
<?php 
$title = (!empty(get_field('hero_hero_title'))) ? get_field('hero_hero_title') : get_the_title();
$image = (!empty(get_field('hero_hero_image'))) ? get_field('hero_hero_image') : ['url' => get_the_post_thumbnail_url($post, 'full')];
smash_section_hero(['title' => $title, 'image' => $image]); ?>

<!-- Intro -->
<?php smash_section_intro(['title' => get_field('intro_intro_title'), 'text' => get_field('intro_intro_text'), 'ctas' => get_field('intro_intro_ctas')]); ?>

<!-- Gallery -->
<?php smash_section_gallery(['title' => get_field('gallery_gallery_title'), 'cta' => get_field('gallery_gallery_cta'), 'link' => get_field('gallery_gallery_link'), 'images' => get_field('gallery_gallery')]); ?>


<?php if(!empty(get_the_content()) || !empty(get_field('faqs_faq_rows'))){ ?>
    <div id="page_content" class="entry-content">
        <?php
        if ( ! post_password_required() ) {
            the_content();

            smash_section_faq_rows(['rows' => get_field('faqs_faq_rows')]);
        } else {
            echo get_the_password_form();
        }
    
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'smash_theme' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->
<?php } ?>