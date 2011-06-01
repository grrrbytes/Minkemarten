/*****************************************
 * Flickr API (in jQuery)
 * version: 1.0 (02/23/2009)
 * written for jQuery 1.3.2
 * by Ryan Heath (http://rpheath.com)
 *****************************************/
(function($) {
  // core extensions
  $.extend({
    // determines if an object is empty
    // $.isEmpty({})             // => true
    // $.isEmpty({user: 'rph'})  // => false
    isEmpty: function(obj) {
      for (var i in obj) { return false }
      return true
    }
  })
  
  // base flickr object
  $.flickr = {
    // the actual request url
    // (constructs extra params as they come in)
    url: function(method, params) {
      return 'http://api.flickr.com/services/rest/?method=' + method + '&format=json&extras=description' +
        '&api_key=' + $.flickr.settings.api_key + ($.isEmpty(params) ? '' : '&' + $.param(params)) + '&jsoncallback=?'
    },
    // translate plugin image sizes to flickr sizes
    translate: function(size) {
      switch(size) {
        default  : return '_b'   // medium
      }
    },
    // determines what to do with the links
    linkTag: function(photo, href) {
      if (href === undefined) href = ['http://www.flickr.com/photos', photo.owner, photo.id].join('/')      
      return '<a class="thumb blokje" href="' + href + '" title="' + photo.title + '"></a>'
    },

    // Generate needed galleriffic div
    gallerifficDiv: function(photo, href) {
	 if (href === undefined) href = ['http://www.flickr.com/photos', photo.owner, photo.id].join('/') 
	 return '<div class="caption">' +
			'<div class="download">' +
				'<a href="'+href+'">Download Original</a>' +
			'</div>' +
			'<div class="image-title">'+photo.title+'</div>' +
			'<div class="image-desc">'+photo.description._content+'</div>' +
		'</div>';
    }
  }
  
  // helper methods for thumbnails
  $.flickr.thumbnail = {
    src: function(photo, size) {
      if (size === undefined) size = $.flickr.translate($.flickr.settings.thumbnail_size)
      return 'http://farm' + photo.farm + '.static.flickr.com/' + photo.server + 
        '/' + photo.id + '_' + photo.secret + size + '.jpg'
    },
    imageTag: function(image) {
      return '<img src="' + image.src + '" alt="' + image.alt + '" />'
    }
  }
  
  // accepts a series of photos and constructs
  // the thumbnails that link back to Flickr
  $.flickr.thumbnail.process = function(photos,isGalleriffic) {
    var thumbnails = $.map(photos.photo, function(photo) {
      var image = new Image(), html = '', href = undefined

      image.src = $.flickr.thumbnail.src(photo)
      image.alt = photo.title

      var size = $.flickr.settings.link_to_size
      if (size != undefined && size.match(/sq|t|s|m|b|o/)) 
        href = $.flickr.thumbnail.src(photo, $.flickr.translate(size))
      
      html = $.flickr.linkTag(photo, href)
      div = $.flickr.gallerifficDiv(photo,href);
      if(isGalleriffic){
        return ['<li class="blokje">' + html + div + '</li>']
      } else {
	    return ['<li class="blokje">' + html + '</li>']
      }
    }).join("\n")
    
    return $('<ul class="thumbs blokkendoos noscript"></ul>').append(thumbnails)
  }
  
  // handles requesting and thumbnailing photos - if isGalleriffic then it will
  // display in format required for Galleriffic
  $.flickr.photos = function(method, options, isGalleriffic) {
    var options = $.extend($.flickr.settings, options || {}),
        elements = $.flickr.self, photos
    
    return elements.each(function() {
      $.getJSON($.flickr.url(method, options), function(data) {
        photos = (data.photos === undefined ? data.photoset : data.photos)
        elements.append($.flickr.thumbnail.process(photos,isGalleriffic))
        
        // Let the world know that the jQuery-Flickr photos have been loaded for the given elements
        $(elements).trigger('jQueryFlickrPhotosLoaded');
      })
    })
  }
  
  // namespace to hold available API methods
  // note: options available to each method match that of Flickr's docs
  $.flickr.methods = {
    // http://www.flickr.com/services/api/flickr.photos.getRecent.html
    photosGetRecent: function(options, isGallerific) {
      $.flickr.photos('flickr.photos.getRecent', options, isGallerific)
    },
    // http://www.flickr.com/services/api/flickr.photos.getContactsPublicPhotos.html
    photosGetContactsPublicPhotos: function(options, isGallerific) {
      $.flickr.photos('flickr.photos.getContactsPublicPhotos', options, isGallerific)
    },
    // http://www.flickr.com/services/api/flickr.photos.search.html
    photosSearch: function(options, isGallerific) {
      $.flickr.photos('flickr.photos.search', options, isGallerific)
    },
    // http://www.flickr.com/services/api/flickr.photosets.getPhotos.html
    photosetsGetPhotos: function(options, isGallerific) {
      $.flickr.photos('flickr.photosets.getPhotos', options, isGallerific)
    }
  }
  
  // the plugin
  $.fn.flickr = function(options) {
    $.flickr.self = $(this)
    
    // base configuration
    $.flickr.settings = $.extend({
      api_key: 'YOUR API KEY'
    }, options || {})
    
    return $.flickr.methods
  }
})(jQuery);