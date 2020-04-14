<div class="item record row">

    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    <div class="col-md-5">
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image('square_thumbnail', array('class' => 'img-thumbnail'), 0, $item), 
            array(), 'show', $item
        );
    }
    ?>
</div>

<div class="col-md-7 pl-0">
    <h6><?php echo link_to($item, 'show', strip_formatting($title)); ?></h6>
<?php if ($description&&strlen($description) > 30) {

    // truncate string
    $stringCut = substr($description, 0, 30);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $description = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $description .= '...';
}?>
        
    <?php if ($description): ?>
        <p class="item-description col-md-6 px-0"><?php echo $description; ?></p>
    <?php endif; ?>
</div>
    
</div>
