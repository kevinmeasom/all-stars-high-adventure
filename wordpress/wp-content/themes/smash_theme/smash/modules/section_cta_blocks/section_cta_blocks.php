<?php

function smash_section_cta_blocks($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $blocks = (!empty($args['blocks'])) ? $args['blocks'] : null;

    if($blocks){ ?>
        <div class="cta-blocks <?php echo $class; ?>">
            <div class="cta-blocks-container">
                <?php foreach($blocks as $block) { 
                    $image = (!empty($block['image'])) ? $block['image'] : null;
                    $title = (!empty($block['title'])) ? $block['title'] : null;
                    $text = (!empty($block['text'])) ? $block['text'] : null;
                    $cta = (!empty($block['cta'])) ? $block['cta'] : null;
                    $link = (!empty($block['link'])) ? $block['link'] : '#';
                ?>
                    <?php if($image || $title || $text || $cta){ ?>
                        <div class="cta-block">
                            <div class="cta-block-inner" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                                <?php if($title || $text || $cta){ ?>
                                    <div class="cta-block-body">
                                        <?php if($title){ ?>
                                            <h2 class="cta-block-title"><?php echo $title; ?></h2>
                                        <?php } ?>
                                        <?php if($text){ ?>
                                            <div class="cta-block-text">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php } ?>
                                        <?php if($cta){ ?>
                                            <a href="<?php echo $link; ?>" class="cta-block-cta"><?php echo $cta; ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php }
}