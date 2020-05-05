ChartsRad();
setInterval(ChartsRad, 20000);

function ChartsRad() {
	$.ajax({
		type: 'POST',
		url: base_url + 'agroklimat/jsondata',
		dataType: 'json',
		success: function (data) {
			var name = '';
			var date = '';
			var suhu = '';
			var kelembaban = '';
			var curahhujan = '';
			var radiasi = '';
			var tekananudara = '';
			var kecepatanangin = '';
			var arahangin = '';
			var suhutanah = '';
			var kadarairtanah = '';
			var leafwetnes = '';
			var aux1 = '';
			var aux2 = '';
			var i;
			for (i = 0; i < data.length; i++) {
				name += data[i].pemilik;
				date += 'Update ' + moment(data[i].date).startOf('minute').fromNow();
				suhu += data[i].suhu;
				kelembaban += data[i].kelembaban;
				curahhujan += data[i].curah_hujan;
				radiasi += data[i].radiasi;
				tekananudara += data[i].tekanan_udara;
				kecepatanangin += data[i].kecepatan_angin;
				arahangin += data[i].arah_angin;
				suhutanah += data[i].suhu_tanah;
				kadarairtanah += data[i].soil_mosture;
				leafwetnes += data[i].leafwetnes;
				aux1 += data[i].aux1;
				aux2 += data[i].aux2;
			}

			$('#pemilik').html(name);
			$('#time').html(date);
			$('#suhu').html(suhu + " \xBAC");
			$('#kelembaban').html(kelembaban + " %");
			$('#curahhujan').html(curahhujan + " mm");
			$('#radiasi').html(radiasi + " W/m\xb2");
			$('#tekananudara').html(tekananudara + ' mbar');
			$('#kecepatanangin').html(kecepatanangin + ' m/s');
			$('#arahangin').html(arahangin + "\xBA");
			$('#suhutanah').html(suhutanah + "\xBAC");
			$('#kadarairtanah').html(kadarairtanah + " %");
			$('#leafwetnes').html(leafwetnes + " cbar");
			$('#aux1').html(aux1);
			$('#aux2').html(aux2);


			// SUHU
			if (suhu < 27) {
				$('#suhu1').css('color', 'DodgerBlue');
			} else if (suhu > 27) {
				$('#suhu1').css('color', 'red');
			}


			//CURAH HUJAN
			if (curahhujan == 0) {
				$('#curahhujan1').removeClass().addClass('fas fa-cloud faa-pulse animated fa-2x');
			} else if (curahhujan > 0 && curahhujan <= 1) {
				$('#curahhujan1').removeClass().addClass('fas fa-cloud-rain faa-pulse animated fa-2x');
			} else if (curahhujan > 1) {
				$('#curahhujan1').removeClass().addClass('fas fa-cloud-showers-heavy faa-pulse animated fa-2x');
			}

			// RADIASI


			if (radiasi > 0 && radiasi <= 100) {
				$('#radiasi1').css('color', 'rgba(255,153, 0, 0.5)');
			} else if (radiasi > 100) {
				$('#radiasi1').css('color', 'rgba(255,153, 0, 1)');
			}

			// Angin Kecepatan

			if (kecepatanangin > 0 && kecepatanangin <= 0) {
				$('#kecepatanangin1').removeClass().addClass('fas fa-angle-right faa-pulse animated fa-2x ');
			} else if (kecepatanangin > 0) {
				$('#kecepatanangin1').removeClass().addClass('fas fa-angle-double-right faa-pulse animated fa-2x');
			}

			// Arah Angin

			// N
			if (arahangin > 337.5) {
				$('#arahangin1').removeClass().addClass('fas fa-arrow-up  faa-float animated fa-2x');
			}
			// N
			else if (arahangin >= 0 && arahangin <= 22.5) {
				$('#arahangin1').removeClass().addClass('fas fa-arrow-up  faa-float animated fa-2x');
			}
			// NE
			else if (arahangin > 22.5 && arahangin <= 67.5) {
				$('#arahangin1').removeClass().addClass('fas fa-location-arrow fa-2x');
			}
			// E
			else if (arahangin > 67.5 && arahangin <= 112.5) {
				$('#arahangin1').removeClass().addClass('fas fa-arrow-right   faa-horizontal animated fa-2x ');
			}
			// SE
			else if (arahangin > 112.5 && arahangin <= 157.5) {
				$('#arahangin1').removeClass().addClass('fas fa-location-arrow fa-2x fa-rotate-90');
			}
			// S
			else if (arahangin > 157.5 && arahangin <= 202.5) {
				$('#arahangin1').removeClass().addClass('fas fa-arrow-down   faa-float animated fa-2x ');
			}
			// SW
			else if (arahangin > 202.5 && arahangin <= 247.5) {
				$('#arahangin1').removeClass().addClass('fas fa-location-arrow fa-2x fa-rotate-180');
			}
			// W
			else if (arahangin > 247.5 && arahangin <= 292.5) {
				$('#arahangin1').removeClass().addClass('fas fa-arrow-left faa-horizontal animated fa-2x ');
			}
			// NW
			else if (arahangin > 292.5 && arahangin <= 337.5) {
				$('#arahangin1').removeClass().addClass('fas fa-location-arrow fa-2x fa-rotate-270');
			}


			// SUHU TANAH
			if (suhutanah < 27) {
				$('#suhutanah1').css('color', 'DodgerBlue');
			} else if (suhutanah > 27) {
				$('#suhutanah1').css('color', 'red');
			}



		}

	})
}

