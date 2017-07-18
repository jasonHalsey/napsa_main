jQuery(document).ready(function() {

	jQuery('p.post-meta span.published').each(function() {
		jQuery(this).detach();
		jQuery('h2.entry-title').prepend(jQuery(this));
	});


	jQuery('h2.et_pb_slide_title').each(function () {
	    
	    var title = jQuery(this);
	    title.html(function(i,html){
	    	return html.replace(/^\s*([^\s]+)(\s|$)/, '<span>$1 </span>');
	    })
	});

});