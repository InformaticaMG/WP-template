			</div> <!-- End .page-border div -->

		</div> <!-- End #page div -->

		<?php get_template_part( 'banner728', 'bottom' ); ?>

	</div> <!-- End #wrap div -->

	<?php /* footer widgets */ if ( is_active_sidebar('widget-5') || is_active_sidebar('widget-6') || is_active_sidebar('widget-7') || is_active_sidebar('widget-8') ) { ?>
	<div id="footer-widgets" class="maincontent">
		<div class="limit clearfix">
			<div class="footer-widget1">
				<?php dynamic_sidebar('Footer Widget 1'); ?>
			</div>
			<div class="footer-widget2">
				<?php dynamic_sidebar('Footer Widget 2'); ?>
			</div>
			<div class="footer-widget3">
				<?php dynamic_sidebar('Footer Widget 3'); ?>
			</div>
			<div class="footer-widget4">
				<?php dynamic_sidebar('Footer Widget 4'); ?>
			</div>
		</div>
	</div> <!-- End #footer-widgets div -->
	<?php } ?>

	<div id="footer">
		<div class="limit clearfix">
			<p class="footurl"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></p>
			<?php if (has_nav_menu('footernav')) { ?>
				<div id="footnav">
					<ul class="clearfix">
						<?php wp_nav_menu(array('container'=>false,'theme_location'=>'footernav','fallback_cb'=>'','items_wrap'=>'%3$s')); ?>
					</ul>
				</div>
			<?php } ?>
			&copy;  <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
<br/>
<a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/Dataset" property="dct:title" rel="dct:type">Marea Granate</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="www.mareagranate.org" property="cc:attributionName" rel="cc:attributionURL">Marea Granate</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Reconocimiento-NoComercial 4.0 Internacional License</a>.
		</div>
	</div> <!-- End #footer div -->

</div> <!-- End #outerwrap div -->

<?php wp_footer(); ?>

</body>

</html>