jQuery(document).ready(function() {
	console.log(templateDir);

	moveViewAll();
	feedURL();

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
<<<<<<< HEAD

	jQuery('.no-fouc').removeClass('no-fouc');

});

// Create A "View All" Button for AJAX Feed Filtering
function moveViewAll() {
  var view_all = jQuery('#container-async > section > ul > li > a:contains("View All")');
  jQuery(view_all).detach();
  jQuery('.view_btn_contain').prepend(view_all);
}

//Redirect NAPSA in The News Feed link to direct to NAPSA in The News Overview Page
function feedURL() {
	var target_link = jQuery('.et_pb_portfolio_item a');
	jQuery(target_link).attr("href", '' + blogInfo + '/napsa-in-the-news/');
}
=======

});
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
