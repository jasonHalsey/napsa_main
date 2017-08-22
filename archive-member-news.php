<?php
/*
Template Name: archive-member-news
*/
  get_header();
?>
<section class="feed_page_container">
  <h1><?php the_title(); ?> </h1>
  <section class="feed_container">
    <?php
      $staffpost = array( 'post_type' => 'member_news','orderby' => 'menu_order');
      $loop = new WP_Query( $staffpost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
    <div class="member_news_post">
      <?php echo get_post_meta( $post->ID, '_cmb2_member_pub_date', true ); ?><a class="staff_block" href="<?php the_permalink() ?>">
      <?php the_title(); ?> 
      </a>
      <?php $report = get_the_content(); ?>
      <?php
        echo wp_trim_words($report, 25 ); 
      ?>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
  </section>

  <section class="feed_sidebar">
    <?php if ( is_active_sidebar( 'member_list' ) ) : ?>
        <?php dynamic_sidebar( 'member_list' ); ?>
    <?php endif; ?>
  </section>

</section>


<?php get_footer(); ?>
