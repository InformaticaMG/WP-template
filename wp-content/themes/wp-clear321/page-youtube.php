<?php
/*
Template Name: Youtube Videos
*/
?>

<?php get_template_part( 'content', 'before' ); ?>

						<div class="post entry clearfix">

							<?php the_post(); $content = get_the_content(); ?>

							<h1 class="page-title" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>

							<?php if ( ! empty( $content ) ) : ?>
								<div class="content">
									<?php the_content(); ?>
								</div>
							<?php endif; ?>

							<script type="text/javascript">
							//<![CDATA[
								jQuery(window).load(function() {
									jQuery('#featured-yt-vids-page').flexslider({
										slideshow: false,
										directionNav:false,
										manualControls: '.youtubepage-custom-controls li a',
										controlsContainer: '.youtubepage-container'
									});
								});
							//]]>
							</script>

							<div class="featured videos yt-temp">

								<div class="container youtubepage-container clearfix">

									<div id="featured-yt-vids-page" class="flexslider">

										<ul class="slides">

    											<?php
												$ytfeed = get_post_meta( $post->ID, 'ytfeed', true ); 
    												$count = 1;
    												// Get RSS Feed(s)
    												include_once(ABSPATH . WPINC . '/rss.php');
      												$rss = fetch_feed($ytfeed);
												//set number of items to display
    												$maxitems = 9999;
												$items = $rss->get_items(0, $maxitems);
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

										<ul class="flexslide-custom-controls youtubepage-custom-controls clearfix">

    											<?php
    												$count = 1;
    												// Get RSS Feed(s)
    												include_once(ABSPATH . WPINC . '/rss.php');
      												$rss = fetch_feed($ytfeed);
												//set number of items to display
    												$maxitems = 9999;
												$items = $rss->get_items(0, $maxitems);
    												foreach ( $items as $item ) :

												$youtubeid = strchr($item->get_permalink(),'=');
												$youtubeid = substr($youtubeid,1,11);
    											?>

											<li class="clearfix" onclick="location.href='#content';">
												<a class="clearfix" href="#" title="<?php echo esc_html( $item->get_title() ); ?>">
													<img class="yt-thumb" src="http://img.youtube.com/vi/<?php echo $youtubeid; ?>/0.jpg" alt="<?php echo esc_html( $item->get_title() ); ?>" title="<?php echo esc_html( $item->get_title() ); ?>" />
													<span class="yt-title"><?php echo esc_html( $item->get_title() ); ?></span>
												</a>
											</li>

											<?php if ( $count%3 == 0 ) { ?>
												<li class="clear-row"></li>
											<?php } ?>

											<?php $count = $count + 1; endforeach; ?>

										</ul>

									</div>

								</div>

							</div>

						</div>

<?php get_template_part( 'content', 'after' ); ?>