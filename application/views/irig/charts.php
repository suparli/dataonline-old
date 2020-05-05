</div>


	
		<style>
			#chartdiv1 {
				width : 99%;
				height : 260px;
			}
			#chartdiv2 {
				width : 99%;
				height : 260px;
			}
			#vtext1{
                transform: rotate(90deg);
                transform-origin: left top 0; 
            }
            #vtext2{
                transform: rotate(90deg);
                transform-origin: left top 0;
            }
		</style>






<div class="col">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Stasiun 1 </h6>
        </div>
        <div class="card-body">
            <div class="chart-area" id="chartdiv1">
            </div>
            <hr>
        </div>
    </div>
</div>


<div class="col">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Stasiun 2 </h6>
        </div>
        <div class="card-body">
            <div class="chart-area" id="chartdiv2">
            </div>
            <hr>
        </div>
    </div>
</div>

<!-- 
		<div class="container-fluid">
		  
		  <div class="row border-bottom">
		 
			<div class="col-11" style="padding: 0px;">
				<div id="chartdiv1"></div>
			</div>
		  </div>
		  <div class="row border-bottom">
			
			<div class="col-11" style="padding: 0px;">
				<div id="chartdiv2"></div>
			</div>
		  </div>
		</div>
		
		 -->
        
        

		<!-- Resources -->
		<script src=<?= base_url('/assets/amcharts/amcharts.js')?>></script>
		<script src=<?= base_url('/assets/amcharts/serial.js')?>></script>
		<script src=<?= base_url('/assets/amcharts/themes/light.js')?>></script>
		<script src=<?= base_url('/assets/amcharts/plugins/dataloader/dataloader.min.js')?>></script>
		<script src=<?= base_url('/assets/amcharts/plugins/export/export.js')?> type="text/javascript"></script>
		<link href=<?= base_url('/assets/amcharts/plugins/export/export.css')?> rel="stylesheet" type="text/css">
		
		<script>
            var j1="Kadar Air Tanah (%)";
            var j2="Irigasi (On / Off)";
			var chart1 = AmCharts.makeChart("chartdiv1", {
			  "type": "serial",
			  "theme": "light",  
			  "dataDateFormat": "YYYY-MM-DD JJ:NN:SS",
			  "dataLoader": {
				  "url": "<?= base_url('get/irig?sta=401')?>"
			   },
			  "valueAxes": [{
				"id": "v1",
				"axisColor": "#0000FF",
				"axisThickness": 2,
				"gridAlpha": 0,
				"axisAlpha": 1,
				"position": "left",
				//"ignoreAxisWidth":true,
				"title": j1,
				"minimum": 0,
				"precision": 2,
				"offset": 1
			  }, {
				"id": "v2",
				"axisColor": "#006400",
				"axisThickness": 2,
				"gridAlpha": 0,
				"axisAlpha": 1,
				"position": "right",
				//"ignoreAxisWidth":true,
				"title": j2,
				"minimum": 0,
				"maximum": 1.5,
				"precision": 0,
				"offset": 1
			  }],
			  "graphs": [{
				"valueAxis": "v1",
				"lineColor": "#DDDDDD",
				"bullet": "round",
				"bulletColor":"#FF0000",
				"bulletBorderColor":"#FF0000",
				"bulletBorderThickness": 1,
				//"hideBulletsCount": 30,
				"title": "red line",
				"valueField": "kat1",
				"fillAlphas": 0,
				"balloonText": "sprinkler: [[value]]",
				"balloonColor":"#FF0000"
			  }, {
			    "valueAxis": "v1",
				"lineColor": "#DDDDDD",
				"bullet": "round",
				"bulletColor":"#FFA500",
				"bulletBorderColor":"#FFA500",
				"bulletBorderThickness": 1,
				//"hideBulletsCount": 30,
				"title": "red line",
				"valueField": "kat2",
				"fillAlphas": 0,
				"balloonText": "Drip: [[value]]",
				"balloonColor":"#FFA500"
			  }, {
				"valueAxis": "v2",
				"lineColor": "#006400",
				"fillColor": "#006400",
				//"bullet": "square",
				//"bulletBorderThickness": 1,
				type:"column",
				//"hideBulletsCount": 30,
				"title": "yellow line",
				"valueField": "irig1",
				"fillAlphas": 0.3,
				"balloonText": "Irigasi Drip: [[ir1]]"
			  }, {
			    "valueAxis": "v2",
				"lineColor": "#006400",
				"fillColor": "#006400",
				//"bullet": "square",
				//"bulletBorderThickness": 1,
				type:"column",
				//"hideBulletsCount": 30,
				"title": "yellow line",
				"valueField": "irig2",
				"fillAlphas": 0.5,
				"balloonText": "Irigasi sprinkler: [[ir2]]"
			  }, {
				"valueAxis": "v1",
				"lineColor": "#9932CC",
				"dashLength":5,
				//"thickness":4,
				//"fillColor": "#0000FF",
				//"bullet": "square",
				//"bulletBorderThickness": 1,
				type:"step",
				//"hideBulletsCount": 30,
				//"title": "yellow line",
				"valueField": "mak",
				//"fillAlphas": 0.3,
				"showBalloon":false
				//"balloonText": "irigasi: ON"
			  }, {
				"valueAxis": "v1",
				"lineColor": "#FF0000",
				"dashLength":5,
				//"thickness":1000,
				//"fillColor": "#0000FF",
				//"bullet": "square",
				//"bulletBorderThickness": 1,
				type:"step",
				//"hideBulletsCount": 30,
				//"title": "yellow line",
				"valueField": "min",
				//"fillAlphas": 0.3,
				"showBalloon":false
				//"balloonText": "irigasi: ON"
			  }],
			  "chartScrollbar": {
				    "graph": "g1",
					"oppositeAxis":true,
					"offset":10,
					"scrollbarHeight": 20,
					"backgroundAlpha": 0,
					"selectedBackgroundAlpha": 0.1,
					"selectedBackgroundColor": "#888888",
					"graphFillAlpha": 0,
					"graphLineAlpha": 0.5,
					"selectedGraphFillAlpha": 0,
					"selectedGraphLineAlpha": 1,
					"autoGridCount":true,
					"color":"#AAAAAA",
					"minimum": 0
			  },
			  "chartCursor": {
				"cursorPosition": "mouse",
				//"valueLineBalloonEnabled": true,
				//"valueLineEnabled": true
			  },
			  "valueScrollbar":{
				  "oppositeAxis":true,
				  "offset":65,
				  "scrollbarHeight":10
			  },
			  "categoryField": "tgl",
			  "categoryAxis": {
				"parseDates": true,
				"axisColor": "#DADADA",
				//"minorGridEnabled": true,
				"minPeriod": "mm",
				"title": "Waktu",
				" ignoreAxisWidth":true
			  },
			  "export": {
                "enabled": true,
                "beforeCapture": function() {
                  var chart = this.setup.chart;
                  chart.chartScrollbar.enabled = false;
                  chart.valueScrollbar.enabled = false;
                  chart.hideCredits=true;
                  chart.validateNow();
                },
                "afterCapture": function() {
                  var chart = this.setup.chart;
                  setTimeout(function() {
                    chart.chartScrollbar.enabled = true;
                    chart.valueScrollbar.enabled = true;
                    chart.hideCredits=false;
                    chart.validateNow();
                  }, 10);
                }
              }
			});

			//chart.addListener("rendered", zoomChart);
			//zoomChart();
			
			setInterval(function () {
			
				AmCharts.loadFile("<?= base_url('get/irig?sta=401')?>", {}, function(data) {
				chart1.dataProvider = AmCharts.parseJSON(data);
				//chart.validateData();
				chart1.validateNow(true, true);
				});
				
			}, 60000);

			function zoomChart() {
			  chart.zoomToIndexes(3,5);
			}
		</script>
		
		<script>
            var j1="Kadar Air Tanah (%)";
            var j2="Irigasi (On / Off)";
			var chart2 = AmCharts.makeChart("chartdiv2", {
			  "type": "serial",
			  "theme": "light",  
			  "dataDateFormat": "YYYY-MM-DD JJ:NN:SS",
			  "dataLoader": {
				  "url": "<?= base_url('get/irig?sta=402')?>"
			   },
			  "valueAxes": [{
				"id": "v1",
				"axisColor": "#0000FF",
				"axisThickness": 2,
				"gridAlpha": 0,
				"axisAlpha": 1,
				"position": "left",
				//"ignoreAxisWidth":true,
				"title": j1,
				"minimum": 0,
				"precision": 2,
				"offset": 10
			  }, {
				"id": "v2",
				"axisColor": "#006400",
				"axisThickness": 2,
				"gridAlpha": 0,
				"axisAlpha": 1,
				"position": "right",
				//"ignoreAxisWidth":true,
				"title": j2,
				"minimum": 0,
				"maximum": 1.5,
				"precision": 0,
				"offset": 10
			  }],
			  "graphs": [{
				"valueAxis": "v1",
				"lineColor": "#DDDDDD",
				"bullet": "round",
				"bulletColor":"#FF0000",
				"bulletBorderColor":"#FF0000",
				"bulletBorderThickness": 1,
				//"hideBulletsCount": 30,
				"title": "red line",
				"valueField": "kat1",
				"fillAlphas": 0,
				"balloonText": "Sprinkler: [[value]]",
				"balloonColor":"#FF0000"
			  }, {
			    "valueAxis": "v1",
				"lineColor": "#DDDDDD",
				"bullet": "round",
				"bulletColor":"#FFA500",
				"bulletBorderColor":"#FFA500",
				"bulletBorderThickness": 1,
				//"hideBulletsCount": 30,
				"title": "red line",
				"valueField": "kat2",
				"fillAlphas": 0,
				"balloonText": "Drip: [[value]]",
				"balloonColor":"#FFA500"
			  }, {
				"valueAxis": "v2",
				"lineColor": "#006400",
				"fillColor": "#006400",
				//"bullet": "square",
				//"bulletBorderThickness": 1,
				type:"column",
				//"hideBulletsCount": 30,
				"title": "yellow line",
				"valueField": "irig1",
				"fillAlphas": 0.3,
				"balloonText": "Irigasi Drip: [[ir1]]"
			  }, {
			    "valueAxis": "v2",
				"lineColor": "#006400",
				"fillColor": "#006400",
				//"bullet": "square",
				//"bulletBorderThickness": 1,
				type:"column",
				//"hideBulletsCount": 30,
				"title": "yellow line",
				"valueField": "irig2",
				"fillAlphas": 0.5,
				"balloonText": "Irigasi Sprinkler: [[ir2]]"
			  }, {
				"valueAxis": "v1",
				"lineColor": "#9932CC",
				"dashLength":5,
				//"thickness":4,
				//"fillColor": "#0000FF",
				//"bullet": "square",
				//"bulletBorderThickness": 1,
				type:"step",
				//"hideBulletsCount": 30,
				//"title": "yellow line",
				"valueField": "mak",
				//"fillAlphas": 0.3,
				"showBalloon":false
				//"balloonText": "irigasi: ON"
			  }, {
				"valueAxis": "v1",
				"lineColor": "#FF0000",
				"dashLength":5,
				//"thickness":1000,
				//"fillColor": "#0000FF",
				//"bullet": "square",
				//"bulletBorderThickness": 1,
				type:"step",
				//"hideBulletsCount": 30,
				//"title": "yellow line",
				"valueField": "min",
				//"fillAlphas": 0.3,
				"showBalloon":false
				//"balloonText": "irigasi: ON"
			  }],
			  "chartScrollbar": {
				    "graph": "g1",
					"oppositeAxis":true,
					"offset":10,
					"scrollbarHeight": 20,
					"backgroundAlpha": 0,
					"selectedBackgroundAlpha": 0.1,
					"selectedBackgroundColor": "#888888",
					"graphFillAlpha": 0,
					"graphLineAlpha": 0.5,
					"selectedGraphFillAlpha": 0,
					"selectedGraphLineAlpha": 1,
					"autoGridCount":true,
					"color":"#AAAAAA",
					"minimum": 0
			  },
			  "chartCursor": {
				"cursorPosition": "mouse",
				//"valueLineBalloonEnabled": true,
				//"valueLineEnabled": true
			  },
			  "valueScrollbar":{
				  "oppositeAxis":true,
				  "offset":65,
				  "scrollbarHeight":10
			  },
			  "categoryField": "tgl",
			  "categoryAxis": {
				"parseDates": true,
				"axisColor": "#DADADA",
				//"minorGridEnabled": true,
				"minPeriod": "mm",
				"title": "Waktu",
				" ignoreAxisWidth":true
			  },
			  "export": {
                "enabled": true,
                "beforeCapture": function() {
                  var chart = this.setup.chart;
                  chart.chartScrollbar.enabled = false;
                  chart.valueScrollbar.enabled = false;
                  chart.hideCredits=true;
                  chart.validateNow();
                },
                "afterCapture": function() {
                  var chart = this.setup.chart;
                  setTimeout(function() {
                    chart.chartScrollbar.enabled = true;
                    chart.valueScrollbar.enabled = true;
                    chart.hideCredits=false;
                    chart.validateNow();
                  }, 10);
                }
              }
			});

			//chart.addListener("rendered", zoomChart);
			//zoomChart();
			
			setInterval(function () {
			
				AmCharts.loadFile("<?= base_url('get/irig?sta=402')?>", {}, function(data) {
				chart2.dataProvider = AmCharts.parseJSON(data);
				//chart.validateData();
				chart2.validateNow(true, true);
				});
				
			}, 60000);

			function zoomChart() {
			  chart.zoomToIndexes(3,5);
			}
		</script>
			