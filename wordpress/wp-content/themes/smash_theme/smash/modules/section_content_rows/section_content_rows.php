<?php

function smash_section_content_rows($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $rows = (!empty($args['rows'])) ? $args['rows'] : null;

    if($rows){ ?>
        <div class="content-rows <?php echo $class; ?>">
            <?php foreach($rows as $row) { 
                $image = (!empty($row['image'])) ? $row['image'] : null;
                $title = (!empty($row['title'])) ? $row['title'] : null;
                $text = (!empty($row['text'])) ? $row['text'] : null;
                $cta = (!empty($row['cta'])) ? $row['cta'] : null;
                $link = (!empty($row['link'])) ? $row['link'] : '#';
            ?>
                <?php if($image || ($title || $text)){ ?>
                    <div class="content-row <?php echo ($image) ? '' : 'no-image'; ?>">
                        <?php if($image){ ?>
                            <div class="content-row-image" data-bgratio="0.9" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                        <?php } ?>
                        <div class="content-row-body">
                            <?php if($title){ ?>
                                <h3 class="content-row-title"><?php echo $title; ?></h3>
                            <?php } ?>
                            <?php if($text){ ?>
                                <div class="content-row-text">
                                    <?php echo $text; ?>
                                </div>
                            <?php } ?>
                            <?php if($cta){ ?>
                                <a href="<?php echo $link; ?>" class="content-row-cta"><?php echo $cta; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    <?php }
}