
ChartsRad();
setInterval(ChartsRad, 20000);

function ChartsRad() {
	$.ajax({
		type: 'POST',
		url: base_url + 'spas/jsondata',
		dataType: 'json',
		success: function (data) {
			var name = '';
			var date = '';
			var curahhujan = '';
			var tinggimukaair = '';
			var kecepatanair = '';
			var i;
			for (i = 0; i < data.length; i++) {
				name += data[i].pemilik;
				date += 'Update ' + moment(data[i].date).startOf('minute').fromNow();
				curahhujan += data[i].curah_hujan;
				tinggimukaair += data[i].tinggi_muka_air;
				kecepatanair += data[i].kecepatan_air;
			}






			$('#pemilik').html(name);
			$('#time').html(date);
			$('#curahhujan').html(curahhujan + " mm");
			$('#tinggimukaair').html(tinggimukaair + " cm");
			$('#kecepatanair').html(kecepatanair + ' m/s');


			//CURAH HUJAN
			if (curahhujan == 0) {
				$('#curahhujan1').removeClass().addClass('fas fa-cloud faa-pulse animated fa-2x');
			} else if (curahhujan > 0 && curahhujan <= 1) {
				$('#curahhujan1').removeClass().addClass('fas fa-cloud-rain faa-pulse animated fa-2x');
			} else if (curahhujan > 1) {
				$('#curahhujan1').removeClass().addClass('fas fa-cloud-showers-heavy faa-pulse animated fa-2x');
			}


			// Angin Kecepatan

			if (kecepatanair > 0 && kecepatanair <= 0) {
				$('#kecepaatanair1').removeClass().addClass('fas fa-angle-right faa-pulse animated fa-2x ');
			} else if (kecepatanair > 0) {
				$('#kecepatanair1').removeClass().addClass('fas fa-angle-double-right faa-pulse animated fa-2x');
			}

		}


	})
}
