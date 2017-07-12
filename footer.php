<footer>
	<hr>
	<section class="footer_contain">
		<div class="footer_logo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/foot_logo.png" id="footer_logo" />
			<?php if ( is_active_sidebar( 'info_footer' ) ) : ?>
			    <?php dynamic_sidebar( 'info_footer' ); ?>
			<?php endif; ?>
		</div>
		<div class="footer_about">
			<?php if ( is_active_sidebar( 'about_footer' ) ) : ?>
			    <?php dynamic_sidebar( 'about_footer' ); ?>
			<?php endif; ?>
		</div>
		<div class="footer_facebook">
			<?php echo do_shortcode("[custom-facebook-feed]"); ?>
		</div>
	</section>
	<hr>
	<section class="copyright">
		&copy; <?php echo date("Y"); ?> North American Primate Sanctuary Alliance. All rights reserved.
	</section>
</footer>


<?php wp_footer(); ?>
</body>
</html>