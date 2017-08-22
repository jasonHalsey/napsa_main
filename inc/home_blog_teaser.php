<ul class="news_teaser">
	<?php
	  $mypost = array( 'post_type' => 'napsa_news');
	  $loop = new WP_Query( $mypost );
	?>
	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
		<li>
			<?php echo get_the_date('m/d/Y'); ?><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
		</li>

	 <?php endwhile; ?>
	 <?php wp_reset_query(); ?>
</ul>