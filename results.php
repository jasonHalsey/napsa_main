<?php
/*
Template Name: results
*/
  get_header();
?>
<section class="feed_page_container">
  <h1><?php the_title(); ?> </h1>
  <section class="feed_container">
    <?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();?>
    <div class="member_news_post">

      <?php the_content(); ?>
<?php
					endwhile;

				endif;
			?>
  </section>
</section>


<?php get_footer(); ?>