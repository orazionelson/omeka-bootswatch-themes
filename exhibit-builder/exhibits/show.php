<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
<?php $sidebar_pos=get_theme_option('sidebar_position');
$main_add="";
    $sidebar_add="";
    if ($sidebar_pos=='left'){
        $main_add="col-md-10 order-md-2 order-1";
        $sidebar_add="order-md-1 order-2";
        $style_sidebar="pr-0 pl-3";
        $style_main="pl-2";
    }
    if ($sidebar_pos=='right'){
        $main_add="col-md-10 order-2";
        $sidebar_add="order-3";
        $style_sidebar="pl-0 pr-3";
        $style_main="pr-2";
    }
    if ($sidebar_pos=='none'){
        $main_add="col-md-12";
        $sidebar_add="";
        $style_main="";
    } ?>
    <?php 
    $size = 12;
    if ($sidebar_pos=='right'||$sidebar_pos=='left') {
        $size = 10;
    }
    ?>
<div class="container-fluid m-5">
<div class = "row">
<?php if ($sidebar_pos=='left' || $sidebar_pos=='right'): ?>
                    <div class="col-md-2 <?php echo $sidebar_add;?> <?php echo $style_sidebar;?>">
<nav id="exhibit-pages">
    <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
    <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
</nav>
                    </div>
                <?php endif; ?>
                <div class="<?php echo $main_add;?> <?php echo $style_main;?>">
                    <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>


<div id="exhibit-blocks">
<?php exhibit_builder_render_exhibit_page(); ?>
</div>
<div id="exhibit-page-navigation">
    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
    <div id="exhibit-nav-prev">
    <?php echo $prevLink; ?>
    </div>
    <?php endif; ?>
    <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
    <div id="exhibit-nav-next">
    <?php echo $nextLink; ?>
    </div>
    <?php endif; ?>
    <div id="exhibit-nav-up">
    <?php echo exhibit_builder_page_trail(); ?>
    </div>
</div>
</div>
<?php if ($sidebar_pos!='left' && $sidebar_pos!='right'): ?>
<nav id="exhibit-pages">
    <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
    <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
</nav>
<?php endif; ?>
</div>
</div>
<?php echo foot(); ?>