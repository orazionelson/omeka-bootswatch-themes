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

<?php if ($sidebar_pos=='right'): ?>
<div class="row">
    <div class="col-md-8<?php echo $main_add;?>">
		<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
			<div id="homepage-text"><p><?php echo $homepageText; ?></p></div>
		<?php else: ?>
		<?php echo $this->partial($main_file);?>
		<?php endif; ?>
		<?php
	    $recentItems = get_theme_option('Homepage Recent Items');
	    if ($recentItems === null || $recentItems === ''):
	        $recentItems = 3;
	    else:
	        $recentItems = (int) $recentItems;
	    endif;
	    if ($recentItems):
	    ?>
			<div id="recent-items" class="card">
					<div class="card-body">
					<h2 class="card-title"><?php echo __('Recently Added Items'); ?></h2>
					<?php echo recent_items_bootstrap($recentItems,get_theme_option('display_recent_items_as')); ?>
					<div class="col-md-12"><p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p></div>
					</div>
			</div>
	    <?php endif; ?>

	    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
    </div>

    <div class="col-md-4<?php echo $sidebar_add;?>">
		<?php if (get_theme_option('display_sidebar_menu') !== '0'): ?>
			<?php echo public_nav_sidebar_bootstrap(); ?>
		<?php endif; ?>
		<?php if (get_theme_option('display_sidebar_advanced_search') !== '0'): ?>
			<div id="search-container">
				<h2>Search</h2>
				<?php echo search_form(array('show_advanced' => true)); ?>
			</div>
		<?php endif; ?>
        <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
			<div class="card">
				<div class="card-body">
					<div class="card-title"><span class="lead"><?php echo __('Featured Item'); ?></span></div>
					<?php echo random_featured_items(1); ?>
				</div>
			</div>
        <?php endif; ?>
        <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
			<div class="card">
				<div class="card-body">
				<div class="card-title"><span class="lead"><?php echo __('Featured Collection'); ?></span></div>
				<?php echo random_featured_collection(); ?></div>
			</div>
			</div>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Featured Exhibit') !== '0') && plugin_is_active('ExhibitBuilder') && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
					<div class="card">
						<div class="card-body">
						<?php echo exhibit_builder_display_random_featured_exhibit(); ?>
					</div>
					</div>
        <?php endif; ?>
    </div>
</div>


<?php elseif ($sidebar_pos=='none'): ?>
	<div class="row">
	    <div class="col-lg-12<?php echo $main_add;?>">
			<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
				<div id="homepage-text"><p><?php echo $homepageText; ?></p></div>
			<?php else: ?>
			<?php echo $this->partial($main_file);?>
			<?php endif; ?>
			<?php
		    $recentItems = get_theme_option('Homepage Recent Items');
		    if ($recentItems === null || $recentItems === ''):
		        $recentItems = 3;
		    else:
		        $recentItems = (int) $recentItems;
		    endif;
		    if ($recentItems):
		    ?>
		    <div id="recent-items" class="card">
						<div class="card-body">
		        <h2 class="card-title"><?php echo __('Recently Added Items'); ?></h2>
		        <?php echo recent_items_bootstrap($recentItems,get_theme_option('display_recent_items_as')); ?>
		        <div class="col-md-12"><p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p></div>
						</div>
				</div>
		    <?php endif; ?>

		    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
	    </div>
	</div>


<?php elseif ($sidebar_pos=='left'): ?>
		<div class="row">
			<div class="col-md-4<?php echo $sidebar_add;?>">
			<?php if (get_theme_option('display_sidebar_menu') !== '0'): ?>
				<?php echo public_nav_sidebar_bootstrap(); ?>
			<?php endif; ?>
			<?php if (get_theme_option('display_sidebar_advanced_search') !== '0'): ?>
				<div id="search-container">
					<h2>Search</h2>
					<?php echo search_form(array('show_advanced' => true)); ?>
				</div>
			<?php endif; ?>
			<?php if (get_theme_option('Display Featured Item') !== '0'): ?>
				<div class="card">
					<div class="card-body">
						<div class="card-title"><span class="lead"><?php echo __('Featured Item'); ?></span></div>
						<?php echo random_featured_items(1); ?>
					</div>
				</div>
					<?php endif; ?>
					<?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
				<div class="card">
					<div class="card-body">
					<div class="card-title"><span class="lead"><?php echo __('Featured Collection'); ?></span></div>
					<?php echo random_featured_collection(); ?></div>
				</div>
					<?php endif; ?>
					<?php if ((get_theme_option('Display Featured Exhibit') !== '0') && plugin_is_active('ExhibitBuilder') && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
						<div class="card">
							<div class="card-body">
							<?php echo exhibit_builder_display_random_featured_exhibit(); ?>
						</div>
						</div>
					<?php endif; ?>
			</div>

	    <div class="col-md-8<?php echo $main_add;?>">
			<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
				<div id="homepage-text"><p><?php echo $homepageText; ?></p></div>
			<?php else: ?>
			<?php echo $this->partial($main_file);?>
			<?php endif; ?>
			<?php
		    $recentItems = get_theme_option('Homepage Recent Items');
		    if ($recentItems === null || $recentItems === ''):
		        $recentItems = 3;
		    else:
		        $recentItems = (int) $recentItems;
		    endif;
		    if ($recentItems):
		    ?>
				<div id="recent-items" class="card">
						<div class="card-body">
		        	<h2 class="card-title"><?php echo __('Recently Added Items'); ?></h2>
		        	<?php echo recent_items_bootstrap($recentItems,get_theme_option('display_recent_items_as')); ?>
		        	<div class="col-md-12"><p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p></div>
						</div>
				</div>
		    <?php endif; ?>

		    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

	    </div>
	</div>


<?php endif; ?>

<?php echo foot(); ?>

