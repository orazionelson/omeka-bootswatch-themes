<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>
    <h1><?php echo $pageTitle; ?></h1>
    <nav class="items-nav navigation secondary-nav">
        <?php
        echo public_nav_pills_bootstrap(); 
        ?>
    </nav>
    <hr>

    <?php echo tag_cloud($tags, 'items/browse'); ?>

<?php echo foot(); ?>
