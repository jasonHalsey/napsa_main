jQuery(document).ready(function() {

	jQuery('p.post-meta span.published').each(function() {
		jQuery(this).detach();
		jQuery('h2.entry-title').prepend(jQuery(this));
	});


});

// Add Span to first word of Hero Title for Styling
(function () { 
    var node = jQuery("h2.et_pb_slide_title").each().contents().filter(function () { return this.nodeType == 3 }).first(),
        text = node.text(),
        first = text.slice(0, text.indexOf(" "));
    
    if (!node.length)
        return;
    
    node[0].nodeValue = text.slice(first.length);
    node.before('<span>' + first + '</span>');
})();