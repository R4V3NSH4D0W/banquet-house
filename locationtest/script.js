if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showBanquets);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
  function showBanquets(position) {
    // get the user's latitude and longitude
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    
    // make an Ajax request to the server
    var request = new XMLHttpRequest();
    var url = "/banquets?lat=" + lat + "&lng=" + lng;
    request.open("GET", url, true);
    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        var banquets = JSON.parse(request.responseText);
        // display the list of banquets on the page using HTML and CSS
        // ...
      }
    };
    request.send();
  }
  function showBanquets(position) {
    // ...
    var banquetsList = document.getElementById("banquets");
    for (var i = 0; i < banquets.length; i++) {
      var li = document.createElement("li");
      var name = document.createTextNode(banquets[i].name);
      var address = document.createTextNode(banquets[i].address);
      li.appendChild(name);
      li.appendChild(document.createElement("br"));
      li.appendChild(address);
      banquetsList.appendChild(li);
    }
  }