<?php
get_header();
?>

<!-- display the story image -->
<div id="content">
<h1 id="header"><?php header_graphic(); ?></h1>
</div>

<!-- print the stories -->
<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_date('','<h2>','</h2>'); ?>

<div class="post">

<h3 class="storytitle" id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
</h3>

<div class="storycontent">
<?php the_content(__('(more...)')); ?>
</div>

</div>

<?php endwhile; else: ?>
<?php endif; ?>

</div>

<!-- display the side menu -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>
