<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'block_video_script', get_template_directory_uri() . '/smash/modules/block_video/block_video.js', array(), '1', true );
} );

function smash_block_video($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $video = (!empty($args['video'])) ? $args['video'] : null;
    $video_url = (!empty($args['video_url'])) ? $args['video_url'] : null;
    $vid = parse_video_uri( $video_url );

    if($image && $video){ ?>
        <section class="video-block <?php echo $class; ?>">
            <div class="video-block-container">
                <div class="video-block-wrap">
                    <div class="video-block-image" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;">
                        <div class="video-block-image-inner">
                            <svg class="icon" data-vid="<?php echo $vid['id']; ?>"><use xlink:href="#play" /></svg>
                        </div>
                    </div>
                    <div class="embed-container">
                        <?php echo $video; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php }
}