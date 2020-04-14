<div class="item record col-md-4">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    <h3><?php echo link_to($item, 'show', strip_formatting($title)); ?></h3>
    <div class="row">
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image('square_thumbnail', array('class' => 'img-thumbnail'), 0, $item), 
            array(), 'show', $item
        );
    }
    ?>
    <?php if ($description): ?>
        <p class="item-description col-md-6"><?php echo $description; ?></p>
    <?php endif; ?>
    </div>
</div>
