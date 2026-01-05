<?php
function smash_section_grid_links($args = null) {
    $links = (!empty($args['links'])) ? $args['links'] : null;

    if($links){ ?>
        <div class="grid-links-wrapper">
            <div class="grid-links-container">
                <?php foreach($links as $link) { ?>
                    <div class="grid-link">
                        <div class="grid-link-inner">
                            <?php if($link['icon'] || $link['text']){ ?>
                                <a href="<?php echo $link['link']; ?>" class="grid-link-item">
                                    <?php if($link['icon']){ ?>
                                        <?php echo $link['icon']; ?>
                                    <?php } ?>
                                    <?php if($link['text']){ ?>
                                        <h2 class="grid-link-text"><?php echo $link['text']; ?></h2>
                                    <?php } ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}