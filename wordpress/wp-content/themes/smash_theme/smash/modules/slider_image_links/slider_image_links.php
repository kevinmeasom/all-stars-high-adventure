<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_image_links_script', get_template_directory_uri() . '/smash/modules/slider_image_links/slider_image_links.js', array(), '1', true );
} );

function smash_slider_image_links($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $links = (!empty($args['links'])) ? $args['links'] : null;
    
    if($links){ ?>
        <div class="image-links blob-br-orange">
            <div class="image-links-container">
                <?php if($title){ ?>
                    <h2 class="image-links-title"><?php echo $title; ?></h2>
                <?php } ?>
                <?php if($text){ ?>
                    <div class="image-links-text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
                <div class="image-links-slider">
                    <?php foreach($links as $link) { 
                        $image = (!empty($link['image'])) ? $link['image'] : null;
                        $title = (!empty($link['title'])) ? $link['title'] : null;
                        $l = (!empty($link['link'])) ? $link['link'] : null;
                    ?>
                        <?php if($image){ ?>
                            <div class="image-link">
                                <a href="<?php echo $l; ?>" class="image-link-inner" data-bgratio="1" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                                    <?php if($title){ ?>
                                        <div class="image-link-title">
                                            <?php echo $title; ?>
                                        </div>
                                    <?php } ?>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <?php if($cta){ ?>
                    <a href="<?php echo $link; ?>" class="image-links-cta"><?php echo $cta; ?></a>
                <?php } ?>
            </div>
        </div>
    <?php }
}