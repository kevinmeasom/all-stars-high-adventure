<?php
function smash_section_locations($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $locations = (!empty($args['locations'])) ? $args['locations'] : null;

    if($locations){ ?>
        <div class="locations <?php echo $class; ?>">
            <div class="locations-container">
                <?php foreach($locations as $l) { ?>
                    <div class="location">
                        <svg class="icon"><use xlink:href="#map-marker" /></svg>
                        <div class="location-text">
                            <?php echo $l['location']; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}