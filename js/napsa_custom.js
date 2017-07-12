jQuery(document).ready(function() {
	 // moveNavLogo();

	// function moveNavLogo() {
	//   var logo = jQuery('div.logo_container');
	//   jQuery(logo).detach();
	//   jQuery('.logo_drop').prepend(jQuery(logo));
	// }
});

(function () { 
    var node = jQuery("h2.et_pb_slide_title").contents().filter(function () { return this.nodeType == 3 }).first(),
        text = node.text(),
        first = text.slice(0, text.indexOf(" "));
    
    if (!node.length)
        return;
    
    node[0].nodeValue = text.slice(first.length);
    node.before('<span>' + first + '</span>');
})();