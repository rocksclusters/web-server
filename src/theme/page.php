<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="cB">
			<div class="Ctopright"></div>
			<div id="cB1">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<div class="news">
<?php the_content('Read the rest of this entry &raquo;'); ?>
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
<!--
			<div id="cB2">
				<h3>TEMPLATE FEATURES</h3>
				<div class="about">
					<ul>
						<li>100% height, no matter how long the content goes</li>
						<li>Compatible with screen resolution of 1024x768 and higher</li>
						<li>A simple yet impressive and totally brandable template</li>
						<li>Tested to work faultlessly in IE 6, IE 7, FireFox 2 and Opera 9.1</li>
						<li>Lightweight code of under 14KB and images under 48KB, a total of under 62KB</li>
						<li>Unique icons that we have designed especially for this template</li>
						<li>A free sample logo for anyone to use and edit according to needs</li>
						<li>A PSD available for sale with all graphics in layers for even easier editing</li>
					</ul>
				</div>
				<div id="newsletter"><span id="newsletter-title"><a href="http://www.symisun.com/newsletter/en">Newsletter</a></span> <p id="newsletter-text"><a href="http://www.symisun.com/newsletter/en">Click here to register for SymiSun's monthly newsletter</a></p></div><!-- newsletter -->
			</div><!-- cB2 -->
-->
		</div><!-- cB -->
<?php get_footer(); ?>
