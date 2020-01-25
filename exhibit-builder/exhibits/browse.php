<?php
$title = __('Browse all exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
<?php if (count($exhibits) > 0): ?>

<nav class="items-nav navigation secondary-nav">
    <?php echo nav(array(
        array(
            'label' => __('Browse All'),
            'uri' => url('exhibits')
        ),
        array(
            'label' => __('Browse by Tag'),
            'uri' => url('exhibits/tags')
        )
    )); ?>
</nav>
<div class="clearfix"></div>
    <hr>

<?php echo pagination_links(); ?>

<div class="browse-exhibits">
    <div class="browse-items-header hidden-xs">
                <div class="row">
                    <div class="col-sm-3 col-md-3">
                    </div>
                    <div class="col-sm-2 col-md-2">
                        Title
                    </div>
                    <div class="col-sm-4 col-md-4">
                        Description
                    </div>
                    <div class="col-sm-3 col-md-3">
                        Tags
                    </div>
                </div>
            </div>
    <div class="exhibit">
<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="row exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
        <div class="col-sm-3 col-md-3">
        <?php if ($exhibitImage = record_image($exhibit)): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
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