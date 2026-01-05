<?php

function smash_section_featured_video($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $video = (!empty($args['video'])) ? $args['video'] : null;
    $video_url = (!empty($args['video_url'])) ? $args['video_url'] : null;

    if($image && $video){ ?>
        <div class="featured-video <?php echo $class; ?>">
            <div class="featured-video-container">
                <?php if($title){ ?>
                    <h2 class="featured-video-title"><?php echo $title; ?></h2>
                <?php } ?>
                <?php if($text){ ?>
                    <div class="featured-video-text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
                <?php smash_block_video(['image' => $image, 'video' => $video, 'video_url' => $video_url]); ?>
            </div>
        </div>
    <?php }
}