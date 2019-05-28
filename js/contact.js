function initMap() {
    var loc = {lat: 31.511398, lng: 74.344247};
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 8,
        center: loc
    });
}