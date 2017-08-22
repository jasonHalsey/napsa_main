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