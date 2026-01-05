<!-- Hero -->
<?php 
$title = (!empty(get_field('hero_hero_title'))) ? get_field('hero_hero_title') : get_the_title();
$image = (!empty(get_field('hero_hero_image'))) ? get_field('hero_hero_image') : ['url' => get_the_post_thumbnail_url($post, 'full')];
smash_section_hero(['title' => $title, 'image' => $image]); ?>

<?php if(!empty(get_the_content())){ ?>
    <div id="page_content" class="entry-content">
        <?php
        if ( ! post_password_required() ) {
            the_content();
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