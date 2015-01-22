			<div class="cats-by-2">

<?php // LETS GATHER UP ALL THE CATEGORIES FROM THE THEME SETTINGS PAGE
$cats = array();
if ( get_option('solostream_cat_box_1') != "Select a Category Slug" )
	$cats[] = array(
		"catid" => get_category_by_slug(get_option('solostream_cat_box_1'))->term_id,
		"cattitle" => get_option('solostream_cat_box_1_title'));
if ( get_option('solostream_cat_box_2') != "Select a Category Slug" )
	$cats[] = array(
		"catid" => get_category_by_slug(get_option('solostream_cat_box_2'))->term_id,
		"cattitle" => get_option('solostream_cat_box_2_title'));
if ( get_option('solostream_cat_box_3') != "Select a Category Slug" )
	$cats[] = array(
		"catid" => get_category_by_slug(get_option('solostream_cat_box_3'))->term_id,
		"cattitle" => get_option('solostream_cat_box_3_title'));
if ( get_option('solostream_cat_box_4') != "Select a Category Slug" )
	$cats[] = array(
		"catid" => get_category_by_slug(get_option('solostream_cat_box_4'))->term_id,
		"cattitle" => get_option('solostream_cat_box_4_title'));
if ( get_option('solostream_cat_box_5') != "Select a Category Slug" )
	$cats[] = array(
		"catid" => get_category_by_slug(get_option('solostream_cat_box_5'))->term_id,
		"cattitle" => get_option('solostream_cat_box_5_title'));
if ( get_option('solostream_cat_box_6') != "Select a Category Slug" )
	$cats[] =  array(
		"catid" => get_category_by_slug(get_option('solostream_cat_box_6'))->term_id,
		"cattitle" => get_option('solostream_cat_box_6_title'));

// NOW LETS CREATE A SEPARATE LOOP FOR EACH CATEGORY BOX
foreach ($cats as $cat) {
	global $do_not_duplicate;
	if ( get_option('solostream_hidedupes') == "No" ) { $do_not_duplicate = null; }
	$my_query = new WP_Query(array(
		'post__not_in' => $do_not_duplicate,
		'cat' => $cat['catid'],
		'posts_per_page' => get_option('solostream_num_home_posts_by_cat')
	)); 

	$count = 1;
	if ($my_query->have_posts()) : 
	$post_class = ('cat-posts-left' == $post_class) ? 'cat-posts-right' : 'cat-posts-left'; 
?>

				<?php /* NOW LETS SHOW THE INDIVIDUAL CATEGORY BOXES */ ?>
				<div class="<?php echo $post_class; ?>">
					<h2 class="feat-title"><span><a href="<?php echo esc_url(get_category_link($cat['catid'])); ?>"><?php echo $cat['cattitle']; ?></a></span></h2>
<?php while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate[] = $post->ID; ?>
					<div class="post clearfix mypost-<?php echo $count; ?>" id="cat-post-<?php the_ID(); ?>">
						<div class="entry clearfix">
							<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "solostream"); ?>" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php solostream_thumbnail(); ?></a>
							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "solostream"); ?>" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<?php solostream_excerpt(); ?>
							<div style="clear:both;"></div>
						</div>
					</div>
<?php $count = $count + 1 ?>
<?php endwhile; ?>
				</div>
				<?php if ( $post_class == 'cat-posts-right' ) { ?>
				<div style="clear:both;"></div>
				<?php } ?>

<?php endif; ?>
<?php } ?>

			</div>




			<?php /* NOW LETS SHOW THE OTHER RECENT ARTICLES IF THEY'RE ACTIVATED */ ?>
			<?php if ( get_option('solostream_other_articles') == yes ) { ?>
			<div class="cat-posts-stacked">
				<h2 class="feat-title"><span><?php echo stripslashes(get_option('solostream_other_title')); ?></span></h2>
<?php 
$count = 1;
if ( get_option('solostream_hidedupes') == "No" ) { $do_not_duplicate = null; }
$my_query = new WP_Query(array(
	'post__not_in' => $do_not_duplicate,
	'posts_per_page' => get_option('solostream_other_number')
));
while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="post clearfix" id="post-main-<?php the_ID(); ?>">
					<div class="entry clearfix">
						<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "solostream"); ?>" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php solostream_thumbnail(); ?></a>
						<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "solostream"); ?>" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
						<?php get_template_part( 'postinfo' ); ?>
						<?php solostream_excerpt(); ?>
						<div style="clear:both;"></div>
					</div>
				</div>
<?php $count = $count + 1 ?>
<?php endwhile; ?>
			</div>
			<?php } ?>