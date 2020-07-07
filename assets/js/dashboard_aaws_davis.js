ChartsRad();
setInterval(ChartsRad, 20000);

function ChartsRad() {
	$.ajax({
		type: 'POST',
		url: base_url + 'aaws_davis/jsondata',
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
			var ultraviolet = '';
			var et = '';
			var suhutanah1 = '';
			var suhutanah2 = '';
			var suhutanah3 = '';
			var suhutanah4 = '';
			var soilmosture1 = '';
			var soilmosture2 = '';
			var soilmosture3 = '';
			var soilmosture4 = '';
			var leafwetnes1 = '';
			var leafwetnes2 = '';
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
				ultraviolet += data[i].ultraviolet;
				et += data[i].et;
				suhutanah1 += data[i].suhu_tanah1;
				suhutanah2 += data[i].suhu_tanah2;
				suhutanah3 += data[i].suhu_tanah3;
				suhutanah4 += data[i].suhu_tanah4;
				soilmosture1 += data[i].soil_mosture1;
				soilmosture2 += data[i].soil_mosture2;
				soilmosture3 += data[i].soil_mosture3;
				soilmosture4 += data[i].soil_mosture4;
				leafwetnes1 += data[i].leafwetnes1;
				leafwetnes2 += data[i].leafwetnes2;
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
			$('#ultraviolet').html(ultraviolet + "\xBA");
			$('#et').html(et + "\xBA");
			$('#suhutanah1').html(suhutanah1+ "\xBAC");
			$('#suhutanah2').html(suhutanah2 + "\xBAC");
			$('#suhutanah3').html(suhutanah3 + "\xBAC");
			$('#suhutanah4').html(suhutanah4 + "\xBAC");
			$('#soilmosture1').html(soilmosture1 + " %");
			$('#soilmosture2').html(soilmosture2 + " %");
			$('#soilmosture3').html(soilmosture3 + " %");
			$('#soilmosture4').html(soilmosture4 + " %");
			$('#leafwetnes1').html(leafwetnes1 + " cbar");
			$('#leafwetnes2').html(leafwetnes2 + " cbar");


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
			if (suhutanah1 < 27) {
				$('#suhutanah11').css('color', 'DodgerBlue');
			} else if (suhutanah1 > 27) {
				$('#suhutanah11').css('color', 'red');
			}

			if (suhutanah2 < 27) {
				$('#suhutanah12').css('color', 'DodgerBlue');
			} else if (suhutanah2 > 27) {
				$('#suhutanah12').css('color', 'red');
			}

			if (suhutanah3 < 27) {
				$('#suhutanah13').css('color', 'DodgerBlue');
			} else if (suhutanah3 > 27) {
				$('#suhutanah13').css('color', 'red');
			}

			if (suhutanah4 < 27) {
				$('#suhutanah14').css('color', 'DodgerBlue');
			} else if (suhutanah4 > 27) {
				$('#suhutanah14').css('color', 'red');
			}



		}

	})
}

