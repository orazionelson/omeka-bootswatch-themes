<?php
$title = __('Browse Exhibits by Tag');
echo head(array('title' => $title, 'bodyclass' => 'exhibits tags'));
?>
<h1><?php echo $title; ?></h1>

<nav class="items-nav navigation secondary-nav">
        <?php
        echo public_nav_pills_bootstrap_exhibit(); 
        ?>
    </nav>

<?php echo tag_cloud($tags, 'exhibits/browse'); ?>

<?php echo foot(); ?>