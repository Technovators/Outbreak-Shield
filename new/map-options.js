(function(window, google, mapster) {
  
  mapster.MAP_OPTIONS = {
    center: {
      lat: 19,
      lng: 72
    },
    zoom: 2,
	minZoom: 2,
	maxZoom: 13,
    disableDefaultUI: false,
    scrollwheel: true,
    draggable: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControlOptions: {
      position: google.maps.ControlPosition.LEFT_BOTTOM,
      style: google.maps.ZoomControlStyle.DEFAULT
    },
    panControlOptions: {
      position: google.maps.ControlPosition.LEFT_BOTTOM
    },
    cluster: {
      options: {
        styles: [{
          url: 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/images/m2.png',
          height: 56,
          width: 55,
          textColor: '#F00',
          textSize: 18
        },{
          url: 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/images/m1.png',
          height: 56,
          width: 55
        }]
      }
    }
  };
  
}(window, google, window.Mapster || (window.Mapster = {})))