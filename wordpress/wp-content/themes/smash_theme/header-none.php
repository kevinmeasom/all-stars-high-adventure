<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smash_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( get_field('favicon','option') ) : $image = get_field('favicon','option'); ?>
        <link rel="shortcut icon" href="<?php echo $image['url']; ?>" />
    <?php endif; ?>
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php smash_block_loading_screen(['image' => get_field('loading_image','option'), 'text' => get_field('loading_text','option')]); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kristen_nassif' ); ?></a>
    <input type="hidden" name="site_section" value="site-search" />

    <div id="content" class="site-content">

        <?php if ( get_field('logo','option') ) : $image = get_field('logo','option'); ?>
            <div id="logo_wrap">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"/>
                </a>
            </div>
        <?php endif; ?>