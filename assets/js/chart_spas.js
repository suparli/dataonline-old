Chart.defaults.global.defaultFontFamily = 'Nunito',
	'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",' +
	'Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
	// *     example: number_format(1234.56, 2, ',', ' ');
	// *     return: '1 234,56'
	number = (number + '')
		.replace(',', '')
		.replace(' ', '');
	var n = !isFinite(+number) ?
		0 :
		+number,
		prec = !isFinite(+decimals) ?
			0 :
			Math.abs(decimals),
		sep = (typeof thousands_sep === 'undefined') ?
			',' :
			thousands_sep,
		dec = (typeof dec_point === 'undefined') ?
			'.' :
			dec_point,
		s = '',
		toFixedFix = function (n, prec) {
			var k = Math.pow(10, prec);
			return '' + Math.round(n * k) / k;
		};
	// Fix for IE parseFloat(0.55).toFixed(0) = 0;
	s = (
		prec ?
			toFixedFix(n, prec) :
			'' + Math.round(n)
	).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || '').length < prec) {
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}

$.ajax({
	type: 'POST',
	url: base_url + 'spas/jsonChart',
	dataType: 'json',
	success: function (data) {
		let time = [];
		let curahhujan = [];
		let tinggimukaair = [];
		let kecepatanair = [];
		let i;
		for (i = 0; i < data.length; i++) {
			time.push(data[i].time);
			curahhujan.push(data[i].curah_hujan);
			tinggimukaair.push(data[i].tinggi_muka_air);
			kecepatanair.push(data[i].kecepatan_air);
		}

		// Curah Hujan
		var chartHujan = document.getElementById("chartHujan");
		var myChartHujan = new Chart(chartHujan, {
			type: 'bar',
			data: {
				labels: time,
				datasets: [{
					label: "Curah Hujan ",
					backgroundColor: "#4e73df",
					hoverBackgroundColor: "#2e59d9",
					borderColor: "#4e73df",
					data: curahhujan
				}]
			},
			options: {
				maintainAspectRatio: false,

				scales: {
					xAxes: [{
						time: {
							unit: 'month'
						},
						gridLines: {
							display: false,
							drawBorder: false
						},
						ticks: {
							maxTicksLimit: 6
						},
						maxBarThickness: 25
					}],
					yAxes: [{
						ticks: {
							maxTicksLimit: 5,
							padding: 10,
							// Include a dollar sign in the ticks
							callback: function (value, index, values) {
								return value + " mm";
							}
						},
						gridLines: {
							color: "rgb(234, 236, 244)",
							zeroLineColor: "rgb(234, 236, 244)",
							drawBorder: false,
							borderDash: [2],
							zeroLineBorderDash: [2]
						}
					}]
				},
				legend: {
					display: false
				},
				tooltips: {
					titleMarginBottom: 10,
					titleFontColor: '#6e707e',
					titleFontSize: 14,
					backgroundColor: "rgb(255,255,255)",
					bodyFontColor: "#858796",
					borderColor: '#dddfeb',
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					displayColors: false,
					caretPadding: 10,
					callbacks: {
						label: function (tooltipItem, chart) {
							var datasetLabel = chart
								.datasets[tooltipItem.datasetIndex]
								.label || '';
							return datasetLabel + ': ' + tooltipItem.yLabel + ' mm';
						}
					}
				}
			}
		});

		// Tinggi Muka Air
		var chartTinggiMukaAir = document.getElementById("chartTinggiMukaAir");
		var mychartTinggiMukaAir = new Chart(chartTinggiMukaAir, {
			type: 'line',
			data: {
				labels: time,
				datasets: [{
					label: "Tinggi Muka Air",
					lineTension: 0.3,
					backgroundColor: "rgba(78, 115, 223, 0.05)",
					borderColor: "rgba(78, 115, 223, 1)",
					pointRadius: 0,
					pointBackgroundColor: "rgba(78, 115, 223, 1)",
					pointBorderColor: "rgba(78, 115, 223, 1)",
					pointHoverRadius: 3,
					pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
					pointHoverBorderColor: "rgba(78, 115, 223, 1)",
					pointHitRadius: 10,
					pointBorderWidth: 2,
					data: tinggimukaair
				}]
			},
			options: {
				maintainAspectRatio: false,
				layout: {
					padding: {
						left: 10,
						right: 25,
						top: 25,
						bottom: 0
					}
				},
				scales: {
					xAxes: [{
						time: {
							unit: 'date'
						},
						gridLines: {
							display: false,
							drawBorder: false
						},
						ticks: {
							maxTicksLimit: 7
						}
					}],
					yAxes: [{

						ticks: {
							maxTicksLimit: 3,
							padding: 10,
							// Include a dollar sign in the ticks
							callback: function (value, index, values) {
								return value + ' Cm';
							}
						},
						gridLines: {
							color: "rgb(234, 236, 244)",
							zeroLineColor: "rgb(234, 236, 244)",
							drawBorder: false,
							borderDash: [2],
							zeroLineBorderDash: [2]
						}
					}]
				},
				legend: {
					display: false
				},
				tooltips: {
					backgroundColor: "rgb(255,255,255)",
					bodyFontColor: "#858796",
					titleMarginBottom: 10,
					titleFontColor: '#6e707e',
					titleFontSize: 14,
					borderColor: '#dddfeb',
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					displayColors: false,
					intersect: false,
					mode: 'index',
					caretPadding: 10,
					callbacks: {
						label: function (tooltipItem, chart) {
							var datasetLabel = chart
								.datasets[tooltipItem.datasetIndex]
								.label || '';
							return datasetLabel + ': ' + tooltipItem.yLabel + ' Cm';
						}
					}
				}
			}
		});


		// Kecepatan Air
		var chartKecepatanAir = document.getElementById("chartKecepatanAir");
		var mychartKecepatanAir = new Chart(chartKecepatanAir, {
			type: 'line',
			data: {
				labels: time,
				datasets: [{
					label: "Kecepatan Air",
					lineTension: 0.3,
					backgroundColor: "rgba(78, 115, 223, 0.05)",
					borderColor: "rgba(78, 115, 223, 1)",
					pointRadius: 0,
					pointBackgroundColor: "rgba(78, 115, 223, 1)",
					pointBorderColor: "rgba(78, 115, 223, 1)",
					pointHoverRadius: 3,
					pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
					pointHoverBorderColor: "rgba(78, 115, 223, 1)",
					pointHitRadius: 10,
					pointBorderWidth: 2,
					data: kecepatanair
				}]
			},
			options: {
				maintainAspectRatio: false,

				scales: {
					xAxes: [{
						time: {
							unit: 'date'
						},
						gridLines: {
							display: false,
							drawBorder: false
						},
						ticks: {
							maxTicksLimit: 7
						}
					}],
					yAxes: [{

						ticks: {
							maxTicksLimit: 5,
							padding: 10,
							// Include a dollar sign in the ticks
							callback: function (value, index, values) {
								return value + " m/s";
							}
						},
						gridLines: {
							color: "rgb(234, 236, 244)",
							zeroLineColor: "rgb(234, 236, 244)",
							drawBorder: false,
							borderDash: [2],
							zeroLineBorderDash: [2]
						}
					}]
				},
				legend: {
					display: false
				},
				tooltips: {
					backgroundColor: "rgb(255,255,255)",
					bodyFontColor: "#858796",
					titleMarginBottom: 10,
					titleFontColor: '#6e707e',
					titleFontSize: 14,
					borderColor: '#dddfeb',
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					displayColors: false,
					intersect: false,
					mode: 'index',
					caretPadding: 10,
					callbacks: {
						label: function (tooltipItem, chart) {
							var datasetLabel = chart
								.datasets[tooltipItem.datasetIndex]
								.label || '';
							return datasetLabel + ': ' + tooltipItem.yLabel + " m/s";
						}
					}
				}
			}
		});



	}
});


