$.getJSON(base_url + "/spas/jsonMap", function (data) {
	$.each(data, function (i, field) {
		var lat = parseFloat(data[i].latitude);
		var long = parseFloat(data[i].longitude);
		let name = data[i].nama_device;


		var map = L.map('map').setView([lat, long], 10);

		var marker = L.marker([lat, long]).addTo(map);
		marker.bindPopup(name).openPopup();

		circle = L.circle([lat, long], {
			color: 'red',
			fillColor: '#f03',
			fillOpacity: 0.5,
			radius: 1000
		}).addTo(map);


		ACCESS_TOKEN = 'pk.eyJ1Ijoic3VwYXJsaTEyMDgiLCJhIjoiY2s1cWhiem8yMDJndjNnbXNkMmUxbHNucSJ9.v2_nGBr8kLD9SIOUfK9Tsg'; L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + ACCESS_TOKEN, {
			attribution: '<a href="http://meteonusantara.com">Meteo Nusantara Instrumen</a>',
			id: 'mapbox.streets'
		}).addTo(map);
	});



});
