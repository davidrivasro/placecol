jQuery(document).ready(function() {
/*jshint es5: true */
/*global $:false */
/*global jQuery:false */
/*global data:false */
/*global jQuery:false */
/*jshint unused: vars */
function uplightbox() {
jQuery("a[rel^='prettyPhoto']").prettyPhoto({
animationSpeed:'fast',
slideshow:5000,
theme:'light_square',
show_title:false,
overlay_gallery: false
});
}
if(jQuery().prettyPhoto) {
uplightbox(); 
}
function homethumbhover() {
$(".center_round_thumb").hover(function(){
$(this).children('.zoom').fadeIn(500);
}, function() {
$(this).children('.zoom').fadeOut(500);
});
}
homethumbhover();
if (jQuery().quicksand) {
(function($) {
$.fn.sorted = function(customOptions) {
var options = {
reversed: false,
by: function(a) {
return a.text();
}
};
$.extend(options, customOptions);
$data = jQuery(this);
arr = $data.get();
arr.sort(function(a, b) {
var valA = options.by($(a));
var valB = options.by($(b));
if (options.reversed) {
return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;				
} else {		
return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
}
});
return $(arr);
};
})(jQuery);
jQuery(function() {
var read_button = function(class_names) {
var r = {
selected: false,
type: 0
};
for (var i=0; i < class_names.length; i++) {
if (class_names[i].indexOf('selected') == 0) {
r.selected = true;
}
if (class_names[i].indexOf('segment') == 0) {
r.segment = class_names[i].split('-')[1];
}
};
return r;
};
var determine_sort = function($buttons) {
var $selected = $buttons.parent().filter('[class*="selected"]');
return $selected.find('a').attr('data-value');
};
var determine_kind = function($buttons) {
var $selected = $buttons.parent().filter('[class*="selected"]');
return $selected.find('a').attr('data-value');
};
var $preferences = {
duration: 500,
adjustHeight: 'auto'
}
var $list = jQuery('.portfolio_items');
var $data = $list.clone();
var $controls = jQuery('.filter_portfolio');
$controls.each(function(i) {
var $control = jQuery(this);
var $buttons = $control.find('a');
$buttons.bind('click', function(e) {
var $button = jQuery(this);
var $button_container = $button.parent();
var button_properties = read_button($button_container.attr('class').split(' '));      
var selected = button_properties.selected;
var button_segment = button_properties.segment;
if (!selected) {
$buttons.parent().removeClass();
$button_container.addClass('selected');
var sorting_type = determine_sort($controls.eq(1).find('a'));
var sorting_kind = determine_kind($controls.eq(0).find('a'));
if (sorting_kind == 'all') {
var $filtered_data = $data.find('li');
} else {
var $filtered_data = $data.find('li.' + sorting_kind);
}
var $sorted_data = $filtered_data.sorted({
by: function(v) {
	return parseInt(jQuery(v).find('.count').text());
}
});
$list.quicksand($sorted_data, $preferences, function () {
	uplightbox();
	homethumbhover();
});

}
e.preventDefault();
});
}); 
});
}
});