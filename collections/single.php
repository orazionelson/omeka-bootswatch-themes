
<?php
$title = metadata($collection, array('Dublin Core', 'Title'));
$description = metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 150));
?>
<!-- <div class="row">
    <div class="col-md-3">
        <div class="card-img-bottom">
            <?php if ($collectionImage = record_image($collection, 'square_thumbnail')): ?>
                <?php echo link_to($this->collection, 'show', $collectionImage, array('class' => 'img-thumbnail')); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card-body">
            <h3 class="card-title"><?php echo link_to($this->collection, 'show', strip_formatting($title)); ?></h3>
            <?php if ($description): ?>
                <p class="card-text"><?php echo $description; ?></p>
            <?php endif; ?>
        </div>
    </div>
</div> -->
<div class="card-img-top featured">
            <?php if ($collectionImage = record_image($collection, 'fullsize')): ?>
                <?php echo link_to($this->collection, 'show', $collectionImage, array('class' => 'fullsize')); ?>
            <?php endif; ?>      
        </div>
  <div class="card-body">
    <h3 class="card-title"><?php echo link_to($this->collection, 'show', strip_formatting($title)); ?></h3>
    <?php if ($description): ?>
                <p class="card-text"><?php echo $description; ?></p>
            <?php endif; ?>
  </div>

