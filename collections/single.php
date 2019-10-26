
    <?php
        $title = metadata($collection, array('Dublin Core', 'Title'));
        $description = metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    
    <div class="card-img-top">
    <?php if ($collectionImage = record_image($collection, 'square_thumbnail')): ?>
        <?php echo link_to($this->collection, 'show', $collectionImage, array('class' => 'img-thumbnail')); ?>
    <?php endif; ?>
</div>
    <div class="card-body">
        <h3 class="card-title"><?php echo link_to($this->collection, 'show', strip_formatting($title)); ?></h3>
    <?php if ($description): ?>
        <p class="card-text"><?php echo $description; ?></p>
    <?php endif; ?>
</div>

