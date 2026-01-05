<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_style( 'swipe-style', get_template_directory_uri().'/smash/modules/section_gallery/swipebox/css/swipebox.min.css');
    wp_enqueue_script( 'swipe-script', get_template_directory_uri().'/smash/modules/section_gallery/swipebox/js/jquery.swipebox.min.js', array(), '1', true);
    wp_enqueue_script( 'masonry-script', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), '1', true);
    wp_enqueue_script( 'imagesloaded-script', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array(), '1', true);
    wp_enqueue_script( 'section_gallery_script', get_template_directory_uri() . '/smash/modules/section_gallery/section_gallery.js', array('swipe-script','masonry-script','imagesloaded-script'), '1', true );
} );

function smash_section_gallery($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $images = (!empty($args['images'])) ? $args['images'] : null;
    
    if($images){ ?>
        <section id="gallery-photos">
            <div class="gallery-container">
                <?php if($title){ ?>
                    <h2 class="gallery-title"><?php echo $title; ?></h2>
                <?php } ?>
                <div class="gallery-container grid">
                    <div class="grid-sizer"></div>
                    <?php foreach($images as $image) { ?>
                        <a class="gallery-image grid-item swipebox" title="<?php echo $title; ?>" href="<?php echo $image['url']; ?>">
                            <div class="gallery-image-inner">
                                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <?php if($cta){ ?>
                    <a href="<?php echo $link; ?>" class="gallery-cta"><?php echo $cta; ?></a>
                <?php } ?>
            </div>
        </section>
    <?php }
}