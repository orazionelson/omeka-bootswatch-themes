<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

    <h1><?php echo 'Browse all items'; ?></h1>
    
    <nav class="items-nav navigation secondary-nav">
        <?php
        echo public_nav_pills_bootstrap(); 
        ?>
    </nav>
    
    <div class="clearfix"></div>
    <hr>    

    <div class="browse-items">
        <?php if ($total_results > 0): ?>
        <?php
            $sortLinks[__('Title')] = 'Dublin Core,Title';
            $sortLinks[__('Creator')] = 'Dublin Core,Creator';
            ?>
            <div class="browse-items-header d-none d-md-block container">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <?php echo browse_sort_links(array('Title'=>'Dublin Core,Title'), array(
                            'link_tag' => 'li',
                            'list_tag' => 'ul',
                            'link_attr' => array(),
                            'list_attr' => array( 'class' => 'sort-links-list' )
                        )); ?>
                    </div>
                    
                    <div class="col-md-6">
                        Description
                    </div>
                    <div class="col-md-2">
                        Tags
                    </div>
                </div>
            </div>
        
            <?php $rowCount = 1; foreach (loop('items') as $item): ?>
            <div class="item container <?php if ($rowCount % 2 != 0) echo 'bg-light';?>">
                <div class="row py-3">
                    <div class="col-sm-2 col-md-2">
                        <?php $image = $item->Files; ?>
                        <?php if ($image) {

                            echo link_to_item(item_image(),array('class' => 'img-fluid')); 
							//echo file_display_url($image[0]);
                                //echo link_to_item('<img alt="'.metadata('item', array('Dublin Core', 'Title')).'" title="'.metadata('item', array('Dublin Core', 'Title')).'" src="'.file_display_url($image[0]).'" class="img-thumbnail img-responsive">');
                                
                            } else {
                                //echo link_to_item(item_image()); 
								//echo link_to_item('<img alt="default" src="'.img('defaultImage@2x.jpg').'" class=" img-responsive">');
                                echo link_to_item('<img alt="default" src="'.img('../../../application/views/scripts/images/fallback-file.png').'" class=" img-responsive">');
                            }

                        ?>
                    </div>
                    <div class="col-sm-10 col-md-2">
                        <h4>
                        <?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?>
                    </h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <?php echo metadata('item', array('Dublin Core', 'Description'), array('snippet'=>150)); ?>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <?php if (metadata('item', 'has tags')): ?>
                        
                            <?php echo tag_string('items'); ?></p>
                        <?php endif; ?>
                    </div>
                
                    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
                </div>
            </div>
            <?php $rowCount++;endforeach; ?>
            <div id="outputs">
                <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
                <?php echo output_format_list(false); ?>
            </div>
        <?php else : ?>
            <p><?php echo 'No items added, yet.'; ?></p>
        <?php endif; ?>
    </div>
    <?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
<?php echo foot(); ?>
