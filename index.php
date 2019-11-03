<?php $file = 'header' ?>

<?php
$layout=get_theme_option('landing_page_layout');
if ($layout == 'entirescreen') {
	$main_file ='common/loremize-main.phtml';
	$file = 'headerMain';
}
elseif ($layout == 'half') {
	$main_file ='common/testermain.phtml';
	$file = 'headerMain';
}
elseif ($layout == 'right') {
	$main_file ='common/rightmain.phtml';
	$file = 'headerMain';
}
elseif ($layout == 'half-page') {
	$main_file ='common/half-pagemain.phtml';
	$file = 'headerMain';
}
elseif ($layout == 'cover') {
	$main_file ='common/covermain.phtml';
	$file = 'headerMain';
}
else
	$main_file ='common/testermain.phtml';
?>
<?php
echo head(array('bodyid'=>'home'), $file);
$sidebar_pos=get_theme_option('sidebar_position');
$main_add="";
$sidebar_add="";
if ($sidebar_pos=='left'){
	$main_add=" col-md-push-4";
	$sidebar_add=" col-md-pull-8";
}
if ($sidebar_pos=='right'){
	$main_add=" col-md-pull-4";
	$sidebar_add=" col-md-push-8";
}
if ($sidebar_pos=='none'){
	$main_add="";
	$sidebar_add="";
}
?>
<?php 
$size = 12;
if ($sidebar_pos=='right'||$sidebar_pos=='left') {
	$size = 10;
}
?>
<?php
$recentItems = get_theme_option('Homepage Recent Items');
if ($recentItems === null || $recentItems === ''):
	$recentItems = 3;
else:
	$recentItems = (int) $recentItems;
endif;
?>

<div class="row">
	<?php if ($sidebar_pos=='left'): ?>
		<div class="col-md-2<?php echo $sidebar_add;?>">
			<?php if (get_theme_option('display_sidebar_menu') !== '0'): ?>
				<?php echo public_nav_sidebar_bootstrap(); ?>
			<?php endif; ?>
			<?php if (get_theme_option('display_sidebar_advanced_search') !== '0'): ?>
				<div id="search-container">
					<h2>Search</h2>
					<?php echo search_form(array('show_advanced' => true)); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="col-md-<?php echo $size;?><?php echo $main_add;?>">
		<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
			<div id="homepage-text"><p><?php echo $homepageText; ?></p></div>
			<?php else: ?>
				<?php echo $this->partial($main_file);?>
			<?php endif; ?>
			<main id="content">
				<div class="container">
					<?php if (get_theme_option('Display Featured Item') !== '0'): ?>
						<div class="card mb-4">
							<div class="card-header"><span class="h3"><?php echo __('Featured Item'); ?></span></div>
							<?php echo random_featured_items(1); ?>
						</div>           
						<!--random_featured_items is linked to items/single.php-->

					<?php endif; ?>	

					<?php if (get_theme_option('Display Featured Collection') !== '0'): ?>

						<div class="card mb-4">
							<div class="card-header"><span class="h3"><?php echo __('Featured Collection'); ?></span></div>
							<?php echo random_featured_collection(); ?>
						</div>

						<!--random_featured_collection is linked to collections/single.php-->
					<?php endif; ?>
					
					<?php if (get_theme_option('Display Featured Exhibit') !== '0'): ?>

						<div class="card mb-4">
							<div class="card-header"><span class="h3"><?php echo __('Featured Exhibit'); ?></span></div>

					<!--<div class="col-md-5 card-body">
						<div class="card-title"><span class="lead"><?php //echo __('Featured Collection'); ?></span></div>
						<div class="card-text"><?php //echo random_featured_collection(); ?></div>-->
						<?php echo random_featured_exhibit(); ?>
					</div>
					
					<!--random_featured_collection is linked to collections/single.php-->
				<?php endif; ?>
				<?php if ($recentItems):?>
					<div id="recent-items" class="card" style="border:none;">
						<div class="card-body">
							<h2 class="card-title"><?php echo __('Recently Added Items'); ?></h2>
							<?php if (get_theme_option('display_recent_items_as')=='grid'): ?>
								<div class="row">
								<?php endif; ?>
								<?php echo recent_items_bootstrap($recentItems,get_theme_option('display_recent_items_as')); ?>
								<div class="col-md-12"><p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p></div>
								<?php if (get_theme_option('display_recent_items_as')=='grid'): ?>
								</div>
							<?php endif; ?>
						</div>
					</div>	    
				<?php endif; ?>

				<?php fire_plugin_hook('public_home', array('view' => $this)); ?>
			</div>
		</main>
	</div>
	<?php if ($sidebar_pos=='right'):?>
		<div class="col-md-2<?php echo $sidebar_add;?>">
			<?php if (get_theme_option('display_sidebar_menu') !== '0'): ?>
				<?php echo public_nav_sidebar_bootstrap(); ?>
			<?php endif; ?>
			<?php if (get_theme_option('display_sidebar_advanced_search') !== '0'): ?>
				<div id="search-container">
					<h2>Search</h2>
					<?php echo search_form(array('show_advanced' => true)); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>

<?php echo foot(); ?>

