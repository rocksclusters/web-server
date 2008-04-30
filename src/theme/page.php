<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post">

<div style="font-size: 12px">
	<?php the_content(__('(more...)')); ?>
</div>

</div>

<!-- this is the end of have_posts() loop above -->
<?php endwhile; else: ?>
<?php endif; ?>

<div style="margin: 10px 0 10px 0">
	<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>
</div>

<?php get_footer(); ?>

