$(document).ready(function () {



	tampildata();
	$("#desc").summernote({
		height: "200px",
		toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],

		],

	});





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

					$('[id="imglogo"]').attr("src",
						base_url + "assets/upload/images/logo/" + data
						.logo);
					$('[id="imglogo"]').attr("style",
						"border: 1px solid #4B49AC ; border-radius: 12px;");

					$('[id="imgfavicon"]').attr("src",
						base_url + "assets/upload/images/fav/" + data
						.favicon);
					$('[id="imgfavicon"]').attr("style",
						"border: 1px solid #4B49AC ; border-radius: 12px;");

					$('[id="imglaporan"]').attr("src",
						base_url + "assets/upload/images/header_pendaftaran/" + data
						.h_daftar);
					$('[id="imglaporan"]').attr("style",
						"border: 1px solid #4B49AC ; border-radius: 12px;");



					$('[name="kodedit"]').val(data.id);
					$('[name="kodedit2"]').val(data.id);
					$('[name="alamat"]').val(data.alamat);


					$('[id="desc"]').summernote('code', data.deskripsi)
					
					$('[id="video"]').val(data.video)
					$('[id="lokasi"]').val(data.lokasi)
					$('[name="desc"]').val(data.deskripsi);
					$('[name="app_name"]').val(data.app_name);
					$('[name="slogan"]').val(data.slogan);
					$('[name="host_mail"]').val(data.host_mail);
					$('[name="port_mail"]').val(data.port_mail);
					$('[name="crypto_smtp"]').val(data.crypto_smtp);
					$('[name="account_gmail"]').val(data.account_gmail);
					$('[name="pass_gmail"]').val(data.pass_gmail);
					$('[name="whatsapp"]').val(data.whatsapp);
					$('[name="server_api_midtrans"]').val(data.server_api_midtrans);
					$('[name="client_api_midtrans"]').val(data.client_api_midtrans);






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
				url: base_url + "settings/simpan",
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

					} else {
						toastr.warning('Data Gagal disimpan,Deskripsi Kosong');
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
	$('#inputform').validate({

		rules: {
			alamat: {
				required: true,



			},
			desc: {
				required: true,




			},

			logo: {
				required: function () {
					return $("#kodedit").val() === "";
				}
			},
			h_laporan: {
				required: function () {
					return $("#kodedit").val() === "";
				}
			},
			favicon: {
				required: function () {
					return $("#kodedit").val() === "";
				}
			}
		},
		messages: {
			alamat: {
				required: 'masukkan Alamat',

			},
			desc: {
				required: 'masukkan Deskripsi',

			},

			logo: {
				required: 'Pilih Gambar',


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



	$.validator.setDefaults({
		submitHandler: function (form) {

			var formData = new FormData($(form)[0]);
			$.ajax({
				type: "POST",
				url: base_url + "settings/simpangeneral",
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
	$('#inputform2').validate({

		rules: {
			alamat: {
				app_name: true,



			},
			slogan: {
				required: true,
			},
			host_mail: {
				required: true,
			},
			port_mail: {
				required: true,
			},
			crypto_smtp: {
				required: true,
			},
			account_gmail: {
				required: true,
			},
			pass_gmail: {
				required: true,
			},
			whatsapp: {
				required: true,
				number: true
			},
			server_api_midtrans: {
				required: true,
			},
			client_api_midtrans: {
				required: true,
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

});
