$(document).ready(function () {
	$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
		return {
			"iStart": oSettings._iDisplayStart,
			"iEnd": oSettings.fnDisplayEnd(),
			"iLength": oSettings._iDisplayLength,
			"iTotal": oSettings.fnRecordsTotal(),
			"iFilteredTotal": oSettings.fnRecordsDisplay(),
			"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
			"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
		};
	};




	let table = $('#data_aws').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": base_url + 'aws/jsonTable',
			"type": "POST"
		},
		"columns": [
			{
				"data": "id",
				"orderable": true
			},
			{ "data": "tanggal", "type": "date" },
			{ "data": "time" },
			{ "data": "radiasi" },
			{ "data": "suhu" },
			{ "data": "tekanan_udara" },
			{ "data": "kecepatan_angin" },
			{ "data": "arah_angin" },
			{ "data": "curah_hujan" },
			{ "data": "kelembaban" }

		],
		order: [[0, 'desc']],
		rowCallback: function (row, data, iDisplayIndex) {
			var info = this.fnPagingInfo();
			var page = info.iPage;
			var length = info.iLength;
			var index = page * length + (iDisplayIndex + 1);
			$('td:eq(0)', row).html(index);

		}

	});


});


