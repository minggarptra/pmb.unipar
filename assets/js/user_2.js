 $(document).ready(function () {

 	$('#provinsi').change(function () {
 		var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
 		if (provinsi_id != '') {
 			$.ajax({
 				url: base_url + 'user/get_kabupaten',
 				method: 'POST',
 				data: {
 					provinsi_id: provinsi_id
 				},
 				success: function (data) {
 					$('#kabupaten').html(data)
 				}
 			});
 		}
 	});
 })
 function tampilbayar() {
	
	$.ajax({
		type: "GET",
		url: base_url + "user/showdatabayar",
		dataType: "JSON",
		data: {
			
		},
		success: function (data) {
			$.each(data, function () {
				if(data.bukti === null){
				$('[id="imgbayar"]').addClass('d-none');
					$('[name="kodedit"]').val(data.id);
				}
				else{
					$('[id="imgbayar"]').attr("src",
					base_url + "assets/upload/images/buktipembayaran/" + data
					.bukti);
					$('[name="kodedit"]').val(data.id);
				}

			});
		}
	});
	return false;

}

 if ($('.content-wrapper').is('.pembayaran')) {
	tampilbayar();
	$.validator.setDefaults({
		submitHandler: function (form) {
			var formData = new FormData($(form)[0]);
			$.ajax({
				type: "POST",
				url: base_url + "user/simpanbayar",
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				async: false,


				success: function (response) {
					if (response == "success") {
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-error',
							msg: 'Success Upload',
							sound: false,
						});
						tampilbayar();

					} else if (response == "error") {
						Lobibox.notify('warning', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-error',
							msg: 'Gagal Upload',
							sound: false,
						});
						tampilbayar();

					} else {
						Lobibox.notify('warning', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-error',
							msg: 'Gagal',
							sound: false,
						});
						tampilbayar();
					}
					
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
	$('#formpembayaran').validate({

		rules: {
			
			buktibayar: {
				required: true,
			},
			
		},
		messages: {
			
			buktibayar: {
				required: 'Pilih File Bukti Pembayaran',
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

 };

 $("#clearNotif").click(function () {
 	$.post(base_url + "user/clearNotif", function (data) {})
 });


 tampilnotif();
 var pusher = new Pusher('b6ddec25ff4b5cc46b4f', {
 	cluster: 'ap1',
 	forceTLS: true
 });

 var channel = pusher.subscribe('my-channel');
 channel.bind('my-event', function (data) {
 	if (data.message === 'notif' || data.message === 'chat') {
 		tampilnotif();
 		document.getElementById("bell").style.color = "red";
 	}
 });

 function tampilnotif() {
 	$.ajax({
 		type: "GET",
 		url: base_url + "user/headernotifikasi",
 		async: true,
 		dataType: 'JSON',
 		success: function (data) {
 			var html = '';
 			var i;
 			for (i = 0; i < data.length; i++) {
 				html += '<li><a href="' + base_url + 'notifikasi"><i class="fa fa-users text-info"></i>' + data[i].notifikasi + '</a></li>'
 			}
 			$('#notifku').html(html);
 		}
 	});
 	return false;
 }


 $.validator.setDefaults({
 	submitHandler: function (form) {
 		var formData = new FormData($(form)[0]);
 		$.ajax({
 			type: "POST",
 			url: base_url + 'user/setprofproses',
 			data: formData,
 			processData: false,
 			contentType: false,
 			cache: false,
 			async: true,
 			success: function (response) {
 				if (response === "salah") {
 					Lobibox.notify('warning', {
 						pauseDelayOnHover: true,
 						continueDelayOnInactiveTab: false,
 						position: 'top right',
 						icon: 'bx bx-error',
 						msg: 'Password Lama Anda Tidak Sesuai',
 						sound: false,
 					});
 				} else if (response === "success") {
 					Swal.fire({
 						title: "Ubah Password",
 						text: "Password Anda Berhasil dirubah",
 						imageUrl: base_url + "assets/loginuser/succesrest.jpg",
 						imageWidth: 550,
 						imageHeight: 225,
 						imageAlt: "Eagle Image",
 						reverseButtons: true,
 					});
 				}
 			},
 			error: function (response) {}
 		});
 	}
 });
 $('#formprofile').validate({
 	rules: {
 		oldpassword: {
 			required: true,
 		},
 		newpassword: {
 			required: true,
 			minlength: 6
 		},
 		confirmpassword: {
 			required: true,
 			equalTo: '#newpassword'
 		},

 	},
 	messages: {
 		oldpassword: {
 			required: 'masukkan Password lama anda',
 		},
 		newpassword: {
 			required: 'masukkan Password baru anda',
 			minlength: 'masukkan Minimal 6 Karakter'
 		},

 		confirmpassword: {
 			required: 'masukkan Konfirmasi Password',
 			equalTo: "Password harus sama dengan sebelumnya"
 		},
 	},

 	errorElement: 'span',
 	errorPlacement: function (error, element) {
 		error.addClass('invalid-feedback');
 		error.addClass('ml-3');
 		error.addClass('text-danger');
 		element.closest('.form-group').append(error);
 	},
 	highlight: function (element, errorClass, validClass) {
 		$(element).addClass('is-invalid');
 	},
 	unhighlight: function (element, errorClass, validClass) {
 		$(element).removeClass('is-invalid');
 	}

 });






 function tampildata() {
 	var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
 	var kab_id = $('#idkab').val(); //ambil value id dari provinsi
 	if (provinsi_id != '') {
 		$.ajax({
 			url: base_url + 'user/get_kabupaten_data',
 			method: 'POST',
 			data: {
 				provinsi_id: provinsi_id,
 				kab_id: kab_id
 			},
 			success: function (data) {
 				$('#kabupaten').html(data)
 			}
 		});
 	}

 }


 // DROPZONE UPLOAD BERKAS
 Dropzone.autoDiscover = false;
 if ($('.content-wrapper').is('.upload')) {
 	Dropzone.autoDiscover = false;


 	//  Drop Zone KTP

	var foto_kk = new Dropzone("#dropzonektp", {
		url: base_url + "user/upload_ktp",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_galleryktp",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].ktp,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_kk.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_ktp", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	//dropzone kk

 	var foto_kk = new Dropzone("#dropzonekk", {
		url: base_url + "user/upload_kk",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_gallerykk",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].kk,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_kk.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_kk", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	// Dropzone Akte Kelahiran

	var foto_akte_kelahiran = new Dropzone("#dropzoneakte_kelahiran", {
		url: base_url + "user/upload_akte_kelahiran",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_galleryakte_kelahiran",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].akte_kelahiran,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_kk.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_akte_kelahiran", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	// Dropzone IJAZAH SMA / SMK / SEDERAJAT

	var foto_ijazah = new Dropzone("#dropzoneijazah", {
		url: base_url + "user/upload_ijazah",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_galleryijazah",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].ijazah,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_ijazah.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_ijazah", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	 //dropzone ijazah S1

 	var foto_ijazah_s1 = new Dropzone("#dropzoneijazah_s1", {
		url: base_url + "user/upload_ijazah_s1",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_galleryijazah_s1",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].ijazah_s1,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_ijazah_s1.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_ijazah_s1", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	//dropzone Transkrip Nilai S1

	var foto_transkrip_nilai_s1 = new Dropzone("#dropzonetranskrip_nilai_s1", {
		url: base_url + "user/upload_transkrip_nilai_s1",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_gallerytranskrip_nilai_s1",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].transkrip_s1,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_transkrip_nilai_s1.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_transkrip_nilai_s1", a.token); //Menmpersiapkan token untuk masing masing foto
	});
	
	// SARJANA
	// Dropzone Nilai UN

	var foto_un = new Dropzone("#dropzoneun", {
		url: base_url + "user/upload_un",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_galleryun",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].un,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_un.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_un", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	// Dropzone Ijazah D1 / D2 / D3

	var foto_ijazah_d1_d2_d3 = new Dropzone("#dropzoneijazah_d1_d2_d3", {
		url: base_url + "user/upload_ijazah_d1_d2_d3",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_galleryijazah_d1_d2_d3",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].ijazah_d1_d2_d3,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_ijazah_d1_d2_d3.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_ijazah_d1_d2_d3", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	// Dropzone Transkrip Nilai D1 / D2 / D3

	var foto_transkrip_nilai_d1_d2_d3 = new Dropzone("#dropzonetranskrip_nilai_d1_d2_d3", {
		url: base_url + "user/upload_transkrip_nilai_d1_d2_d3",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_gallerytranskrip_nilai_d1_d2_d3",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].transkrip_d1_d2_d3,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_transkrip_nilai_d1_d2_d3.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_transkrip_nilai_d1_d2_d3", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	// Dropzone SK Pindah

	var foto_sk_pindah = new Dropzone("#dropzonesk_pindah", {
		url: base_url + "user/upload_sk_pindah",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_gallerysk_pindah",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].sk,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_sk_pindah.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_sk_pindah", a.token); //Menmpersiapkan token untuk masing masing foto
	});

	// Dropzone Persyaratan Lain
	var foto_persyaratan_lain = new Dropzone("#dropzonepersyaratan_lain", {
		url: base_url + "user/upload_persyaratan_lain",
		maxFiles: 1,
		maxFilesize: 2,
		uploadMultiple: false,
		method: "post",
		acceptedFiles: ".pdf",
		paramName: "userfile",
		autoProcessQueue: true,
		addRemoveLinks: false,
		init: function () {

			var element = this;
			$.ajax({
				type: 'GET',
				url: base_url + "user/do_init_gallerypersyaratan_lain",
				success: function (data) {
					$.each(data, function (index) {
						var mockFile = {
							name: data[index].persyaratan_lain,
							size: 1000000,
							type: 'image/jpeg'
						};
						element.emit("addedfile", mockFile);
						element.emit("complete", mockFile);

						// And optionally show the thumbnail of the file:
						element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

					});


				}
			});
		},
		dictInvalidFileType: "Type file ini tidak dizinkan",


	});


	//Event ketika Memulai mengupload
	foto_persyaratan_lain.on("sending", function (a, b, c) {
		a.token = Math.random();
		c.append("token_persyaratan_lain", a.token); //Menmpersiapkan token untuk masing masing foto
	});


 }


 $("#print2").click(function () {
 	var mode = 'iframe'; //popup
 	var close = mode == "popup";
 	var options = {
 		mode: mode,
 		popClose: close
 	};
 	$("section.printableArea").printArea(options);
 });


 // pendaftaran

 if ($('.content-wrapper').is('.formdata')) {
 	// AMBIL DATA KABUPATEN TRIGER PROVINSI

 	$('#provinsi').change(function () {
 		var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
 		if (provinsi_id != '') {
 			$.ajax({
 				url: base_url + 'user/get_kabupaten',
 				method: 'POST',
 				data: {
 					provinsi_id: provinsi_id
 				},
 				success: function (data) {
 					$('#kabupaten').html(data)
 				}
 			});
 		}
 	});


 	var form = $(".validation-wizard").show();

 	$(".validation-wizard").steps({
 		headerTag: "h6",
 		bodyTag: "section",
 		transitionEffect: "none",
 		titleTemplate: '<span class="step">#index#</span> #title#',
 		labels: {
 			finish: "Submit"
 		},
 		onStepChanging: function (event, currentIndex, newIndex) {
 			return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
 		},
 		onFinishing: function (event, currentIndex) {
 			return form.validate().settings.ignore = ":disabled", form.valid()
 		},
 		onFinished: function (event, currentIndex) {
 			$.ajax({
 				type: "POST",
 				url: base_url + "prosespendaftaran",
 				data: new FormData(this),
 				processData: false,
 				contentType: false,
 				cache: false,
 				async: false,
 				success: function (response) {
 					if (response == "success") {
 						Swal.fire({
 							title: "Form Pendaftaran Berhasil di simpan",
 							text: "Anda akan dialihkan secara otomatis",
 							imageUrl: base_url + "assets/loginuser/succesrest.jpg",
 							imageWidth: 550,
 							imageHeight: 225,
 							imageAlt: "Eagle Image",
 							reverseButtons: true,
 							allowOutsideClick: false
 						}).then(function () {
 							window.location = base_url + 'data-pendaftaran';
 						});

 					} else {
 						Lobibox.notify('warning', {
 							pauseDelayOnHover: true,
 							continueDelayOnInactiveTab: false,
 							position: 'top right',
 							icon: 'bx bx-error',
 							msg: 'Form Data Pendaftaran Gagal Disimpan',
 							sound: false,
 						});

 					}
 					console.log(response)
 				},
 				error: function (response) {
 					console.log(response)
 				}
 			});
 		}
 	}), $(".validation-wizard").validate({
 		ignore: "input[type=hidden]",
 		errorClass: "text-danger",
 		successClass: "text-success",
 		highlight: function (element, errorClass) {
 			$(element).removeClass(errorClass)
 		},
 		unhighlight: function (element, errorClass) {
 			$(element).removeClass(errorClass)
 		},
 		errorPlacement: function (error, element) {
 			error.insertAfter(element)
 		},
 		rules: {
 			email: {
 				email: !0
 			}
 		}
 	})
 }

 // EDIT DATA PENDAFTARAN

 if ($('.content-wrapper').is('.formeditdata')) {
 	// AMBIL DATA KABUPATEN TRIGER PROVINSI
 	tampildata();
 	$('#provinsi').change(function () {
 		var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
 		if (provinsi_id != '') {
 			$.ajax({
 				url: base_url + 'user/get_kabupaten',
 				method: 'POST',
 				data: {
 					provinsi_id: provinsi_id
 				},
 				success: function (data) {
 					$('#kabupaten').html(data)
 				}
 			});
 		}
 	});


 	var form = $(".validation-wizard").show();

 	$(".validation-wizard").steps({
 		headerTag: "h6",
 		bodyTag: "section",
 		transitionEffect: "none",
 		titleTemplate: '<span class="step">#index#</span> #title#',
 		labels: {
 			finish: "Submit"
 		},
 		onStepChanging: function (event, currentIndex, newIndex) {
 			return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
 		},
 		onFinishing: function (event, currentIndex) {
 			return form.validate().settings.ignore = ":disabled", form.valid()
 		},
 		onFinished: function (event, currentIndex) {
 			$.ajax({
 				type: "POST",
 				url: base_url + "simpaneditpendaftaran",
 				data: new FormData(this),
 				processData: false,
 				contentType: false,
 				cache: false,
 				async: false,
 				success: function (response) {
 					if (response == "success") {
 						Swal.fire({
 							title: "Data Pendaftaran Berhasil di Rubah",
 							text: "Silahkan kembali ke halaman Login",
 							imageUrl: base_url + "assets/loginuser/succesrest.jpg",
 							imageWidth: 550,
 							imageHeight: 225,
 							imageAlt: "Eagle Image",
 							reverseButtons: true,
 							allowOutsideClick: false
 						}).then(function () {
 							window.location = base_url + 'data-pendaftaran';
 						});

 					} else {
 						Lobibox.notify('warning', {
 							pauseDelayOnHover: true,
 							continueDelayOnInactiveTab: false,
 							position: 'top right',
 							icon: 'bx bx-error',
 							msg: 'Form Data Pendaftaran Gagal Disimpan',
 							sound: false,
 						});

 					}
 					console.log(response)
 				},
 				error: function (response) {
 					console.log(response)
 				}
 			});
 		}
 	}), $(".validation-wizard").validate({
 		ignore: "input[type=hidden]",
 		errorClass: "text-danger",
 		successClass: "text-success",
 		highlight: function (element, errorClass) {
 			$(element).removeClass(errorClass)
 		},
 		unhighlight: function (element, errorClass) {
 			$(element).removeClass(errorClass)
 		},
 		errorPlacement: function (error, element) {
 			error.insertAfter(element)
 		},
 		rules: {
 			email: {
 				email: !0
 			}
 		}
 	})
 }

 // COMPLETE SEND HANDLER



 $(document).on('pjax:send', function () {
 	document.getElementById('loader').style.visibility = ""

 })

 $(document).on('pjax:complete', function (event) {
 	$(document).ready(function () {

 		$('#provinsi').change(function () {
 			var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
 			if (provinsi_id != '') {
 				$.ajax({
 					url: base_url + 'user/get_kabupaten',
 					method: 'POST',
 					data: {
 						provinsi_id: provinsi_id
 					},
 					success: function (data) {
 						$('#kabupaten').html(data)
 					}
 				});
 			}
 		});
 	})

 	document.getElementById('loader').style.visibility = "hidden"

 	$("#print2").click(function () {
 		var mode = 'iframe'; //popup
 		var close = mode == "popup";
 		var options = {
 			mode: mode,
 			popClose: close
 		};
 		$("section.printableArea").printArea(options);
 	});

 	if ($('.content-wrapper').is('.upload')) {
 		Dropzone.autoDiscover = false;


		//Dropzone KTP
		var foto_ktp = new Dropzone("#dropzonektp", {
			url: base_url + "user/upload_ktp",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_galleryktp",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].ktp,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

						});
					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",
		});


		//Event ketika Memulai mengupload
		foto_ktp.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_ktp", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//Dropzone KK
 		var foto_kk = new Dropzone("#dropzonekk", {
			url: base_url + "user/upload_kk",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_gallerykk",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].kk,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

						});
					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",
		});


		//Event ketika Memulai mengupload
		foto_kk.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_kk", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//Dropzone Akte Kelahiran
		var foto_akte_kelahiran = new Dropzone("#dropzoneaktekelahiran", {
			url: base_url + "user/upload_akte_kelahiran",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_galleryakte_kelahiran",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].akte_kelahiran,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

						});
					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",
		});


		//Event ketika Memulai mengupload
		foto_akte_kelahiran.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_akte_kelahiran", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//  DropZone Ijazah SMA/SMK
 		var foto_upload = new Dropzone("#dropzoneijazah", {
 			url: base_url + "user/upload_ijazah",
 			maxFiles: 1,
 			maxFilesize: 2,
 			uploadMultiple: false,
 			method: "post",
 			acceptedFiles: ".pdf",
 			paramName: "userfile",
 			autoProcessQueue: true,
 			addRemoveLinks: false,
 			init: function () {

 				var element = this;
 				$.ajax({
 					type: 'GET',
 					url: base_url + "user/do_init_gallery",
 					success: function (data) {
 						$.each(data, function (index) {
 							var mockFile = {
 								name: data[index].ijazah,
 								size: 1000000,
 								type: 'image/jpeg'
 							};
 							element.emit("addedfile", mockFile);
 							element.emit("complete", mockFile);

 							// And optionally show the thumbnail of the file:
 							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

 						});
 					}
 				});
 			},
 			dictInvalidFileType: "Type file ini tidak dizinkan",
 		});


 		//Event ketika Memulai mengupload
 		foto_upload.on("sending", function (a, b, c) {
 			a.token = Math.random();
 			c.append("token_foto", a.token); //Menmpersiapkan token untuk masing masing foto
 		});

 		// //dropzone foto

 		// var foto_foto = new Dropzone("#dropzonefoto", {
 		// 	url: base_url + "user/upload_foto",
 		// 	maxFiles: 1,
 		// 	maxFilesize: 2,
 		// 	uploadMultiple: false,
 		// 	method: "post",
 		// 	acceptedFiles: "image/jpeg,image/png",
 		// 	paramName: "userfile",
 		// 	autoProcessQueue: true,
 		// 	addRemoveLinks: false,
 		// 	init: function () {

 		// 		var element = this;
 		// 		$.ajax({
 		// 			type: 'GET',
 		// 			url: base_url + "user/do_init_galleryfoto",
 		// 			success: function (data) {
 		// 				$.each(data, function (index) {
 		// 					var mockFile = {
 		// 						name: data[index].foto,
 		// 						size: 1000000,
 		// 						type: 'image/jpeg'
 		// 					};
 		// 					element.emit("addedfile", mockFile);
 		// 					element.emit("complete", mockFile);

 		// 					// And optionally show the thumbnail of the file:

 		// 					element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

 		// 				});


 		// 			}
 		// 		});
 		// 	},
 		// 	dictInvalidFileType: "Type file ini tidak dizinkan",


 		// });


 		// //Event ketika Memulai mengupload
 		// foto_foto.on("sending", function (a, b, c) {
 		// 	a.token = Math.random();
 		// 	c.append("token_foto", a.token); //Menmpersiapkan token untuk masing masing foto
 		// });

		//Dropzone UN
 		var foto_un = new Dropzone("#dropzone_un", {
			url: base_url + "user/upload_un",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_gallery_un",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].un,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

						});


					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",


		});


		//Event ketika Memulai mengupload
		foto_un.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_un", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//Dropzone Ijazah D1/D2/D3

		var foto_ijazah_d = new Dropzone("#dropzoneijazah_d", {
			url: base_url + "user/upload_ijazah_d",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_galleryijazah_d",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].ijazah_d,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

						});


					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",


		});


		//Event ketika Memulai mengupload
		foto_ijazah_d.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_ijazah_d", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//dropzone transkrip nilai d1 / d2 / d3
		var foto_transkrip_d = new Dropzone("#dropzonetranskrip_d", {
			url: base_url + "user/upload_transkrip_d",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_gallerytranskrip_d",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].transkrip_d,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');
						});
					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",
		});


		//Event ketika Memulai mengupload
		foto_transkrip_d.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_transkrip_d", a.token); //Menmpersiapkan token untuk masing masing foto
		});
		
		//dropzone Surat Keterangan Pindah
		var foto_sk_pindah = new Dropzone("#dropzonesk_pindah", {
			url: base_url + "user/upload_sk_pindah",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_gallerysk_pindah",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].sk_pindah,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');

						});


					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",


		});


		//Event ketika Memulai mengupload
		foto_sk_pindah.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_sk_pindah", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//dropzone Persyaratan Lain
		var foto_persyaratan_lain = new Dropzone("#dropzonepersyaratan_lain", {
			url: base_url + "user/upload_persyaratan_lain",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_gallerypersyaratan_lain",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].persyaratan_lain,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');
						});
					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",
		});

		//Event ketika Memulai mengupload
		foto_persyaratan_lain.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_persyaratan_lain", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//dropzone Ijazah S1
		var foto_ijazah_s1 = new Dropzone("#dropzoneijazah_s1", {
			url: base_url + "user/upload_ijazah_s1",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_galleryijazah_s1",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].ijazah_s1,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');
						});
					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",
		});

		//Event ketika Memulai mengupload
		foto_ijazah_s1.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_ijazah_s1", a.token); //Menmpersiapkan token untuk masing masing foto
		});

		//dropzone transkrip nilai s1
		var foto_transkrip_s1 = new Dropzone("#dropzonetranskrip_s1", {
			url: base_url + "user/upload_transkrip_s1",
			maxFiles: 1,
			maxFilesize: 2,
			uploadMultiple: false,
			method: "post",
			acceptedFiles: ".pdf",
			paramName: "userfile",
			autoProcessQueue: true,
			addRemoveLinks: false,
			init: function () {

				var element = this;
				$.ajax({
					type: 'GET',
					url: base_url + "user/do_init_gallerytranskrip_s1",
					success: function (data) {
						$.each(data, function (index) {
							var mockFile = {
								name: data[index].transkrip_s1,
								size: 1000000,
								type: 'image/jpeg'
							};
							element.emit("addedfile", mockFile);
							element.emit("complete", mockFile);

							// And optionally show the thumbnail of the file:
							element.emit("thumbnail", 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/64px-PDF_file_icon.svg.png');
						});
					}
				});
			},
			dictInvalidFileType: "Type file ini tidak dizinkan",
		});

		//Event ketika Memulai mengupload
		foto_transkrip_s1.on("sending", function (a, b, c) {
			a.token = Math.random();
			c.append("token_transkrip_s1", a.token); //Menmpersiapkan token untuk masing masing foto
		});
 	}



 	if ($('.content-wrapper').is('.formdata')) {

 		// AMBIL DATA KABUPATEN TRIGER PROVINSI
 		tampildata();
 		$('#provinsi').change(function () {
 			var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
 			if (provinsi_id != '') {
 				$.ajax({
 					url: base_url + 'user/get_kabupaten',
 					method: 'POST',
 					data: {
 						provinsi_id: provinsi_id
 					},
 					success: function (data) {
 						$('#kabupaten').html(data)
 					}
 				});
 			}
 		});
 		var form = $(".validation-wizard").show();

 		$(".validation-wizard").steps({
 			headerTag: "h6",
 			bodyTag: "section",
 			transitionEffect: "none",
 			titleTemplate: '<span class="step">#index#</span> #title#',
 			labels: {
 				finish: "Submit"
 			},
 			onStepChanging: function (event, currentIndex, newIndex) {
 				return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
 			},
 			onFinishing: function (event, currentIndex) {
 				return form.validate().settings.ignore = ":disabled", form.valid()
 			},
 			onFinished: function (event, currentIndex) {
 				$.ajax({
 					type: "POST",
 					url: base_url + "prosespendaftaran",
 					data: new FormData(this),
 					processData: false,
 					contentType: false,
 					cache: false,
 					async: false,


 					success: function (response) {
 						if (response == "success") {

 							Swal.fire({
 								title: "Form Pendaftaran Berhasil di Simpan",
 								text: "Silahkan kembali ke halaman Login",
 								imageUrl: base_url + "assets/loginuser/succesrest.jpg",
 								imageWidth: 550,
 								imageHeight: 225,
 								imageAlt: "Eagle Image",
 								reverseButtons: true,
 								allowOutsideClick: false
 							}).then(function () {
 								window.location = base_url + 'data-pendaftaran';
 							});


 						} else {
 							Lobibox.notify('warning', {
 								pauseDelayOnHover: true,
 								continueDelayOnInactiveTab: false,
 								position: 'top right',
 								icon: 'bx bx-error',
 								msg: 'Form Data Pendaftaran Gagal Disimpan',
 								sound: false,
 							});

 						}

 						console.log(response)
 					},

 					error: function (response) {
 						console.log(response)

 					}


 				});

 			}
 		}), $(".validation-wizard").validate({
 			ignore: "input[type=hidden]",
 			errorClass: "text-danger",
 			successClass: "text-success",
 			highlight: function (element, errorClass) {
 				$(element).removeClass(errorClass)
 			},
 			unhighlight: function (element, errorClass) {
 				$(element).removeClass(errorClass)
 			},
 			errorPlacement: function (error, element) {
 				error.insertAfter(element)
 			},
 			rules: {
 				email: {
 					email: !0
 				}
 			}
 		})
 	}

 	if ($('.content-wrapper').is('.formeditdata')) {
 		// AMBIL DATA KABUPATEN TRIGER PROVINSI
 		tampildata();
 		$('#provinsi').change(function () {
 			var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
 			if (provinsi_id != '') {
 				$.ajax({
 					url: base_url + 'user/get_kabupaten',
 					method: 'POST',
 					data: {
 						provinsi_id: provinsi_id
 					},
 					success: function (data) {
 						$('#kabupaten').html(data)
 					}
 				});
 			}
 		});


 		var form = $(".validation-wizard").show();

 		$(".validation-wizard").steps({
 			headerTag: "h6",
 			bodyTag: "section",
 			transitionEffect: "none",
 			titleTemplate: '<span class="step">#index#</span> #title#',
 			labels: {
 				finish: "Submit"
 			},
 			onStepChanging: function (event, currentIndex, newIndex) {
 				return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
 			},
 			onFinishing: function (event, currentIndex) {
 				return form.validate().settings.ignore = ":disabled", form.valid()
 			},
 			onFinished: function (event, currentIndex) {
 				$.ajax({
 					type: "POST",
 					url: base_url + "simpaneditpendaftaran",
 					data: new FormData(this),
 					processData: false,
 					contentType: false,
 					cache: false,
 					async: false,
 					success: function (response) {
 						if (response == "success") {
 							Swal.fire({
 								title: "Form Pendaftaran Berhasil di Rubah",
 								text: "Silahkan kembali ke halaman Login",
 								imageUrl: base_url + "assets/loginuser/succesrest.jpg",
 								imageWidth: 550,
 								imageHeight: 225,
 								imageAlt: "Eagle Image",
 								reverseButtons: true,
 								allowOutsideClick: false
 							}).then(function () {
 								window.location = base_url + 'data-pendaftaran';
 							});

 						} else {
 							Lobibox.notify('warning', {
 								pauseDelayOnHover: true,
 								continueDelayOnInactiveTab: false,
 								position: 'top right',
 								icon: 'bx bx-error',
 								msg: 'Form Data Pendaftaran Gagal di rubah',
 								sound: false,
 							});

 						}
 						console.log(response)
 					},
 					error: function (response) {
 						console.log(response)
 					}
 				});
 			}
 		}), $(".validation-wizard").validate({
 			ignore: "input[type=hidden]",
 			errorClass: "text-danger",
 			successClass: "text-success",
 			highlight: function (element, errorClass) {
 				$(element).removeClass(errorClass)
 			},
 			unhighlight: function (element, errorClass) {
 				$(element).removeClass(errorClass)
 			},
 			errorPlacement: function (error, element) {
 				error.insertAfter(element)
 			},
 			rules: {
 				email: {
 					email: !0
 				}
 			}
 		})
 	}



 	tampilnotif();
 	var pusher = new Pusher('b6ddec25ff4b5cc46b4f', {
 		cluster: 'ap1',
 		forceTLS: true
 	});

 	var channel = pusher.subscribe('my-channel');
 	channel.bind('my-event', function (data) {
 		if (data.message === 'notif' || data.message === 'chat') {
 			tampilnotif();
 			document.getElementById("bell").style.color = "red";
 		}
 	});


 	$("#clearNotif").click(function () {
 		$.post(base_url + "user/clearNotif", function (data) {})
 	});


 	$.validator.setDefaults({
 		submitHandler: function (form) {
 			var formData = new FormData($(form)[0]);
 			$.ajax({
 				type: "POST",
 				url: base_url + 'user/setprofproses',
 				data: formData,
 				processData: false,
 				contentType: false,
 				cache: false,
 				async: true,
 				success: function (response) {
 					if (response === "salah") {
 						Lobibox.notify('warning', {
 							pauseDelayOnHover: true,
 							continueDelayOnInactiveTab: false,
 							position: 'top right',
 							icon: 'bx bx-error',
 							msg: 'Password Lama Anda Tidak Sesuai',
 							sound: false,
 						});
 					} else if (response === "success") {
 						Swal.fire({
 							title: "Ubah Password",
 							text: "Password Anda Berhasil dirubah",
 							imageUrl: base_url + "assets/loginuser/succesrest.jpg",
 							imageWidth: 550,
 							imageHeight: 225,
 							imageAlt: "Eagle Image",
 							reverseButtons: true,
 						});
 					}
 				},
 				error: function (response) {}
 			});
 		}
 	});
 	$('#formprofile').validate({
 		rules: {
 			oldpassword: {
 				required: true,
 			},
 			newpassword: {
 				required: true,
 				minlength: 6
 			},
 			confirmpassword: {
 				required: true,
 				equalTo: '#newpassword'
 			},

 		},
 		messages: {
 			oldpassword: {
 				required: 'masukkan Password lama anda',
 			},
 			newpassword: {
 				required: 'masukkan Password baru anda',
 				minlength: 'masukkan Minimal 6 Karakter'
 			},

 			confirmpassword: {
 				required: 'masukkan Konfirmasi Password',
 				equalTo: "Password harus sama dengan sebelumnya"
 			},
 		},

 		errorElement: 'span',
 		errorPlacement: function (error, element) {
 			error.addClass('invalid-feedback');
 			error.addClass('ml-3');
 			error.addClass('text-danger');
 			element.closest('.form-group').append(error);
 		},
 		highlight: function (element, errorClass, validClass) {
 			$(element).addClass('is-invalid');
 		},
 		unhighlight: function (element, errorClass, validClass) {
 			$(element).removeClass('is-invalid');
 		}

 	});

	 function tampilbayar() {
	
		$.ajax({
			type: "GET",
			url: base_url + "user/showdatabayar",
			dataType: "JSON",
			data: {
				
			},
			success: function (data) {
				$.each(data, function () {
					if(data.bukti === null){
					$('[id="imgbayar"]').addClass('d-none');
						$('[name="kodedit"]').val(data.id);
					}
					else{
						$('[id="imgbayar"]').attr("src",
						base_url + "assets/upload/images/buktipembayaran/" + data
						.bukti);
						$('[name="kodedit"]').val(data.id);
					}
	
				});
			}
		});
		return false;
	
	}

	 if ($('.content-wrapper').is('.pembayaran')) {
		tampilbayar();
		$.validator.setDefaults({
			submitHandler: function (form) {
				var formData = new FormData($(form)[0]);
				$.ajax({
					type: "POST",
					url: base_url + "user/simpanbayar",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
	
	
					success: function (response) {
						if (response == "success") {
							Lobibox.notify('success', {
								pauseDelayOnHover: true,
								continueDelayOnInactiveTab: false,
								position: 'top right',
								icon: 'bx bx-error',
								msg: 'Success Upload',
								sound: false,
							});
							tampilbayar();
	
						} else if (response == "error") {
							Lobibox.notify('warning', {
								pauseDelayOnHover: true,
								continueDelayOnInactiveTab: false,
								position: 'top right',
								icon: 'bx bx-error',
								msg: 'Gagal Upload',
								sound: false,
							});
							tampilbayar();
	
						} else {
							Lobibox.notify('warning', {
								pauseDelayOnHover: true,
								continueDelayOnInactiveTab: false,
								position: 'top right',
								icon: 'bx bx-error',
								msg: 'Gagal',
								sound: false,
							});
							tampilbayar();
						}
						
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
		$('#formpembayaran').validate({
	
			rules: {
				
				buktibayar: {
					required: true,
				},
				
			},
			messages: {
				
				buktibayar: {
					required: 'Pilih File Bukti Pembayaran',
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
	
	 };
 })
