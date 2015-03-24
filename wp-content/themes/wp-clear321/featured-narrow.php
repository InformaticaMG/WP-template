<script type="text/javascript">
//<![CDATA[
	jQuery(window).load(function() {
		jQuery('#featured').flexslider({
			slideshow: true,
			slideshowSpeed: 6000,
			directionNav:false,
			pauseOnHover:true,
			manualControls: '.narrow-custom-controls li a',
			controlsContainer: ".narrow-slider"
		});
	});
//]]>
</script>

<div class="featured narrow">

	<div class="container narrow-slider clearfix">

		<div class="controls-container clearfix">

			<?php if (get_option('solostream_features_title')) { ?>
			<h2><span><?php echo stripslashes(get_option('solostream_features_title')); ?></span></h2>
			<?php } ?>

			<ul class="flexslide-custom-controls narrow-custom-controls clearfix">

<?php
$count = 1;
$featurecount = get_option('solostream_features_number'); 
$my_query = new WP_Query(array(
	'tag' => 'featured',
	'posts_per_page' => $featurecount
));
while ($my_query->have_posts()) : $my_query->the_post(); ?>

				<li><a href="#" title="<?php the_title(); ?>"><?php solostream_thumbnail(); ?></a></li>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

			</ul>

		</div>

		<div id="featured" class="flexslider">

			<ul class="slides">

<?php
$count = 1;
global $do_not_duplicate;
$featurecount = get_option('solostream_features_number'); 
$my_query = new WP_Query(array(
	'tag' => 'featured',
	'posts_per_page' => $featurecount
));
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

	    			<li id="narrow-feature-post-<?php echo $count; ?>"<?php echo solostream_featureclass(); ?>>

					<div class="slide-container clearfix">

						<?php if ( get_post_meta( $post->ID, 'video_embed', true ) ) { ?>
							<div class="feature-video">
								<div class="video">
									<?php echo get_post_meta( $post->ID, 'video_embed', true ); ?>
								</div>
							</div>
						<?php } else { ?>
							<div class="feature-image"> 
								<a href="<?php the_permalink() ?>" rel="nofollow" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php solostream_feature_image(); ?></a>
							</div>
						<?php } ?>

	    					<div class="flex-caption">
							<div class="excerpt">
								<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "solostream"); ?>" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div>
							<p class="readmore"><a class="more-link" href="<?php the_permalink() ?>" rel="nofollow" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php _e("Léeme!", "solostream"); ?></a></p>
						</div>

					</div>

				</li>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

			</ul>


		</div>

	</div>

</div>