<?php
function smash_section_downloadables($args = null) {
    $items = (!empty($args['items'])) ? $args['items'] : null;

    if($items){ ?>
        <div class="downloadables-wrapper">
            <div class="downloadables-container">
                <?php foreach($items as $item) { $image = $item['image']; ?>
                    <?php if($image && $item['link']){ ?>
                        <div class="downloadable-item">
                            <div class="downloadable-image" data-bgratio="1" style="background: url(<?php echo $image['sizes']['medium']; ?>) no-repeat center/cover;"></div>
                            <div class="downloadable-body">
                                <?php if($item['title']){ ?>
                                    <h2 class="downloadable-title"><?php echo $item['title']; ?></h2>
                                <?php } ?>
                                <?php if($item['text']){ ?>
                                    <div class="downloadable-text">
                                        <?php echo $item['text']; ?>
                                    </div>
                                <?php } ?>
                                <a href="<?php echo $item['link']; ?>" download class="downloadable-cta">Download</a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php }
}