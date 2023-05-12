$(document).ready(function () {



	tampildata();
	

	function tampildata() {
		var id = '1';
		$.ajax({
			type: "GET",
			url: base_url + "settings/showdatanorek",
			dataType: "JSON",
			data: {
				id: id
			},
			success: function (data) {
				$.each(data, function () {

				



					$('[name="kodedit2"]').val(data.id);
			
					$('[name="norek"]').val(data.norek);
					$('[name="atasnama"]').val(data.atasnama);
					$('[name="bank"]').val(data.bank);


					






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
				url: base_url + "settings/simpannorek",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				async: false,


				success: function (response) {
					if (response == "success") {




						toastr.success('Data berhasil disimpan');
						tampildata();

					} else if (response == "error") {



						toastr.warning('Data Gagal disimpan');
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
	$('#inputnorek').validate({

		rules: {
			norek: {
				required: true,



			},
			bank: {
				required: true,




			},
            atasnama: {
				required: true,




			},

			
		},
		messages: {
			
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



	

});
