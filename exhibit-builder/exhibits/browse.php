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
    <div class="row exhibit <?php if ($exhibitCount%2==1) echo ' even bg-light'; else echo ' odd'; ?>">
        <div class="order-md-1 order-2 col-md-3 px-2 px-md-2" style="width:130px">
        <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail',array('class' => 'img-responsive img-thumbnail'))): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); 
            else:
                $exhibitImage = '<img alt="default" src="'.img('../../../application/views/scripts/images/fallback-file.png').'" class="img-thumbnail img-responsive">';
                echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage); 
                ?>
        <?php endif; ?>
    </div>
        <div class="col-12 order-md-2 order-1 col-md-2  px-md-2">
        <h4><?php echo link_to_exhibit(); ?></h4>
    </div>
    
    <div class="col-6 col-md-4 order-md-3 order-3 px-0 px-md-2">
        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('snippet'=>150))): ?>
        <?php echo $exhibitDescription; ?>
        <?php endif; ?>
    </div>
    <div class="col-10 col-md-3 order-md-4 order-4  px-md-3">
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