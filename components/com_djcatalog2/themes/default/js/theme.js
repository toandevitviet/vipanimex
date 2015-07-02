/**
 * @version 3.x
 * @package DJ-Catalog2
 * @copyright Copyright (C) 2013 DJ-Extensions.com, All rights reserved.
 * @license DJ-Extensions.com Proprietary Use License
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Michał Olczyk michal.olczyk@design-joomla.eu
 *
 */

function DJCatMatchModules(className, setLineHeight, reset) {
	var maxHeight = 0;
	var divs = null;
	if (typeof(className) == 'string') {
		divs = document.id(document.body).getElements(className);
	} else {
		divs = className;
	}
	if (divs.length > 1) {
		
		if (reset == true) {
			divs.setStyle('height', '');
		}
		
		divs.each(function(element) {
			//maxHeight = Math.max(maxHeight, parseInt(element.getStyle('height')));
			maxHeight = Math.max(maxHeight, parseInt(element.getSize().y));
		});
		
		divs.setStyle('height', maxHeight);
		if (setLineHeight) {
			divs.setStyle('line-height', maxHeight);
		}
	}
}

this.DJCatImageSwitcher = function (){
	var mainimagelink = document.id('djc_mainimagelink');
	var mainimage = document.id('djc_mainimage');
	var thumbs = document.id('djc_thumbnails') ? document.id('djc_thumbnails').getElements('img') : null;
	var thumblinks = document.id('djc_thumbnails') ? document.id('djc_thumbnails').getElements('a') : null;
	
	if(mainimagelink && mainimage) {
		mainimagelink.removeEvents('click').addEvent('click', function(evt) {
			var rel = mainimagelink.rel;
			document.id(rel).fireEvent('click', document.id(rel));

			if(!/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)) {
				return false;
			}
			return true;
		});
	}
	
	if (!mainimage || !mainimagelink || !thumblinks || !thumbs) return false;
	
	thumblinks.each(function(thumblink,index){
		var fx = new Fx.Tween(mainimage, {link: 'cancel', duration: 200});

		thumblink.addEvent('click',function(event){
			event.preventDefault();
			//new Event(element).stop();
			/*
			mainimage.onload = function() {
				fx.start('opacity',0,1);
			};
			*/
			var img = new Image();
			img.onload = function() {
				fx.start('opacity',0,1);
			};
			
			fx.start('opacity',1,0).chain(function(){
				mainimagelink.href = thumblink.href;
				mainimagelink.title = thumblink.title;
				mainimagelink.rel = 'djc_lb_'+index;
				img.src = thumblink.rel;
				mainimage.src = img.src;
				mainimage.alt = thumblink.title;
			});
			return false;
		});
	});
}; 

window.addEvent('domready', function(){
	DJCatImageSwitcher();
	
	// contact form handler
	var contactform = document.id('contactform');
	var makesure = document.id('djc_contact_form');
	var contactformButton = document.id('djc_contact_form_button');
	var contactformButtonClose = document.id('djc_contact_form_button_close');
	if (contactform && makesure) {
		var djc_formslider = new Fx.Slide('contactform',{
			duration: 200,
			resetHeight: true
		});
		
		if (window.location.hash == 'contactform' || window.location.hash == '#contactform') {
			djc_formslider.slideIn().chain(function(){
				if (djc_formslider.open == true) {
					var scrollTo = new Fx.Scroll(window).toElement('contactform');
				}
			});
		} else if (contactformButton) {
			djc_formslider.hide();
		}
		if (contactformButton) {
			contactformButton.addEvent('click', function(event) {
				event.stop();
				djc_formslider.slideIn().chain(function(){
					if (djc_formslider.open == true) {
						var scrollTo = new Fx.Scroll(window).toElement('contactform');
					}
				});
			});
		}
		if (contactformButtonClose) {
			contactformButtonClose.addEvent('click', function(event){
				event.stop();
				djc_formslider.slideOut().chain(function(){
					if (djc_formslider.open == false) {
						var scrollTo = new Fx.Scroll(window).toElement('djcatalog');
					}
				});
			});
		}
	}
});

var DJCatMatchBackgrounds = function(){
	
	//DJCatMatchModules('.djc_subcategory_bg', false, true);
	DJCatMatchModules('.djc_thumbnail', true, true);
	
	if (document.id(document.body).getElements('.djc_subcategory_row')) {
		document.id(document.body).getElements('.djc_subcategory_row').each(function(row, index){
			var elements = row.getElements('.djc_subcategory_bg');
			DJCatMatchModules(elements, false, true);
		});
	}
	
	if (document.id(document.body).getElements('.djc_item_row')) {
		document.id(document.body).getElements('.djc_item_row').each(function(row, index){
			var elements = row.getElements('.djc_item_bg');
			DJCatMatchModules(elements, false, true);
		});
	}
};

window.addEvent('load', function() {
	DJCatMatchBackgrounds();
	
	var djcatpagebreak_acc = new Fx.Accordion('.djc_tabs .accordion-toggle',
			'.djc_tabs .accordion-body', {
				alwaysHide : false,
				display : 0,
				duration : 100,
				onActive : function(toggler, element) {
					toggler.addClass('active');
					element.addClass('in');
				},
				onBackground : function(toggler, element) {
					toggler.removeClass('active');
					element.removeClass('in');
				}
			});
	var djcatpagebreak_tab = new Fx.Accordion('.djc_tabs li.nav-toggler',
			'.djc_tabs div.tab-pane', {
				alwaysHide : true,
				display : 0,
				duration : 150,
				onActive : function(toggler, element) {
					toggler.addClass('active');
					element.addClass('active');
				},
				onBackground : function(toggler, element) {
					toggler.removeClass('active');
					element.removeClass('active');
				}
			});
});

window.addEvent('resize', function(){
	DJCatMatchBackgrounds();
});

