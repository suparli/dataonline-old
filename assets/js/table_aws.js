$(function () {
	let dateInterval = getQueryParameter('date_filter');
	let start = moment().startOf('isoWeek');
	let end = moment().endOf('isoWeek');
	if (dateInterval) {
		dateInterval = dateInterval.split(' - ');
		start = dateInterval[0];
		end = dateInterval[1];
	}
	$('#date_filter').daterangepicker({
		"showDropdowns": true,
		"showWeekNumbers": true,
		"alwaysShowCalendars": true,
		startDate: start,
		endDate: end,
		locale: {
			format: 'YYYY-MM-DD',
			firstDay: 1,
		},
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
			'This Year': [moment().startOf('year'), moment().endOf('year')],
			'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
			'All time': [moment().subtract(30, 'year').startOf('month'), moment().endOf('month')],
		}
	});
});
function getQueryParameter(name) {
	const url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$(document).ready(function () {
	let table = $("#data_aws").DataTable({
		dom: "Bfrtip",
		buttons: {
			buttons: [
				'excel',

			],
			dom: {
				button: {
					tag: "button",
					className: "btn btn-primary",
				}
			}
		}
	});
});
