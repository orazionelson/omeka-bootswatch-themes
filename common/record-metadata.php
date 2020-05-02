<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="row element">
        <div class="col-sm-3 text-md-right"><h3><?php echo html_escape(__($elementName)); ?></h3></div>
        <div class="col-sm-9">
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <p class="element-text"><?php echo $text; ?></p>
        <?php endforeach; ?>
    </div>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;
