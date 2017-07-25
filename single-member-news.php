<?php
/*
 * Template Name: NAPSA Member News
 * Template Post Type: member_news
 */
 
 get_header();  ?>


<div class="single_feed_container">
<?php while ( have_posts() ) : the_post(); ?>
  <?php if ( is_single() ) : ?>

  <section class="member_news_title">
    <h1><?php the_title() ?></h1>
    
  </section>

  <section class="member_news_content">
    <p><?php the_content() ?></p>
  </section>

  <?php endif; // is_single() ?>
 <?php endwhile; ?>
</div>

<?php get_footer(); ?>