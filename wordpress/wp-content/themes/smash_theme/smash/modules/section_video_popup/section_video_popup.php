<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_video_popup_script', get_template_directory_uri() . '/smash/modules/section_video_popup/section_video_popup.js', array(), '1', true );
} );

function smash_section_video_popup($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $id = (!empty($args['id'])) ? $args['id'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : 'watch';
    $video = (!empty($args['video'])) ? $args['video'] : null;

    if($id && $video){ ?>
        <div class="video-popup-pre <?php echo $class; ?>">
            <div class="video-popup-pre-container">
                <?php if($title){ ?>
                    <h2 class="video-popup-pre-title"><?php echo $title; ?></h2>
                <?php } ?>
                <?php if($text){ ?>
                    <div class="video-popup-pre-text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
                <a href="#" class="video-popup-pre-cta popup-video-open" data-vid="<?php echo $id; ?>"><?php echo $cta; ?></a>
            </div>
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