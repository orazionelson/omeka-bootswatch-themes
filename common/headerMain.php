<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
		$bootswatch_theme=get_theme_option('Style Sheet');
        queue_css_file($bootswatch_theme.'/bootstrap.min');
        queue_css_file('style');
        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('globals');
        echo head_js();
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
      <!-- <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <?php echo bs_link_logo_to_navbar(); ?>
          </div>
          <div class="navbar-collapse collapse" id="navbar-main">
            <?php echo public_nav_main_bootstrap(); ?>
            <?php echo search_form(array('show_advanced' => false, 'form_attributes'=>array('id'=>'navbar-search', 'class'=>'navbar-form navbar-right'))); ?>
          </div>
        </div>
      </nav> -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php echo option('site_title') ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo html_escape(url('items')); ?>">Items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo html_escape(url('collections')); ?>">Collections</a>
            </li>

          </ul>
        </div>
      </nav>