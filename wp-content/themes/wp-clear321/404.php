<?php get_template_part( 'content', 'before' ); ?>

						<div class="post clearfix">

							<div class="entry clearfix">

								<h1 class="page-title"><?php _e("Sorry ... Page Not Found", "solostream"); ?></h1>

	 							<p><?php _e("I'm sorry, but the page you're looking for could not be found. Below are our most recent entries. Perhaps you'll find what you're looking for there.", "solostream"); ?></p>

								<ol>
									<?php query_posts('showposts=40'); while (have_posts()) : the_post(); ?>
									<li><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "solostream"); ?>" title="<?php _e("Permanent Link to", "solostream"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></li>
									<?php endwhile; ?>
								</ol>

							</div>

						</div>

<?php get_template_part( 'content', 'after' ); ?>