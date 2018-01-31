

<button onclick="getLocation()">Ажурирај локација</button>

<p id="demo"></p>
<p id="long"></p>
<p id="lat"></p>

<script>
var x = document.getElementById("demo");


setTimeout(function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}, 5000);

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;

    window.location.href = "lokacijadb1?w1=" + position.coords.latitude + "&w2=" + position.coords.longitude;

}
getLocation();
</script>




