	var x = document.getElementById("localizacion");

	function getLocation() {
	    if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } else {
	        x.innerHTML = "La localizacion no es soportada por este navegador.";
	    }
	}

	function showPosition(position) {
	    x.innerHTML = "Latitude: " + position.coords.latitude +
	    "<br>Longitude: " + position.coords.longitude;
	}
