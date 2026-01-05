<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_hero_video_script', get_template_directory_uri() . '/smash/modules/section_hero_video/jquery.vide.min.js', array(), '1', true );
} );

function smash_section_hero_video($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $video = (!empty($args['video'])) ? $args['video'] : null;
    $ext = pathinfo($video, PATHINFO_EXTENSION);
    
    if($image){ ?>
        <section id="hero_video" data-vide-bg="<?php echo ($video) ? $ext . ': ' . get_home_url() . $video . ', poster: ' . $image['url'] : 'poster: ' . $image['url']; ?>">
            <?php if($title || $text || $cta){ ?>
                <div class="hero-video-inner">
                    <div class="hero-video-body">
                        <?php if($title){ ?>
                            <h2 class="hero-title"><?php echo $title; ?></h2>
                        <?php } ?>
                        <?php if($text){ ?>
                            <div class="hero-text">
                                <?php echo $text; ?>
                            </div>
                        <?php } ?>
                        <?php if($cta){ ?>
                            <a href="<?php echo $link; ?>" class="hero-cta btn-primary"><?php echo $cta; ?></a>
                        <?php } ?>
                    </div>

                    <svg class="icon scroll-down"><use xlink:href="#scroll-down" /></svg>
                </div>
            <?php } ?>
        </section>

        <script>
            jQuery(function($){
                $('#hero_video').vide({
                    muted: true,
                    loop: true,
                });
            });
        </script>
    <?php }
}