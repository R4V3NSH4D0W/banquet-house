let searchBtn = document.querySelector("#search-btn");
let searchBar = document.querySelector(".search-bar-container");
let formBtn = document.querySelector("#login-btn");
let loginForm = document.querySelector(".login-form-container");
let formClose = document.querySelector("#form-close");
let menu = document.querySelector("#menu-bar");
let navbar = document.querySelector(".navbar");
let videoBtn = document.querySelectorAll(".vid-btn");

window.onscroll = () => {
  searchBtn.classList.remove("fa-times");
  searchBar.classList.remove("active");
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
  loginForm.classList.remove("active");
};

menu.addEventListener("click", () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
});

searchBtn.addEventListener("click", () => {
  searchBtn.classList.toggle("fa-times");
  searchBar.classList.toggle("active");
});

// formBtn.addEventListener('click', () =>{
//     loginForm.classList.add('active');
// });

// formClose.addEventListener('click', () =>{
//     loginForm.classList.remove('active');
// });

videoBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".controls .active").classList.remove("active");
    btn.classList.add("active");
    let src = btn.getAttribute("data-src");
    document.querySelector("#video-slider").src = src;
  });
});

var swiper = new Swiper(".review-slider", {
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".brand-slider", {
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});

// search script
const searchInput = document.querySelector("#search-bar");

function search() {
  var query = document.getElementById("search-bar").value;
  var results = document.getElementById("search-results");
  results.innerHTML = "";
  if (query.trim() !== "") {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "search.php?q=" + encodeURIComponent(query));
    xhr.onload = function () {
      if (xhr.status === 200) {
        results.innerHTML = xhr.responseText;
        results.scrollIntoView({
          behavior: "smooth",
        });
      } else {
        console.log("Error: " + xhr.status);
      }
    };
    xhr.send();
  }

  document.querySelector("form").addEventListener("submit", function (event) {
    event.preventDefault();
  });
}
searchInput.addEventListener("keydown", function (event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    search();
  }
});
// map script
var mymap = L.map("map").setView([27.7172, 85.324], 10);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 18,
  attribution:
    'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: "mapbox/streets-v11",
  tileSize: 512,
  zoomOffset: -1,
}).addTo(mymap);

var markers = L.markerClusterGroup({
  iconCreateFunction: function (cluster) {
    return L.divIcon({
      html: "<div><span>" + cluster.getChildCount() + "</span></div>",
      className: "mycluster",
      iconSize: L.point(40, 40),
    });
  },
}).addTo(mymap);

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    var locations = JSON.parse(this.responseText);
    for (var i = 0; i < locations.length; i++) {
      var marker = L.marker([
        locations[i].latitude,
        locations[i].longitude,
      ]).bindPopup(locations[i].name);
      markers.addLayer(marker);
    }
    mymap.addLayer(markers);
  }
};
xhttp.open("GET", "get_locations.php", true);
xhttp.send();

var mapContainer = document.getElementById("map");

mapContainer.addEventListener("click", function () {
  mymap.scrollWheelZoom.enable();
});

mapContainer.addEventListener("mouseout", function () {
  mymap.scrollWheelZoom.disable();
});
// near by banquet location
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(showBanquets);
} else {
  alert("Geolocation is not supported by this browser.");
}

function showBanquets(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("banquets").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "nearbybanquet.php?lat=" + lat + "&lng=" + lng, true);
  xmlhttp.send();
}
