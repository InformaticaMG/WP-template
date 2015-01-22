<script type="text/javascript">
//<![CDATA[
	jQuery(window).load(function() {
		jQuery('#featured-galleries').flexslider({
			animation:'slide',
			controlNav: false,
			slideshow: false,
			slideshowSpeed: 0000,
			directionNav:true,
			animationLoop: false
		});
	});
//]]>
</script>

<div class="featured galleries">

	<div class="container gallery-slider clearfix">

		<?php if (get_option('solostream_galleries_title')) { ?>
		<h2 class="feature-title"><span><?php echo stripslashes(get_option('solostream_galleries_title')); ?></span></h2>
		<?php } ?>

		<div id="featured-galleries" class="flexslider">

			<ul class="slides">

				<li>

<?php 
global $do_not_duplicate;
$count = 1;
$my_query = new WP_Query(array(
	'category_name' => get_option('solostream_galleries_cat'),
	'posts_per_page' => get_option('solostream_galleries_count')
));
while ($my_query->have_posts()) : $my_query->the_post();
$totalposts = $my_query->post_count;
$do_not_duplicate[] = $post->ID; ?>

					<div id="post-<?php echo $count; ?>" class="gallery-post">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php solostream_thumbnail(); ?></a>
						<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
					</div>

<?php if ( $count%4 == 0 && $count != $totalposts ) { ?>
	    			</li>
				<li>
<?php } ?>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

				</li>

			</ul>


		</div>

	</div>

</div>