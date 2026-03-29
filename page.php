<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php if(empty($post->post_content)): ?>
  <p align="center">準備中です。</p>
<?php endif; ?>
<?php get_footer(); ?>
