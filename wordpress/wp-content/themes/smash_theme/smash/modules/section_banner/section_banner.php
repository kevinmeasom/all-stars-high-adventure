<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_banner_scripts', get_template_directory_uri() . '/smash/modules/section_banner/section_banner.js', array(), '1', true );
} );

function smash_section_banner($args = null) {
    $parallax = (!empty($args['parallax'])) ? $args['parallax'] : false;
    $banner = (!empty($args['banner'])) ? $args['banner'] : null;
    $align = (!empty($args['align'])) ? $args['align'] : null;
    $justify = (!empty($args['justify'])) ? $args['justify'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;

    switch ($align) {
        case 'top':
            $a = 'align-start';
            break;
        case 'bottom':
            $a = 'align-end';
            break;
        
        default:
            $a = 'align-center';
            break;
    }
    switch ($justify) {
        case 'left':
            $j = 'justify-start';
            break;
        case 'right':
            $j = 'justify-end';
            break;
        
        default:
            $j = 'justify-center';
            break;
    }

    if($banner){ ?>
        <?php if($parallax){ ?>
            <div id="banner_cta" class="banner-parallax" style="background: url(<?php echo $banner['url']; ?>) no-repeat center/cover;"></div>
        <?php } ?>
        <section class="parallax-banner-cta <?php echo ($parallax) ? 'use-parallax' : ''; ?> flex <?php echo $a . ' ' . $j; ?>" 
            data-bgratio="0.42"
            <?php echo ($parallax) ? 'data-parallax-bg="banner_cta"' : ''; ?>
            <?php echo ($parallax) ? '' : 'style="background: url('.$banner['url'].') no-repeat center/cover;"'; ?>>
            <div id="banner_waypoint_top"></div>
            <div class="banner-body">
                <?php if($title){ ?>
                    <h2 class="banner-title"><?php echo $title; ?></h2>
                <?php } ?>
                <?php if($text){ ?>
                    <div class="banner-text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
                
                <?php if($cta && $link){ ?>
                    <a href="<?php echo $link; ?>" class="btn btn-secondary"><?php echo $cta; ?></a>
                <?php } ?>
            </div>
        </section>
    <?php }
}