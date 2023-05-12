$(document).ready(function () {


	$('#datauser').DataTable({

		"responsive": true,
		"lengthChange": true,
		"autoWidth": false,
		"paging": true,

		"ajax": {
			url: base_url + "usermanajemen/getdata",
			type: 'GET',


		},

	});


	$.validator.setDefaults({
		submitHandler: function (form) {

			var formData = new FormData($(form)[0]);
			$.ajax({
				type: "POST",
				url: base_url+"usermanajemen/simpan",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				async: false,


				success: function (response) {
					if (response == "ada") {
						$('[name="username"]').val("");
						$('[name="password"]').val("");
						$('[name="level"]').val("");
						$('[name="nama"]').val("");
					$('[name="kodedit"]').val("");


						$('#datauser').DataTable().ajax.reload();
						toastr.warning('Username sudah ada');
					} else if (response == "success") {

						$('[name="username"]').val("");
						$('[name="password"]').val("");
						$('[name="level"]').val("");
						$('[name="nama"]').val("");
					$('[name="kodedit"]').val("");



						toastr.success('Data berhasil disimpan');
						$('[id="fotojurusan"]').attr("src",
							"");
						$('#datauser').DataTable().ajax.reload();


					} else if (response == "adadaftar") {
						$('[name="nama"]').val("");
					    $('[name="kodedit"]').val("");

                        
						$('[name="username"]').val("");
						$('[name="password"]').val("");
						$('[name="level"]').val("");
						toastr.success('Nama jurusan berhasil diupdate, Kode tidak bisa diedit Sudah ada pendaftar');
						$('#datauser').DataTable().ajax.reload();
					} else {
						toastr.warning('Data gagal disimpan');
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
			username: {
				required: true,

				minlength: 6

			},
			password: {
				required: function () {
					return $("#kodedit").val() === "";
				},
				minlength: 6


			},
			level: {
				required: true,


			},nama: {
				required: true,


			}
		},
		messages: {
			username: {
				required: 'masukkan Username',

			},
			password: {
				required: 'masukkan Password',

			},
			level: {
				required: 'Pilih Level',

			},nama: {
				required: 'Masukkan Nama',

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



	//editview

	$('#datauser').on('click', '.bedit', function () {
		var id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: base_url+ "usermanajemen/showedit",
			dataType: "JSON",
			data: {
				id: id
			},
			success: function (data) {
				$.each(data, function (judul) {

					$('[name="kodedit"]').val(data.kode);
					$('[name="username"]').val(data.username);
					$('[name="nama"]').val(data.nama);
					$('[name="level"]').val(data.level);


				});
			}
		});
		return false;
	});

	// modal hapus

	$('#datauser').on('click', '.bhapus', function () {
		var id = $(this).attr('data');
		swal.fire({
			title: 'Yakin Menghapus data ini?',
			text: "Tekan ya jika anda yakin ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes'
		}).then(function (result) {
			if (result.value) {
				$.ajax({
					url: base_url + 'usermanajemen/hapus',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id
					},

					success: function (jqXHR, textStatus) {
						if (respon == "success") {
                            toastr.success('Data berhasil dihapus');

							$('#datauser').DataTable().ajax.reload();
						} else {
                            toastr.warning('Data gagal dihapus');

						}

						console.log(response)
					},
					complete: function () {
						swal.hideLoading();
					},

					error: function (a, textStatus) {
						if (a.responseText == 'success') {
							$('#datauser').DataTable().ajax.reload();
                            toastr.success('Data berhasil dihapus');

						} else if (a.responseText == 'ada') {

                            toastr.warning('Data gagal dihapus');



						}

						console.log(a.responseText)
					}

				});
			}
		});

	});


    $('#clear').on('click', function () {
    
        $('[name="nama"]').val("");
        $('[name="kodedit"]').val("");

        
        $('[name="username"]').val("");
        $('[name="password"]').val("");
        $('[name="level"]').val("");
        
        
        });
})
