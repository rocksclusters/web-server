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

<?php wp_list_bookmarks(array(
	'categorize' => 0,
	'title_li' => '',
	'class' => 'newsletter',
	'before' => '<div id="newsletter"><span id="newsletter-title">',
	'after' => '</p></span></div>',
	'show_description' => 1,
	'between' => '</span><p id="newsletter-text">',
	'show_images' => 0,
)); ?>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar2') ) : ?>

<?php endif; ?>
			</div><!-- cB2 -->
		</div><!-- cB -->
<?php get_footer(); ?>
