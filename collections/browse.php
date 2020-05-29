<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

    <h1><?php echo 'Browse all collections'; ?></h1>
    <hr>
    
    <div class="browse-collections">
        <?php if ($total_results > 0): ?>
            <div class="browse-collections-header d-none d-md-block">
                <div class="row px-3">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-2 col-sm-offset-2">
                        <?php echo browse_sort_links(array('Title'=>'Dublin Core,Title'), array('')); ?>
                    </div>
                    <div class="col-sm-5">
                        Description
                    </div>

                </div>
            </div>
        
            <?php $rowCount = 1; foreach (loop('collections') as $collection): ?>
                <div class="collectionp-1 <?php if ($rowCount % 2 != 0) echo 'bg-light';?>">
                    <div class="row p-3">
                        <div class="col-sm-2 pr-2">
                            <?php if ($collectionImage = record_image('collection', 'square_thumbnail',array('class' => 'img-responsive img-thumbnail'))): ?>
                                <?php echo link_to_collection($collectionImage, array('class' => 'img')); ?>
                            <?php else:
                                $collectionImage = '<img alt="default" src="'.img('../../../application/views/scripts/images/fallback-file.png').'" class="img-thumbnail img-responsive">';?>
                                <?php echo link_to_collection($collectionImage, array('class' => 'img')); ?>

                            <?php endif; ?>
                        </div>
                        <div class="col-sm-2">
                            <h4>
                            <?php echo link_to_collection(); ?>
                        </h4>
                        </div>
                        
                        <div class="col-sm-12 col-md-5">
                            <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
                                <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet'=>150))); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo link_to_items_browse(__('View the items in %s', metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata('collection', 'id'))); ?>
                        </div>
                    
                        <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
                    </div>
                </div>
            <?php $rowCount++;endforeach; ?>
        <?php else : ?>
            <p><?php echo 'No collections added, yet.'; ?></p>
        <?php endif; ?>
    </div>
    <?php echo pagination_links(); ?>        

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
