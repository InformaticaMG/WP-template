<script type="text/javascript">
//<![CDATA[
	jQuery(window).load(function() {
		jQuery('#featured-yt-vids').flexslider({
			slideshow: false,
			directionNav:false,
			manualControls: '.youtube-custom-controls li a',
			controlsContainer: ".youtube-slider"
		});
	});
//]]>
</script>

<div class="featured videos yt">

	<div class="container youtube-slider clearfix">

		<div id="featured-yt-vids" class="flexslider">
			<ul class="slides">
<?php
$count = 1;
// Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/rss.php');
$rss = fetch_feed($instance['ytrss']);
$maxitems = $rss->get_item_quantity($instance['numvids']);
$items = $rss->get_items(0, $maxitems); ?>

<?php 
foreach ( $items as $item ) :
$youtubeid = strchr($item->get_permalink(),'=');
$youtubeid = substr($youtubeid,1,11);
?>
	    			<li id="feature-yt-vid-<?php echo $count; ?>">

					<div class="feature-video">
						<div class="video">
							<iframe width="300" height="250" src="http://www.youtube.com/embed/<?php echo $youtubeid; ?>" frameborder="0"></iframe>
						</div>
					</div>

				</li>
<?php $count = $count + 1; endforeach; ?>
			</ul>
		</div>

		<div class="controls-container clearfix">
			<ul class="flexslide-custom-controls youtube-custom-controls clearfix">
<?php
$count = 1;
// Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/rss.php');
$rss = fetch_feed($instance['ytrss']);
$maxitems = $rss->get_item_quantity($instance['numvids']);
$items = $rss->get_items(0, $maxitems); ?>

<?php 
foreach ( $items as $item ) :
$youtubeid = strchr($item->get_permalink(),'=');
$youtubeid = substr($youtubeid,1,11);
?>
				<li class="clearfix" >
					<a class="clearfix" href="#" title="<?php echo esc_html( $item->get_title() ); ?>">
						<img class="yt-thumb" src="http://img.youtube.com/vi/<?php echo $youtubeid; ?>/default.jpg" alt="<?php echo esc_html( $item->get_title() ); ?>" title="<?php echo esc_html( $item->get_title() ); ?>" />
						<span class="yt-title"><?php echo esc_html( $item->get_title() ); ?></span>
					</a>
				</li>
<?php $count = $count + 1; endforeach; ?>
			</ul>
		</div>

	</div>

</div>