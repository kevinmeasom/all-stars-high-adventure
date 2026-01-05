<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_reviews_script', get_template_directory_uri() . '/smash/modules/slider_reviews/slider_reviews.js', array(), '1', true );
} );

function smash_slider_reviews($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $reviews = (!empty($args['reviews'])) ? $args['reviews'] : null;

    if($reviews){ ?>
        <div class="reviews-slider-wrapper <?php echo $class; ?>" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;">
            <div class="reviews-slider-container">
                <div class="reviews-slider">
                    <?php foreach($reviews as $review) { ?>
                        <div class="review">
                            <div class="review-inner">
                                <?php if($review['image']){ $image = $review['image']; ?>
                                    <div class="review-image" data-bgratio="1" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                                <?php } ?>
                                <div class="review-body">
                                    <?php if($review['text']){ ?>
                                        <div class="review-text">
                                            <?php echo $review['text']; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if($review['name']){ ?>
                                        <div class="review-title">
                                            <?php echo $review['name']; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
}