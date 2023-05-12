$(document).ready(function () {

	$('#clear').on('click', function () {

		$('[name="tahun"]').val("");
		$('[name="awal"]').val("");
		$('[name="akhir"]').val("");


	});


	$('#datatahun').DataTable({

		"responsive": true,
		"lengthChange": true,
		"autoWidth": false,
		"paging": true,

		"ajax": {
			url: base_url +  "ta/getdata",
			type: 'GET',


		},

	});

	//tambah data edit data

	$.validator.setDefaults({
		submitHandler: function (form) {

			var formData = new FormData($(form)[0]);
			$.ajax({
				type: "POST",
				url: base_url + "ta/simpan",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				async: false,


				success: function (response) {
					if (response == "ada") {
						$('[name="tahun"]').val("");
						$('[name="awal"]').val("");
						$('[name="akhir"]').val("");

						$('#datatahun').DataTable().ajax.reload();
						toastr.warning('Tahun Akademik sudah ada');
					} else if (response == "success") {

						$('[name="tahun"]').val("");
						$('[name="awal"]').val("");
						$('[name="akhir"]').val("");
						toastr.success('Data berhasil disimpan');

						$('#datatahun').DataTable().ajax.reload();


					} else if (response == "successada") {

						$('[name="tahun"]').val("");
						$('[name="awal"]').val("");
						$('[name="akhir"]').val("");
						toastr.success('Tahun Akademik Sudah ada, Data berhasil disimpan');

						$('#datatahun').DataTable().ajax.reload();


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
			tahun: {
				required: true,


			},
			awal: {
				required: true,


			},

			akhir: {
				required: true



			}
		},
		messages: {
			tahun: {
				required: 'Pilih Tahun',

			},
			awal: {
				required: 'Masukkan awal pendaftaran',

			},

			akhir: {
				required: 'Masukkan akhir pendaftaran',


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

	$('#datatahun').on('click', '.bedit', function () {
		var id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: base_url + "ta/showedit",
			dataType: "JSON",
			data: {
				id: id
			},
			success: function (data) {
				$.each(data, function (judul) {

					$('[name="kodedit"]').val(id);
					$('[name="tahun"]').val(data.tahun);
					$('[name="awal"]').val(data.awal);
					$('[name="akhir"]').val(data.akhir);


				});
			}
		});
		return false;
	});

	// modal hapus

	$('#datatahun').on('click', '.bhapus', function () {
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
					url: base_url + 'ta/hapus',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id
					},

					success: function (jqXHR, textStatus) {
						if (respon == "success") {


							$('#datatahun').DataTable().ajax.reload();


						} else {


						}

						console.log(response)
					},
					complete: function () {
						swal.hideLoading();
					},

					error: function (a, textStatus) {
						if (a.responseText == 'success') {
							$('#datatahun').DataTable().ajax.reload();
							swal.fire("Ups ", "Data Berhasil Di hapus", "success");
						} else if (a.responseText == 'ada') {

							swal.fire("Ups ", "Tahun sudah ada yang mendaftar", "error");


						}

						console.log(a.responseText)
					}

				});
			}
		});

	});




	//toogle

	$('#datatahun').on('click', '.tahuncek', function () {
		var mode = $(this).prop('checked');
		var nilai = $(this).val();
		var id = $(this).attr('data');
		console.log(mode)
		$.ajax({
			type: "POST",
			url: base_url + "ta/ubahaktif",
			data: {
				'id': id,
				'nilai': nilai,
				'mode': mode,

			},
			success: function (response) {
				if (response == "ada") {

					$('#datatahun').DataTable().ajax.reload();
					toastr.warning('Tahun Aktif sudah ada');
				} else if (response == "success") {


					toastr.success('Tahun berhasil diaktifkan');

					$('#datatahun').DataTable().ajax.reload();


				} else if (response == "successnonaktif") {


					toastr.success('Tahun berhasil dinonaktifkan');

					$('#datatahun').DataTable().ajax.reload();


				}
			}
		});
	});

});
