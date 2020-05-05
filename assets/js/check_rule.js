
$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('custom-file-label').addClass("selected").html(fileName);
});


$('.form-check-input').on('click', function () {
	const menuId = $(this).data('menu');
	const ruleId = $(this).data('rule');

	$.ajax({
		url: base_url + 'admin/changeaccess',
		type: 'post',
		data: {
			menuId: menuId,
			ruleId: ruleId
		},

		success: function () {
			document.location.href = base_url + 'admin/ruleaccess/' + ruleId;
		}
	});

});
