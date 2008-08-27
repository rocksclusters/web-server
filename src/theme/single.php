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
<p>Filed under: <?php the_category(', ') ?>
				</div>

	<?php comments_template(); ?>

		<?php endwhile; ?>

<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
</div><!-- cB1 -->
			<div id="cB2">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar2') ) : ?>
				<h3>Recent Posts</h3>
				<div class="about">
					<ul>
						<?php wp_get_archives('type=postbypost&limit=10'); ?>
					</ul>
				</div>
<?php endif; ?>
				<div id="newsletter"><span id="newsletter-title"><a href="<?php bloginfo('rss2_url'); ?>">Subscribe</a></span> <p id="newsletter-text"><a href="<?php bloginfo('rss2_url'); ?>">Click here to subscribe to<br/><?php bloginfo('name'); ?>'s RSS feed</a></p></div><!-- newsletter -->
			</div><!-- cB2 -->
		</div><!-- cB -->
<?php get_footer(); ?>
