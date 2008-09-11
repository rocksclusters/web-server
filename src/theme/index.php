<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="cB">
			<div class="Ctopright"></div>
			<div id="cB1">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3><p class="postdate"><?php the_time('F jS, Y') ?> by <?php the_author() ?></p>
				<div class="news">
<?php the_content('Read the rest of this entry &raquo;'); ?>
<p>Filed under: <?php the_category(', ') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				</div>

		<?php endwhile; ?>

<div class="postnav">
<div class="left"><?php next_posts_link('Previous') ?></div>
<div class="right"><?php previous_posts_link('Next') ?></div>
</div>

<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

			</div><!-- cB1 -->
			<div id="cB2">
				<div id="newsletter">
					<span id="newsletter-title">Monitor</span>
					<p id="newsletter-text">Click here to monitor your cluster</p>
				</div><!-- newsletter -->

				<div id="newsletter">
					<span id="newsletter-title">Users Guide</span>
					<p id="newsletter-text">Learn about your cluster</p>
				</div><!-- newsletter -->

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar2') ) : ?>
				<h3>Recent Posts</h3>
				<div class="about">
					<ul>
						<?php wp_get_archives('type=postbypost&limit=10'); ?>
					</ul>
				</div>
<?php endif; ?>
			</div><!-- cB2 -->
		</div><!-- cB -->
<?php get_footer(); ?>
