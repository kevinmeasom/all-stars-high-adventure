<?php

function smash_section_q_and_a($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $subtitle = (!empty($args['subtitle'])) ? $args['subtitle'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $items = (!empty($args['items'])) ? $args['items'] : null;

    if($items){  ?>
        <section class="qa <?php echo $class; ?>">
            <div class="qa-container">
                <div class="qa-title-box">
                    <?php if($subtitle){ ?>
                        <div class="qa-subtitle">
                            <h5><?php echo $subtitle ?></h5>
                        </div>
                    <?php } ?>
                    <?php if($title){ ?>
                        <div class="qa-title">
                            <h2><?php echo $title ?></h2>
                        </div>
                    <?php } ?>
                </div>
                
                <div class="qa-list">
                    <?php foreach($items as $key=>$item) { 
                        $question = (!empty($item['question'])) ? $item['question'] : null;
                        $answer = (!empty($item['answer'])) ? $item['answer'] : null;
                    ?>
                    <div class="list-item">
                            <h6><?php echo$key+1 . ". " . $question ?></h6>
                            <h5><?php echo $answer ?></h5>
                        </div>  
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}