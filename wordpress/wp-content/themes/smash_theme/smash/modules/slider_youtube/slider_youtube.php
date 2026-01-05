<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_youtube_script', get_template_directory_uri() . '/smash/modules/slider_youtube/slider_youtube.js', array(), '1', true );
} );

function smash_slider_youtube($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $videos = (!empty($args['videos'])) ? $args['videos'] : null;
    $videos_raw = (!empty($args['videos_raw'])) ? $args['videos_raw'] : null;
    $video_urls = [];
    
    foreach ($videos_raw as $key => $arr) {
        foreach ($arr as $ind => $val) {
            if(parse_video_uri( $val )){
                $video_urls[] = $val;
            }
        }
    }

    if ( $videos ) { ?>
        <div class="videos-section-wrapper <?php echo $class; ?>">
            <div class="videos-container">
                <?php if($title || $cta){ ?>
                    <div class="videos-header-wrapper">
                        <div class="videos-header">
                            <?php if($title){ ?>
                                <h2 class="videos-title"><?php echo $title; ?></h2>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="videos-inner">
                    <div class="videos-slider">
                        <?php foreach($videos as $key=>$video) { ?>
                            <?php smash_block_video(['image' => $video['image'], 'video' => $video['video'], 'video_url' => $video_urls[$key]]); ?>
                        <?php } ?>
                    </div>
                </div>
                <?php if($cta){ ?>
                    <div class="videos-cta-wrapper">
                        <a href="<?php echo $link; ?>" class="videos-cta"><?php echo $cta; ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}