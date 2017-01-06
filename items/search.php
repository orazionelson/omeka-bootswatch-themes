<?php
    $pageTitle = __('Search Items');
    echo head(array('title' => $pageTitle, 'bodyclass' => 'items advanced-search'));
?>

    <h1><?php echo $pageTitle; ?></h1>
    <?php echo public_nav_pills_bootstrap(); ?>
    <div class="clearfix"></div>
    <hr>

    <?php echo $this->partial('items/search-form.php', array('formAttributes' => array('id'=>'advanced-search-form', 'class'=>'form-horizontal'))); ?>

<?php echo foot(); ?>
