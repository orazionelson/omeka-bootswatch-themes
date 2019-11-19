<!-- 
<div class="row">
	<div class="col-md-3">
		<div class="card-img-bottom">
			<?php if ($exhibitImage = record_image($exhibit)): ?>
				<?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="col-md-9">
		<div class="card-body">
			<h3 class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h3>
			
			<p><?php echo snippet_by_word_count(metadata($exhibit, 'description', array('no_escape' => true))); ?></p>
		</div>
	</div>
</div> -->

  <div class="card-img-top">
			<?php if ($exhibitImage = record_image($exhibit,"fullsize")): ?>
				<?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
			<?php endif; ?>
		</div>
  <div class="card-body">
    <h5 class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h5>
    <p class="card-text"><?php echo snippet_by_word_count(metadata($exhibit, 'description', array('no_escape' => true))); ?></p>
  </div>

