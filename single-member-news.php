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
    <h2><?php the_title() ?></h2>

  </section>

  <section class="member_news_content">
    <h3><?php 
      $sanctuary_name = get_the_term_list( $post->ID, 'sanctuary', '<h2>', ', ', '</h2>' );
      echo strip_tags($sanctuary_name);
    ?></h3>
    <?php echo get_post_meta( $post->ID, '_cmb2_member_pub_date', true ); ?>
    <p><?php the_content() ?></p>
  </section>

  <?php endif; // is_single() ?>
 <?php endwhile; ?>
</div>

<?php get_footer(); ?>