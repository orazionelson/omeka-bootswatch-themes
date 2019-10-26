
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    <div class="card-img-top">
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image('square_thumbnail', array('class' => 'img-thumbnail'), 0, $item), 
            array(), 'show', $item
        );
    }
    ?>
    </div>
    <div class="card-body">
        <h3 class="card-title"><?php echo link_to($item, 'show', strip_formatting($title)); ?></h3>
        <?php if ($description): ?>
            <p class="card-text"><?php echo $description; ?></p>
        <?php endif; ?>
    </div>

