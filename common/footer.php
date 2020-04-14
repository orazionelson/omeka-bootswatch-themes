	</div><!-- end content -->
</main>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50 container-fluid bg-primary">
	<div class="row">
		<div id="footer-content" class="col-sm-12 text-center">
	        <?php if($footerText = get_theme_option('Footer Text')): ?>
	        <div id="custom-footer-text">
	            <p><?php echo get_theme_option('Footer Text'); ?></p>
	        </div>
	        <?php endif; ?>
	        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
	        <p><?php echo $copyright; ?></p>
	        <?php endif; ?>
	        <p class="small credits"><?php echo __('<a class="designed" href="http://www.nelsonweb.it">Ported by Alfredo Cosco</a> from <a href="https://bootswatch.com/">Bootswatch</a> - <a class="powered" href="http://omeka.org">Proudly powered by Omeka</a>'); ?></p>
		</div>		
    </div><!-- end footer-content row -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>

</body>

</html>
