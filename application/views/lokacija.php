<?php $this->load->view('vozac'); ?>

<button onclick="getLocation()">Ажурирај локација</button>

<p id="demo"></p>
<p id="long"></p>
<p id="lat"></p>

<script>
var x = document.getElementById("demo");


function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;

    window.location.href = "lokacijadb?w1=" + position.coords.latitude + "&w2=" + position.coords.longitude;


}
</script>


<?php $this->load->view('footer'); ?>