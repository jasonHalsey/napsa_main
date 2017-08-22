jQuery(document).ready(function() {

	moveViewAll();

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

	jQuery('.no-fouc').removeClass('no-fouc');

});

function moveViewAll() {
  var view_all = jQuery('#container-async > section > ul > li > a:contains("View All")');
  jQuery(view_all).detach();
  jQuery('.view_btn_contain').prepend(view_all);
}