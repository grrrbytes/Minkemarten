$(document).ready(function() {  
	// Initialize Advanced Galleriffic Gallery
	var gallery = $('#gallery-nav').galleriffic({
		numThumbs: 100,
		imageContainerSel: '#portfolio',
		captionContainerSel: '#caption',
		loadingContainerSel: '#loader',
		enableBottomPager: false,
		renderSSControls: false,
		renderNavControls: false,
		enableHistory: true,
		defaultTransitionDuration: 200,
		onSlideChange: function(prevIndex, nextIndex) {
			this.find('ul.blokkendoos').children()
				.eq(prevIndex).fadeTo('fast', 1.0).end()
				.eq(nextIndex).fadeTo('fast', 1.0);
		},
		onPageTransitionOut: function(callback) {
			this.fadeTo('fast', 1.0, callback);
		},
		onPageTransitionIn: function() {
			this.fadeTo('fast', 1.0);
		}
	});
	
/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

// PageLoad function
// This function is called when:
// 1. after calling $.historyInit();
// 2. after calling $.historyLoad();
// 3. after pushing "Go Back" button of a browser
function pageload(hash) {
	// alert("pageload: " + hash);
	// hash doesn't contain the first # character.
	if(hash) {
		$.galleriffic.gotoImage(hash);
	} else {
		gallery.gotoIndex(0);
	}
}

// Initialize history plugin.
// The callback is called at once by present location.hash. 
$.historyInit(pageload);

// set onlick event for buttons using the jQuery 1.3 live method
$("a[rel='history']").live('click', function(e) {
	if (e.button != 0) return true;
	
	var hash = this.href;
	hash = hash.replace(/^.*#/, '');

	// moves to a new page. 
	// pageload is called at once. 
	// hash don't contain "#", "?"
	$.historyLoad(hash);

	return false;
});

/****************************************************************************************/
});