<<<<<<< HEAD
<script>
	jQuery(document).ready(function() {

		if (pageSlug == 'napsa-members-in-the-news'){
			jQuery('p.textBlock').load( '' + templateDir + '/inc/member_text.php');

		}else if (pageSlug == 'napsa-responds') {
			jQuery('p.textBlock').load( '' + templateDir + '/inc/responds_text.php');

		}else if (pageSlug == 'napsa-in-the-news') {
			jQuery('p.textBlock').load( '' + templateDir + '/inc/napsa_text.php');
		}
	});
</script>


<p class="textBlock"></p>

<script>
	jQuery(document).ready(function() {
		jQuery('#monkey_icon_drop').prepend("<img id='monkey_icon' src='"+ templateDir +"/images/monkey_icon.png' />");
	});
</script>
=======
<h2>NAPSA In The News</h2>
	<p>NAPSA and our members are often quoted in the media in stories not just about primate sanctuaries, but about exotic pets, research, primates in entertainment, and primate welfare as a whole. Please let us know if there is an article or link missing from this constantly evolving archive!</p>

<h2>Here is the sidebar</h2>
	<?php require_once(__DIR__ . '/inc/sidebar_widget.php'); ?>
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
