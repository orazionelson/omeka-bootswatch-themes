<?php
$title = __('Browse all exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
<?php if (count($exhibits) > 0): ?>

<nav class="items-nav navigation secondary-nav">
        <?php
        echo public_nav_pills_bootstrap_exhibit(); 
        ?>
    </nav>
<div class="clearfix"></div>
    <hr>

<?php echo pagination_links(); ?>

<div class="browse-exhibits">
    <?php
            $sortLinks[__('Title')] = 'Dublin Core,Title';
            $sortLinks[__('Creator')] = 'Dublin Core,Creator';
            ?>
    <div class="browse-items-header hidden-xs container">
                <div class="row">
                    <div class="col-sm-3 col-md-3">
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <?php echo browse_sort_links(array('Title'=>'Dublin Core,Title'), array(
                            'link_tag' => 'li',
                            'list_tag' => 'ul',
                            'link_attr' => array(),
                            'list_attr' => array( 'class' => 'sort-links-list' )
                        )); ?>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        Description
                    </div>
                    <div class="col-sm-3 col-md-3">
                        Tags
                    </div>
                </div>
            </div>
    <div class="exhibit container">
<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="row exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
        <div class="col-sm-3 col-md-3">
        <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail',array('class' => 'img-responsive img-thumbnail'))): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); 
            else:
                $exhibitImage = link_to_item('<img alt="default" src="'.img('defaultImage@2x.jpg').'" class="img-thumbnail img-responsive">');
                // $exhibitImage = '<img alt="default" src="/omeka-2.7/themes/omeka-bootswatch-themes/images/defaultImage@2x.jpg" class="img-thumbnail img-responsive">';
                echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage); 
                ?>
        <?php endif; ?>
    </div>
        <div class="col-sm-2 col-md-2">
        <h4><?php echo link_to_exhibit(); ?></h4>
    </div>
    
    <div class="col-sm-4 col-md-4">
        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
        <div class="description"><?php echo $exhibitDescription; ?></div>
        <?php endif; ?>
    </div>
    <div class="col-sm-3 col-md-3">
        <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
        <p class="tags"><?php echo $exhibitTags; ?></p>
        <?php endif; ?>
    </div>
    </div>
<?php endforeach; ?>
</div>
</div>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>