$('.form-check-user-input').on('click', function () {
	const idAws = $(this).data('aws');
	const idUser = $(this).data('user');

	$.ajax({
		url: base_url + 'admin/changeuseraccess',
		type: 'post',
		data: {
			idAws: idAws,
			idUser: idUser
		},


		success: function () {
			document.location.href = base_url + 'admin/ruleuseraccess/' + idUser;
		}
	});

});
