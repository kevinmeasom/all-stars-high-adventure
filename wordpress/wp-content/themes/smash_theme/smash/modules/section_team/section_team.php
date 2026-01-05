<?php
function smash_section_team($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : 'team_section';
    $id = (!empty($args['id'])) ? $args['id'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $members = (!empty($args['members'])) ? $args['members'] : null;

    if($members){ ?>
        <div id="<?php echo $id; ?>" class="team-wrapper <?php echo $class;  ?>">
            <div class="team-container">
                <?php if($title){ ?>
                    <h2 class="team-title"><?php echo $title; ?></h2>
                <?php } ?>
                <?php if($text){ ?>
                    <div class="team-text">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
                <div class="team-members">
                    <?php foreach($members as $member) { 
                        $image = (!empty($member['image'])) ? $member['image'] : null;
                        $name = (!empty($member['name'])) ? $member['name'] : null;
                        $role = (!empty($member['role'])) ? $member['role'] : null;
                    ?>
                        <?php if($image){ ?>
                            <div class="team-member">
                                <div class="team-member-image" data-bgratio="1" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                                <?php if($name){ ?>
                                    <h6 class="team-member-name"><?php echo $name; ?></h6>
                                <?php } ?>
                                <?php if($role){ ?>
                                    <div class="team-member-role"><?php echo $role; ?></div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
}