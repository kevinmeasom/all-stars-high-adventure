<?php 

function smash_section_subscribe_bar($args = null){
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $form = (!empty($args['form'])) ? $args['form'] : null;

    if($form){ ?>
        <section id="subscribe_bar" class="flex align-center justify-center <?php echo $class; ?>">
            <?php if($title){ ?>
                <h3 class="subscribe-bar-title"><?php echo $title; ?></h3>
            <?php } ?>
            <?php if($text){ ?>
                <div class="subscribe-bar-text">
                    <?php echo $text; ?>
                </div>
            <?php } ?>
            <div class="subscribe-bar-body"><?php echo $form; ?></div>
        </section>
    <?php }
}