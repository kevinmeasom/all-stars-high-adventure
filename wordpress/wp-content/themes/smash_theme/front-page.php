<?php
/**
 * Template name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smash_Theme
 */

get_header();
?>

    <!-- Hero -->
    <?php smash_section_banner_cta(['title' => get_field('banner_banner_cta_title','option'), 'cta' => get_field('banner_banner_cta','option'), 'link' => get_field('banner_banner_cta_link','option'), 'text' => get_field('banner_banner_cta_text','option'), 'image' => get_field('banner_banner_cta_image','option'), 'align' => get_field('banner_banner_align_content','option'), 'justify' => get_field('banner_banner_justify_content','option'), 'scroll' => 'scrollLink']); ?>

    <!-- CTA Blocks -->
    <?php smash_section_cta_blocks(['blocks' => get_field('blocks_cta_blocks','option')]); ?>

    <!-- About -->
    <?php smash_section_about(['id' => 'about_section', 'image' => get_field('about_about_image','option'), 'title' => get_field('about_about_title','option'), 'subtitle' => get_field('about_about_subtitle','option'), 'text' => get_field('about_about_text','option'), 'ctas' => get_field('about_about_ctas','option')]); ?>

    <!-- Reviews -->
    <?php smash_slider_reviews(['image'=> get_field('reviews_reviews_background','option'), 'reviews' => get_field('reviews_reviews','option')]); ?>

    <!-- Tabs -->
    <?php smash_section_tabs(['title' => get_field('tabs_tabs_title','option'), 'tabs' => get_field('tabs_tabs','option')]); ?>

    <!-- FAQs -->
    <?php smash_section_faqs(['class' => 'has-bg', 'title' => get_field('faqs_faqs_title','option'), 'cta' => get_field('faqs_faqs_cta','option'), 'link' => get_field('faqs_faqs_link','option'), 'faqs' => get_field('faqs_faqs','option')]); ?>

    <!-- Gallery -->
    <?php smash_section_gallery(['title' => get_field('gallery_gallery_title','option'), 'cta' => get_field('gallery_gallery_cta','option'), 'link' => get_field('gallery_gallery_link','option'), 'images' => get_field('gallery_gallery','option')]); ?>
        
<?php
get_footer();
