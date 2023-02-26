var map = L.map("map").setView([27.6588, 85.3247], 15);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
  maxZoom: 18,
}).addTo(map);

var marker = L.marker([27.6588, 85.3247], {
  draggable: true,
}).addTo(map);
marker.on("dragend", function (event) {
  var marker = event.target;
  var position = marker.getLatLng();
  document.getElementById("latitude").value = position.lat;
  document.getElementById("longitude").value = position.lng;
  updateAddress();
});

// Add search control
var searchControl = L.Control.geocoder({
  placeholder: "Search for an address...",
  defaultMarkGeocode: false,
  collapsed: false,
}).addTo(map);

function updateAddress() {
  var latlng = marker.getLatLng();
  var geocoder = L.Control.Geocoder.nominatim();
  geocoder.reverse(
    latlng,
    map.options.crs.scale(map.getZoom()),
    function (results) {
      var r = results[0];
      if (r) {
        document.getElementById("address").value =
          r.name + ", " + r.city + ", " + r.state + ", " + r.country;
      }
    }
  );
}

// Handle geocode event
searchControl.on("markgeocode", function (e) {
  marker.setLatLng(e.geocode.center);
  map.setView(e.geocode.center, 15);
  document.getElementById("latitude").value = e.geocode.center.lat;
  document.getElementById("longitude").value = e.geocode.center.lng;
  document.getElementById("address").value = e.geocode.name;
});
