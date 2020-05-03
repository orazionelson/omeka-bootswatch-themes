<?php 
echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<?php
$itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title')));
?>
<div class="page-header">
    <?php if (strlen($itemTitle) < 40): ?>
        <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
        <?php else: ?>
            <h3><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h3>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?php $images = $item->Files; $imagesCount = 1; ?>
            <?php if ($images): ?>
                <div class="clearfix row" id="image-gallery gallery" data-toggle="modal" data-target="#exampleModal">
                    <!-- <ul id="image-gallery" class="clearfix"> -->
                    <?php foreach ($images as $image): ?>
                        <div class="col-12">
                            <?php if ($imagesCount === 1): ?>
                                <!--  <img class="card-img-top" src="<?php //echo url('/'); ?>files/original/<?php //echo $image->filename; ?>" /> -->
                                <?php echo file_markup($image,array('imageSize' => 'fullsize','linkToFile' => false,'imgAttributes' => array('data-toggle'=>'#carouselExample', 'data-slide-to'=> strval($imagesCount-1) ))); ?>
                            <?php else: ?>
                                <?php echo file_markup($image,array('imageSize' => 'fullsize','linkToFile' => false,'imgAttributes' => array('class' => 'd-none','data-toggle'=>'#carouselExample', 'data-slide-to'=> strval($imagesCount-1) ))); ?>
                            <?php endif; ?>
                        </div>
                    <?php $imagesCount++; endforeach; ?>
                            <!-- </ul> -->
                </div>
            <?php else: ?>
                <div class="no-image">No photos available.</div>
            <?php endif; ?>
        </div>
        <!--  -->
        <?php $images = $item->Files; $temp = 1?>
        <?php if ($images): ?>  
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">

                  <!-- Carousel markup: https://getbootstrap.com/docs/4.4/components/carousel/ -->
              <div id="carouselExample" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <?php
                    for ($x = 0; $x < $imagesCount-1; $x++) {
                        if ($x === 0): 
                            echo '<li data-target="#carouselExample" data-slide-to='.strval($x)  .' class="active"></li>';
                        else:
                            echo '<li data-target="#carouselExample" data-slide-to='.strval($x). '></li>';
                        endif;
                    }
                    ?>
            <!-- <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1"></li>
            <li data-target="#carouselExample" data-slide-to="2"></li>
            <li data-target="#carouselExample" data-slide-to="3"></li> -->
        </ol>

        <div class="carousel-inner">
           <?php foreach ($images as $image): ?>
            <?php //if ($imagesCount === 1): ?>
            <?php if ($temp === 1): ?>
                <div class="carousel-item active ">
                    <?php else: ?>
                        <div class="carousel-item">
                        <?php endif; ?>
                        <!--  <img class="card-img-top" src="<?php //echo url('/'); ?>files/original/<?php //echo $image->filename; ?>" /> -->
                        <?php echo file_markup($image, array('imageSize' => 'fullsize','imgAttributes' => array('class' => ' d-block' ))); ?>
                        <?php $temp++; ?>
                        <?php //endif; ?>
                    </div>
                    
                    <?php $imagesCount++; endforeach; ?>
                </div>

                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
<?php endif; ?>

<!-- ---- -->
</div>
<?php echo all_element_texts('item'); ?>

<!-- The following returns all of the files associated with an item. -->
<?php if (metadata('item', 'has files')): ?>
    <div id="itemfiles" class="row element">
        <div class="col-sm-3 text-md-right"><h3><?php echo __('Files'); ?></h3></div>
        <!-- <div class="sol-sm-9 element-text"><?php //echo files_for_item(); ?></div> -->
        <div class="row">
            <?php $images = $item->Files; $imagesCount = 1; ?>
            <?php if ($images): ?>
                <!-- <div class="col-md-4" > -->
                    <!-- <ul id="image-gallery" class="clearfix"> -->
                    <?php foreach ($images as $image): ?>
                        <div class="col-md-4" >
                            <?php echo file_markup($image,array('linkToFile' => false)); ?>
                        </div>
                    <?php $imagesCount++; endforeach; ?>
                    <!-- </ul> -->
                <!-- </div> -->
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
    <div id="collection" class="row element">
        <div class="col-sm-3 text-md-right text-sm-right"><h4><?php echo __('Collection'); ?></h4></div>
        <div class="col-sm-9 element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
    </div>
<?php endif; ?>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item', 'has tags')): ?>
    <div id="item-tags" class="row element">
        <div class="col-sm-3 text-md-right text-sm-right"><h4><?php echo __('Tags'); ?></h4></div>
        <div class="col-sm-9 element-text"><?php echo tag_string('item'); ?></div>
    </div>
<?php endif;?>

<!-- The following prints a citation for this item. -->
<div id="item-citation" class="row element">
    <div class="col-sm-3 text-md-right text-sm-right"><h4><?php echo __('Citation'); ?></h4></div>
    <div class="col-sm-9 element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
</div>

<div id="item-output-formats" class="row element">
    <div class="col-sm-3 text-md-right text-sm-right"><h4><?php echo __('Output Formats'); ?></h4></div>
    <div class="col-sm-9 element-text"><?php echo output_format_list(); ?></div>
</div>
</div>
</div>

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
<ul class="pager">
    <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>

<?php echo foot(); ?>
