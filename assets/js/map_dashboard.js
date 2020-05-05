var map = L
	.map('map')
	.setView([
		-6.212594, 106.818498
	], 8);

mapLink = '<a href="http://meteonusantara.com">Meteo Nusantara Instrumen</a>';
L
	.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; ' + mapLink,
		maxZoom: 18
	})
	.addTo(map);

var myFeatureGroup = L
	.featureGroup()
	.addTo(map)
	.on("click", groupClick);
var mapMarker;

$.getJSON(base_url + "/Get/maps", function (data) {
	$.each(data, function (i, field) {
		var lat = parseFloat(data[i].latitude);
		var long = parseFloat(data[i].longitude);

		mapMarker = L
			.marker([lat, long])
			.addTo(myFeatureGroup)
			.bindPopup(
				"Aws Name : " + data[i].nama_device + "</br>Latest Data : " + data[i].date
			);

		mapMarker.id = data[i].id_device;

	});

});

function groupClick(event) { }
