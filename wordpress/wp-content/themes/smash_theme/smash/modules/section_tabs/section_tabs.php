<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_tabs_script', get_template_directory_uri() . '/smash/modules/section_tabs/section_tabs.js', array(), '1', true );
} );

function smash_section_tabs($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $tabs = (!empty($args['tabs'])) ? $args['tabs'] : null;

    if($tabs){ ?>
        <div class="tabs-wrapper">
            <?php if($title){ ?>
                <div class="tabs-header">
                    <h3 class="tabs-title"><?php echo $title; ?></h3>
                </div>
            <?php } ?>
            <div class="tabs-container">
                <div class="tabs-content">
                    <?php foreach($tabs as $key => $tab) { ?>
                        <?php if($tab['title'] || $tab['text']){ ?>
                            <div id="tab_<?php echo $key; ?>" class="tab-body <?php echo ($key == 0) ? 'active' : ''; ?>">
                                <?php if($tab['title']){ ?>
                                    <h2 class="tab-title"><?php echo $tab['title']; ?></h2>
                                <?php } ?>
                                <?php if($tab['text']){ ?>
                                    <div class="tab-text">
                                        <?php echo $tab['text']; ?>
                                    </div>
                                <?php } ?>
                                <?php if($tab['cta'] && $tab['link']){ ?>
                                    <a href="<?php echo $tab['link']; ?>" class="tab-cta"><?php echo $tab['cta']; ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="tabs-tabs">
                    <?php foreach($tabs as $key => $tab) { $label = (!empty($tab['label'])) ? $tab['label'] : $tab['title']; ?>
                        <?php if($label){ ?>
                            <div data-tab="tab_<?php echo $key; ?>" class="tab-label <?php echo ($key == 0) ? 'active' : ''; ?>">
                                <h4><?php echo $label; ?></h4>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
}