<?php
/*
Template Name: Alternate Home
*/
?>

<?php get_header(); ?>

<?php solostream_before_page(); ?>

		<div id="page" class="clearfix" style="background:transparent;">

			<div class="page-border clearfix" style="background:transparent;">

				<div id="alt-home-bottom" class="clearfix maincontent">

					<div class="home-widget-1">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Alt Home Page Widget 1') ) : ?>
						<?php endif; ?>
					</div> <!-- End .home-widget-1 div -->

					<div class="home-widget-2">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Alt Home Page Widget 2') ) : ?>
						<?php endif; ?>
					</div> <!-- End .home-widget-2 div -->

					<div class="home-widget-3">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Alt Home Page Widget 3') ) : ?>
						<?php endif; ?>
					</div> <!-- End .home-widget-3 div -->

				</div> <!-- End #alt-home-bottom div -->

<?php get_footer(); ?>