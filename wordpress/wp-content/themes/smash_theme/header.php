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

<?php //smash_block_loading_screen(['image' => get_field('loading_image','option'), 'text' => get_field('loading_text','option')]); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kristen_nassif' ); ?></a>
    <input type="hidden" name="site_section" value="site-search" />

    <?php smash_section_hello_bar(['text' => get_field('hello_bar_text','option'), 'cta' => get_field('hello_bar_cta','option'), 'link' => get_field('hello_bar_link','option')]); ?>

	<div id="waypoint"></div>

    <header id="masthead" class="site-header">

        <div class="site-navigation-wrap">

            <div class="header-block header-left">
                <div class="header-block-inner">
                    <?php if(function_exists('smash_nav_mobile')){
                        smash_nav_mobile();
                    } ?>
                    <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo bloginfo('name'); ?></a></h2>
                </div>
            </div>

            <div class="header-block header-middle">
                <div class="header-block-inner">
                    <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo bloginfo('name'); ?></a></h2>
                    <?php
                        wp_nav_menu( array(
                            'theme_location' 	=> 'primary',
                            'menu_class'       	=> 'menu',
                            'container_class'	=> 'menu-container',
                            'walker'            => new Smash_Nav_Walker()
                        ) );
                    ?>
                </div>
            </div>

            <div class="header-block header-right">
                <div class="header-block-inner">
                    <?php smash_block_social_icons(['icons' => get_field('social_icons','option')]); ?>
                    <?php if ( get_field('main_cta','option') && get_field('main_cta_link','option') ) : ?>
                        <a href="<?php echo get_field('main_cta_link','option'); ?>" class="header-cta"><?php echo get_field('main_cta','option'); ?></a>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </header><!-- #masthead -->

    <div id="content" class="site-content">