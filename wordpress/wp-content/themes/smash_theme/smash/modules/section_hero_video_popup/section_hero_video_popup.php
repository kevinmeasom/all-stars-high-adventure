<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_hero_video_popup_script', get_template_directory_uri() . '/smash/modules/section_hero_video_popup/section_hero_video_popup.js', array(), '1', true );
} );

function smash_section_hero_video_popup($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $id = (!empty($args['id'])) ? $args['id'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : 'watch';
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $video = (!empty($args['video'])) ? $args['video'] : null;

    if($id && $image && $cta && $video){ ?>
        <div class="hero-video-popup <?php echo $class; ?>" data-bgratio="0.4" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
            <?php if($title || $text || $cta){ ?>
                <div class="hero-video-popup-body">
                    <?php if($title){ ?>
                        <h2 class="hero-video-popup-title"><?php echo $title; ?></h2>
                    <?php } ?>
                    <?php if($text){ ?>
                        <div class="hero-video-popup-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    <?php if($cta){ ?>
                        <a href="#" class="hero-video-popup-cta popup-video-open" data-vid="<?php echo $id; ?>"><?php echo $cta; ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php if($video){ ?>
            <div id="<?php echo $id; ?>" class="popup-video">
                <div class="popup-video-inner">
                    <div class="popup-video-container">
                        <div class="popup-video-close">
                            <svg class="icon"><use xlink:href="#close" /></svg>
                        </div>
                        <div class="embed-container">
                            <?php echo $video; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php }
}