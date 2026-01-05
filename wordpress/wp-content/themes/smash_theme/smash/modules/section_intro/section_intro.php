<?php
function smash_section_intro($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $ctas = (!empty($args['ctas'])) ? $args['ctas'] : null;

    if($title || $text || $ctas){ ?>
        <div class="intro-wrapper <?php echo $class; ?>">
            <div class="intro-container">
                <?php if($title){ ?>
                    <h2 class="intro-title"><?php echo $title; ?></h2>
                <?php } ?>
                <?php if($text){ ?>
                    <div class="intro-text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
                <?php if($ctas){ ?>
                    <div class="intro-ctas">
                        <?php foreach($ctas as $cta) { 
                            $label = (!empty($cta['label'])) ? $cta['label'] : null;
                            $link = (!empty($cta['link'])) ? $cta['link'] : '#';
                        ?>
                            <?php if($label){ ?>
                                <a href="<?php echo $link; ?>" class="intro-cta"><?php echo $label; ?></a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}