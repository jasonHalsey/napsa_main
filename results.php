<?php
<<<<<<< HEAD

=======
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
/*
Template Name: Feed Page
*/
  get_header();
<<<<<<< HEAD

?>

=======
?>
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
<section class="feed_page_container">
  <h1><?php the_title(); ?> </h1>
  <section class="feed_container">
    <?php if ( have_posts() ) :
<<<<<<< HEAD
		while ( have_posts() ) : the_post(); ?>
=======
		while ( have_posts() ) : the_post();?>
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
		
    	<div class="member_news_post">
			<?php the_content(); ?>
		</div>
	<?php
		endwhile;
		endif;
	?>
  </section>
</section>

<<<<<<< HEAD
<?php get_footer(); ?>
=======
<?php get_footer(); ?>
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
