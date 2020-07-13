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

function arah_angin (value) {
	var arah ;
	// N
	if (value > 337.5) {
		arah =  value + '\xBA U';
	}
	// N
	else if (value >= 0 && value <= 22.5) {
		arah = value + '\xBA U';
	}
	// NE
	else if (value > 22.5 && value <= 67.5) {
		arah =  value + '\xBA TL';
	}
	// E
	else if (value > 67.5 && value <= 112.5) {
		arah =  value + '\xBA T';
	}
	// SE
	else if (value > 112.5 && value <= 157.5) {
		arah =  value + '\xBA TG';
	}
	// S
	else if (value > 157.5 && value <= 202.5) {
		arah =  value + '\xBA S';
	}
	// SW
	else if (value > 202.5 && value <= 247.5) {
		arah =  value + '\xBA BD';
	}
	// W
	else if (value > 247.5 && value <= 292.5) {
		arah =  value + '\xBA B';
	}
	// NW
	else if (value > 292.5 && value <= 337.5) {
		arah =  value + '\xBA BL';
	}

	return arah ;
}

$.ajax({
	type: 'POST',
	url: base_url + 'agroklimat/jsonChart',
	dataType: 'json',
	success: function (data) {
		let time = [];
		let suhu = [];
		let kelembaban = [];
		let curahHujan = [];
		let radiasi = [];
		let tekananUdara = [];
		let kecepatanAngin = [];
		let arahAngin = [];
		let soilMosture = [];
		let suhuTanah = [];
		let leafWetnes = [];
		let i;
		for (i = 0; i < data.length; i++) {
			time.push(data[i].time);
			suhu.push(data[i].suhu);
			kelembaban.push(data[i].kelembaban);
			curahHujan.push(data[i].curah_hujan);
			radiasi.push(data[i].radiasi);
			tekananUdara.push(data[i].tekanan_udara);
			kecepatanAngin.push(data[i].kecepatan_angin);
			arahAngin.push(data[i].arah_angin);
			soilMosture.push(data[i].soil_mosture);
			suhuTanah.push(data[i].suhu_tanah);
			leafWetnes.push(data[i].leafwetnes);


		}

		// Suhu
		var chartSuhu = document.getElementById("chartSuhu");
		var myChartSuhu = new Chart(chartSuhu, {
			type: 'line',
			data: {
				labels: time,
				datasets: [{
					label1: "Suhu",
					label: "Suhu",
					lineTension: 0.5,
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
					yAxisID: "y-axis-1",
					data: suhu
				}, {
					label2: "Kelembaban",
					label: "Kelembaban",
					lineTension: 0.5,
					backgroundColor: "rgba(229, 236, 118, 0.05)",
					borderColor: "rgba(229, 236, 118, 1)",
					pointRadius: 0,
					pointBackgroundColor: "rgba(229, 236, 118, 1)",
					pointBorderColor: "rgba(229, 236, 118, 1)",
					pointHoverRadius: 3,
					pointHoverBackgroundColor: "rgba(229, 236, 118, 1)",
					pointHoverBorderColor: "rgba(229, 236, 118, 1)",
					pointHitRadius: 10,
					pointBorderWidth: 2,
					yAxisID: "y-axis-2",
					data: kelembaban
				}]
			},
			options: {
				maintainAspectRatio: false,

				scales: {
					xAxes: [{
						time: {
							unit: 'time'
						},
						gridLines: {
							display: true,
							borderDash: [2],
							zeroLineBorderDash: [2],
							drawBorder: false
						},
						ticks: {
							maxTicksLimit: 7
						}
					}],
					yAxes: [{
						ticks: {

							maxTicksLimit: 10,

							callback: function (value) {
								return value + " \xBAC";
							}
						},

						type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
						display: true,
						position: "left",
						id: "y-axis-1",
						gridLines: {
							color: "rgb(234, 236, 244)",
							zeroLineColor: "rgb(234, 236, 244)",
							drawBorder: false,
							borderDash: [2],
							zeroLineBorderDash: [2]
						}
					}, {
						ticks: {
							maxTicksLimit: 5,
							callback: function (value, index, values) {
								return number_format(value) + ' %';
							}
						},

						type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
						display: true,
						position: "right",
						id: "y-axis-2",

						// grid line settings
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
					display: true,
					position: 'top',
					labels: {
						boxWidth: 2,
						usePointStyle: true
					}

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
						label: function (tooltipItem, charts) {
							var datasetLabel1 = charts
								.datasets[tooltipItem.datasetIndex]
								.label1 || '';
							var datasetLabel2 = charts
								.datasets[tooltipItem.datasetIndex]
								.label2 || '';

							if (datasetLabel1) {
								return datasetLabel1 + ': ' + tooltipItem.yLabel + " \xBAC";
							}
							if (datasetLabel2) {
								return datasetLabel2 + ': ' + number_format(tooltipItem.yLabel) + " %";
							}

						}

					}

				}
			}
		});

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
					data: curahHujan
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

		// Radiasi
		var chartRadiasi = document.getElementById("radiasiChart");
		var myChartRadiasi = new Chart(chartRadiasi, {
			type: 'line',
			data: {
				labels: time,
				datasets: [{
					label: "Radiasi",
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
					data: radiasi
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
								return number_format(value) + " W/m\xb2";
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
							return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + " W/m\xb2";
						}
					}
				}
			}
		});

		// Tekanan Udara
		var chartTekanan = document.getElementById("tekananChart");
		var myChartTekanan = new Chart(chartTekanan, {
			type: 'line',
			data: {
				labels: time,
				datasets: [{
					label: "Suhu",
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
					data: tekananUdara
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
								return number_format(value) + ' mbar';
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
							return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' mbar';
						}
					}
				}
			}
		});

		// Kecepatan Angin
		var chartKecepatan = document.getElementById("kecepatananginChart");
		var myChartKecepatan = new Chart(chartKecepatan, {
			type: 'line',
			data: {
				labels: time,
				datasets: [{
					label: "Kecepatan Angin",
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
					data: kecepatanAngin
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
								return value + ' m/s';
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
							return datasetLabel + ': ' + tooltipItem.yLabel + ' m/s';
						}
					}
				}
			}
		});

		// Arah Angin
		var chartAngin = document.getElementById("arahanginChart");
		var myChartAngin = new Chart(chartAngin, {
			type: 'bar',
			data: {
				labels: time,
				datasets: [{
					label: "Arah Angin",
					backgroundColor: "#4e73df",
					hoverBackgroundColor: "#2e59d9",
					borderColor: "#4e73df",
					data: arahAngin
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
							stepSize: 90,
							maxTicksLimit: 8,
							min :0 ,
							max : 360 ,
							padding: 10,
							callback: function (value, index, values) {
								return arah_angin(value);
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
							return datasetLabel + ': ' + arah_angin(tooltipItem.yLabel);
						}
					}
				}
			}
		});

		// Soil
		var chartSoil = document.getElementById("soilChart");
		var myChartSoil = new Chart(chartSoil, {
			type: 'line',
			data: {
				labels: time,
				datasets: [
					{
						label1: "Suhu",
						lineTension: 0.5,
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
						yAxisID: "y-axis-1",
						data: suhuTanah
					}, {
						label2: "Kelembaban",
						lineTension: 0.5,
						backgroundColor: "rgba(229, 236, 118, 0.05)",
						borderColor: "rgba(229, 236, 118, 1)",
						pointRadius: 0,
						pointBackgroundColor: "rgba(229, 236, 118, 1)",
						pointBorderColor: "rgba(229, 236, 118, 1)",
						pointHoverRadius: 3,
						pointHoverBackgroundColor: "rgba(229, 236, 118, 1)",
						pointHoverBorderColor: "rgba(229, 236, 118, 1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						yAxisID: "y-axis-2",
						data: soilMosture
					}
				]
			},
			options: {
				maintainAspectRatio: false,

				scales: {
					xAxes: [
						{
							time: {
								unit: 'time'
							},
							gridLines: {
								display: true,
								borderDash: [2],
								zeroLineBorderDash: [2],
								drawBorder: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}
					],
					yAxes: [
						{
							ticks: {

								maxTicksLimit: 10,

								callback: function (value) {
									return value + " \xBAC";
								}
							},

							type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
							display: true,
							position: "left",
							id: "y-axis-1",
							gridLines: {
								color: "rgb(234, 236, 244)",
								zeroLineColor: "rgb(234, 236, 244)",
								drawBorder: false,
								borderDash: [2],
								zeroLineBorderDash: [2]
							}
						}, {
							ticks: {
								maxTicksLimit: 5,
								callback: function (value, index, values) {
									return number_format(value) + ' %';
								}
							},

							type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
							display: true,
							position: "right",
							id: "y-axis-2",

							// grid line settings
							gridLines: {
								color: "rgb(234, 236, 244)",
								zeroLineColor: "rgb(234, 236, 244)",
								drawBorder: false,
								borderDash: [2],
								zeroLineBorderDash: [2]
							}
						}
					]
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
						label: function (tooltipItem, charts) {
							var datasetLabel1 = charts
								.datasets[tooltipItem.datasetIndex]
								.label1 || '';
							var datasetLabel2 = charts
								.datasets[tooltipItem.datasetIndex]
								.label2 || '';

							if (datasetLabel1) {
								return datasetLabel1 + ': ' + tooltipItem.yLabel + " \xBAC";
							}
							if (datasetLabel2) {
								return datasetLabel2 + ': ' + number_format(tooltipItem.yLabel) + " %";
							}

						}

					}
				}
			}
		});


		var chartLeaf = document.getElementById("leafwetnesChart");
		var myChartLeaf = new Chart(chartLeaf, {
			type: 'line',
			data: {
				labels: time,
				datasets: [
					{
						label: "Radiasi",
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
						data: leafWetnes
					}
				]
			},
			options: {
				maintainAspectRatio: false,

				scales: {
					xAxes: [
						{
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
						}
					],
					yAxes: [
						{

							ticks: {
								maxTicksLimit: 5,
								padding: 10,
								// Include a dollar sign in the ticks
								callback: function (value, index, values) {
									return number_format(value) + " cbar";
								}
							},
							gridLines: {
								color: "rgb(234, 236, 244)",
								zeroLineColor: "rgb(234, 236, 244)",
								drawBorder: false,
								borderDash: [2],
								zeroLineBorderDash: [2]
							}
						}
					]
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
							return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + " cbar";
						}
					}
				}
			}
		});


	}
});


