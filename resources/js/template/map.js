 // pickup map
  var locations = [
    ['Sausalito', 37.8590937, -122.4852507, 'assets/img/delivery-location.png'],
    ['Sacramento', 38.5815719, -121.4943996, 'assets/img/pick-location.jpg'],
  ];
  var map = new google.maps.Map(document.getElementById('pickupmap'), {
    zoom: 6,
    center: {
      lat: 37.8590937,
      lng: -122.4852507
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var infowindow = new google.maps.InfoWindow();
  var marker, i;
  for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map,
      icon: locations[i][3]
    });
    google.maps.event.addListener(marker, 'click', (function (marker, i) {
      return function () {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
  var line = new google.maps.Polyline({
    path: [new google.maps.LatLng(37.8590937, -122.4852507), new google.maps.LatLng(38.5815719, -121.4943996)],
    strokeColor: "#00a000",
    strokeOpacity: 1.0,
    strokeWeight: 5,
    geodesic: true,
    map: map
  });
  
  var map = new google.maps.Map(document.getElementById('pickupmap2'), {
    zoom: 8,
    center: {
      lat: 37.8590937,
      lng: -122.4852507
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var infowindow = new google.maps.InfoWindow();
  var marker, i;
  for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map,
      icon: locations[i][3]
    });
    google.maps.event.addListener(marker, 'click', (function (marker, i) {
      return function () {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
  var line = new google.maps.Polyline({
    path: [new google.maps.LatLng(37.8590937, -122.4852507), new google.maps.LatLng(38.5815719, -121.4943996)],
    strokeColor: "#00a000",
    strokeOpacity: 1.0,
    strokeWeight: 5,
    geodesic: true,
    map: map
  });