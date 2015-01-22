<?php get_header(); ?>

<?php solostream_before_page(); ?>

		<div id="page" class="clearfix">

			<div class="page-border clearfix">

<?php solostream_before_contentleft(); ?>

				<div id="contentleft" class="clearfix">

<?php solostream_before_content(); ?>

					<div id="content" class="clearfix">

						<?php if ( function_exists('yoast_breadcrumb') && !is_home() ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

						<?php get_template_part( 'banner468' ); ?>