<?php
if (!empty($formActionUri)):
    $formAttributes['action'] = $formActionUri;
else:
    $formAttributes['action'] = url(array('controller'=>'items', 'action'=>'browse'));
endif;
$formAttributes['method'] = 'GET';


//var_dump($formAttributes);
?>

<form <?php echo tag_attributes($formAttributes); ?>>
    <div id="search-keywords" class="form-group">
        <?php echo $this->formLabel('keyword-search', __('Search for Keywords'), array('class'=>'col-md-2')); ?>
        <div class="col-md-10">
        <?php
            echo $this->formText(
                'search',
                @$_REQUEST['search'],
                array('id' => 'keyword-search', 'size' => '40', 'class'=>'form-control')
            );
        ?>
        </div>
    </div>
    <hr>
    <div id="search-narrow-by-fields" class="form-group">
        <label class="col-md-3"><?php echo __('Narrow by Specific Fields'); ?></label>
        <div class="col-md-9">
        <button type="button" class="btn btn-primary add_search"><?php echo __('Add a Field'); ?></button>
        </div>
    </div>
    <div>
        <?php
        // If the form has been submitted, retain the number of search
        // fields used and rebuild the form
        if (!empty($_GET['advanced'])) {
            $search = $_GET['advanced'];
        } else {
            $search = array(array('field'=>'','type'=>'','value'=>''));
        }

        //Here is where we actually build the search form
        foreach ($search as $i => $rows): ?>
            <div class="row form-group search-entry">
                <div class="col-md-3">					
                <?php
                //The POST looks like =>
                // advanced[0] =>
                //[field] = 'description'
                //[type] = 'contains'
                //[terms] = 'foobar'
                //etc
                echo $this->formSelect(
                    "advanced[$i][element_id]",
                    @$rows['element_id'],
                    array(
                        'title' => __("Search Field"),
                        'id' => "advanced[$i][element_id]",
                        'class' => 'form-control advanced-search-element'
                    ),
                    get_table_options('Element', null, array(
                        'record_types' => array('Item', 'All'),
                        'sort' => 'orderBySet')
                    )
                );
                ?>
                </div>
                <div class="col-md-3">
                <?php                
                echo $this->formSelect(
                    "advanced[$i][type]",
                    @$rows['type'],
                    array(
                        'title' => __("Search Type"),
                        'id' => "advanced[$i][type]",
                        'class' => 'form-control advanced-search-type'
                    ),
                    label_table_options(array(
                        'contains' => __('contains'),
                        'does not contain' => __('does not contain'),
                        'is exactly' => __('is exactly'),
                        'is empty' => __('is empty'),
                        'is not empty' => __('is not empty'))
                    )
                );
                ?>
                </div>
                <div class="col-md-3">
                <?php
                echo $this->formText(
                    "advanced[$i][terms]",
                    @$rows['terms'],
                    array(
                        'size' => '20',
                        'title' => __("Search Terms"),
                        'id' => "advanced[$i][terms]",
                        'class' => 'form-control advanced-search-terms'
                    )
                );
                ?>
                </div>
                <div class="col-md-3">
					<button type="button" class="btn btn-danger remove_search" disabled="disabled" style="display: none;"><?php echo __('Remove field'); ?></button>
				</div>
            </div>
        <?php endforeach; ?>
	</div>
    

    <div id="search-by-range" class="form-group">
        <?php echo $this->formLabel('range', __('Search by a range of ID#s (example: 1-4, 156, 79)'),array('class'=>'col-md-4')); ?>
        <div class="col-md-8">
        <?php
            echo $this->formText('range', @$_GET['range'],
                array('size' => '40', 'class'=>'form-control')
            );
        ?>
        </div>
    </div>

    <div id="search-selects" class="form-group">
            <?php echo $this->formLabel('collection-search', __('Search By Collection'),array('class'=>'col-md-4')); ?>
            <div class="col-md-8">
            <?php
                echo $this->formSelect(
                    'collection',
                    @$_REQUEST['collection'],
                    array('id' => 'collection-search', 'class'=>'form-control'),
                    get_table_options('Collection')
                );
            ?>
            </div>
    </div>
	<div class="form-group">
            <?php echo $this->formLabel('item-type-search', __('Search By Type'),array('class'=>'col-md-4')); ?>
       <div class="col-md-8">
            <?php
                echo $this->formSelect(
                    'type',
                    @$_REQUEST['type'],
                    array('id' => 'item-type-search', 'class'=>'form-control'),
                    get_table_options('ItemType')
                );
            ?>
            </div>
        </div>

        <?php if(is_allowed('Users', 'browse')): ?>
        <div class="form-group">
            <?php echo $this->formLabel('user-search', __('Search By User'),array('class'=>'col-md-4'));?>
            <div class="col-md-8">
            <?php
                echo $this->formSelect(
                    'user',
                    @$_REQUEST['user'],
                    array('id' => 'user-search', 'class'=>'form-control'),
                    get_table_options('User')
                );
            ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="form-group">
            <?php echo $this->formLabel('tag-search', __('Search By Tags'),array('class'=>'col-md-4')); ?>
            <div class="col-md-8">
            <?php
                echo $this->formText('tags', @$_REQUEST['tags'],
                    array('size' => '40', 'id' => 'tag-search', 'class'=>'form-control')
                );
            ?>
            </div>
        </div>

    <?php if (is_allowed('Items','showNotPublic')): ?>
    <div class="form-group">
        <?php echo $this->formLabel('public', __('Public/Non-Public'),array('class'=>'col-md-4')); ?>
        <div class="col-md-8">
        <?php
            echo $this->formSelect(
                'public',
                @$_REQUEST['public'],
                array('class' => 'form-control advanced-search-element'),
                label_table_options(array(
                    '1' => __('Only Public Items'),
                    '0' => __('Only Non-Public Items')
                ))
            );
        ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="form-group">
        <?php echo $this->formLabel('featured', __('Featured/Non-Featured'),array('class'=>'col-md-4')); ?>
        <div class="col-md-8">
        <?php
            echo $this->formSelect(
                'featured',
                @$_REQUEST['featured'],
                array('class' => 'form-control advanced-search-element'),
                label_table_options(array(
                    '1' => __('Only Featured Items'),
                    '0' => __('Only Non-Featured Items')
                ))
            );
        ?>
        </div>
    </div>
    <div class="form-group">
	    <?php 
	    echo $this->formLabel('exhibit', __('Search by Exhibit'),array('class'=>'col-md-4'));?>
		<div class="col-md-8">
	    <?php
	    echo $this->formSelect(
			'exhibit', 
			@$_GET['exhibit'], 
			array('class' => 'form-control advanced-search-element'), 
			get_table_options('Exhibit'));
	    //fire_plugin_hook('admin_items_search', array('view' => $this)); 
	    ?>
	    </div>
    </div>
    <?php if (!isset($buttonText)) $buttonText = __('Search for items'); ?>
    <input type="submit" class="btn btn-success" name="submit_search" id="submit_search_advanced" value="<?php echo $buttonText; ?>">
</form>

<?php echo js_tag('items-search'); ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.Search.activateSearchButtons();
    });
</script>
