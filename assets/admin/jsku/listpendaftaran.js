var table;


$(document).ready(function () {
	// ajaxcsrf();

 

	table = $("#listdaftar").DataTable({
		initComplete: function () {
			var api = this.api();
			$("#listdaftar_filter input")
				.off(".DT")
				.on("keyup.DT", function (e) {
					api.search(this.value).draw();
				});
		},
		dom: "<'row'<'col-md-3 text-center text-md-left'l><'col-md-6 text-center'B><'col-md-3 text-center'f>>" +
			"<'row'<'col-md-12'tr>>" +
			"<'row'<'col-md-5'i><'col-md-7'p>>",
		buttons: [{
				extend: "copy",
				exportOptions: {
					columns: [1, 2, 3, 4, 5]
				}
			},
			{
				extend: "print",
				exportOptions: {
					columns: [1, 2, 3, 4, 5]
				}
			},
			{
				extend: "excel",
				exportOptions: {
					columns: [1, 2, 3, 4, 5]
				}
			},
			{
				extend: "pdf",
				exportOptions: {
					columns: [1, 2, 3, 4, 5]
				}
			}
		],
		oLanguage: {
			sProcessing: "loading..."
		},
		processing: true,
		serverSide: true,
		ajax: {
			url: base_url + "pendaftaran/datapendaftaran",
			type: "POST"
		},
		columns: [

			{
				data: "id",
				orderable: false,
				searchable: false
			},
			{
				data: "no_pendaftaran"
			},
			{
				data: "namalengkap"
			},
			{
				data: "nama_prodi"
			},
			{
				data: "statusbayar",
                render: function (data, type, row, meta) {
                    if (`${data}` === 'Lunas') {
                        return `<div class="text-center">
                                    <a  class="btn btn-xs btn-success  text-light">
                                        <i class="fa fa-check"></i> ${data}
                                    </a>
                                </div>`;
                        
                    } else {

                        return `<div class="text-center">
                                    <a  class="btn btn-xs btn-warning  text-light">
                                        <i class="fa fa-times"></i> ${data}
                                    </a>
                                </div>`;
                        
                    }
                    
                }


			},
			{
				data: "foto",
                render: function (data, type, row, meta) {
                    if (`${data}` === 'null') {
                        return `<div class="text-center">
                                    <a  class="btn btn-xs btn-warning  text-light">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>`;
                        
                    } else {
                        let geturl= base_url+ "assets/upload/images/foto/"  ;
                        return `<div class="text-center">
                                    <a href="${geturl}${data}"  class="btn btn-xs btn-info  text-light">
                                        <i class="fa fa-share"></i> lihat
                                    </a>
                                </div>`;
                        
                    }
                    
                }

			},
			{
				data: "ijazah",
                render: function (data, type, row, meta) {
                    if (`${data}` === 'null') {
                        return `<div class="text-center">
                                    <a  class="btn btn-xs btn-warning  text-light">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>`;
                        
                    } else {
                        let geturl= base_url+ "assets/upload/images/ijazah/"  ;
                        return `<div class="text-center">
                                    <a href="${geturl}${data}"  class="btn btn-xs btn-info  text-light">
                                        <i class="fa fa-share"></i> lihat
                                    </a>
                                </div>`;
                        
                    }
                    
                }
			},
			{
				data: "kk",
                render: function (data, type, row, meta) {
                    if (`${data}` === 'null') {
                        return `<div class="text-center">
                                    <a  class="btn btn-xs btn-warning  text-light">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>`;
                        
                    } else {
                        let geturl= base_url+ "assets/upload/images/kk/"  ;
                        return `<div class="text-center">
                                    <a href="${geturl}${data}"  class="btn btn-xs btn-info  text-light">
                                        <i class="fa fa-share"></i> lihat
                                    </a>
                                </div>`;
                        
                    }
                    
                }
			}
		],
		columnDefs: [{
			targets: 8,
			data: "no_pendaftaran",
			render: function (data, type, row, meta) {
				let detailurl=  base_url +"pendaftaran-list-detail/";
				return `<div class="text-center">
                                <a href="${detailurl}${data}" class="btn btn-xs btn-info text-light">
                                    <i class="fa fa-external-link"></i> Detail
                                </a>
                            </div>`;
			}
		}],
		order: [
			[1, "desc"]
		],
		rowId: function (a) {
			return a;
		},
		rowCallback: function (row, data, iDisplayIndex) {
			var info = this.fnPagingInfo();
			var page = info.iPage;
			var length = info.iLength;
			var index = page * length + (iDisplayIndex + 1);
			$("td:eq(0)", row).html(index);
		}
	});

	table
		.buttons()
		.container()
		.appendTo("#listdaftar_wrapper .col-md-6:eq(0)");



	$('#listdaftar').on('click', '.bhapus', function (e) {
		var id = $(this).attr('data');
		e.preventDefault();
		e.stopImmediatePropagation();
		Swal({
			title: 'Anda yakin?',
			text: "Data akun , Form Pendaftaran, Invoice  dan Berkas akan dihapus !",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus!'
		}).then((result) => {
			if (result.value) {


				$.ajax({
					type: "POST",
					url: "pendaftaran/hapusakun",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function (respon) {
						if (respon.status) {
							Swal({
								"title": "Berhasil",
								"text": " data berhasil dihapus",
								"type": "success"
							});
						} else {
							Swal({
								"title": "Gagal",
								"text": "Tidak ada data yang dipilih",
								"type": "error"
							});
						}
						$('#listdaftar').DataTable().ajax.reload();

					}
				});
			}
		});
	})
});
