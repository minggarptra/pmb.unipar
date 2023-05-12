$(document).ready(function () {
	tampildata();

	function tampildata() {
		var id = '1';
		$.ajax({
			type: "GET",
			url: base_url + "settings/showdata",
			dataType: "JSON",
			data: {
				id: id
			},
			success: function (data) {
				$.each(data, function (nama, nohp, alamat, struktur, sejarah, logo) {

					$('[id="bghero"]').attr("src",
						base_url + "assets/upload/images/bghero/" + data
						.bghero);

				});
			}
		});
		return false;

	}


	$.validator.setDefaults({
		submitHandler: function (form) {

			var formData = new FormData($(form)[0]);
			$.ajax({
				type: "POST",
				url: base_url+"settings/simpanbghero",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				async: false,


				success: function (response) {
					if (response == "error") {

						toastr.failed('Data Gagal disimpan');
						tampildata();

					} else if (response == "success") {


						toastr.success('Data Berhasil disimpan');
						tampildata();





					}

					console.log(response)
				},

				error: function (response) {
					Swal.fire({
						type: 'error',
						title: 'OOPS!!',
						text: 'Server Error!'
					});
				}
			});
		}
	});
	$('#bgheroform').validate({

		rules: {
			bghero: {
				required: true,


			},

		},
		messages: {
			bghero: {
				required: 'Pilih File terlebih dahulu',

			},

		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});
})
