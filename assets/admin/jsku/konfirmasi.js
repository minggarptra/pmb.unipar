var table;

$(document).ready(function () {
	// ajaxcsrf();

	table = $("#akun").DataTable({
		initComplete: function () {
			var api = this.api();
			$("#akun_filter input")
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
					columns: [1,2,3,4,5,6]
				}
			},
			{
				extend: "print",
				exportOptions: {
					columns: [1,2,3,4,5,6]
				}
			},
			{
				extend: "excel",
				exportOptions: {
					columns: [1,2,3,4,5,6]
				}
			},
			{
				extend: "pdf",
				exportOptions: {
					columns: [1,2,3,4,5,6]
				}
			}
		],
		oLanguage: {
			sProcessing: "loading..."
		},
		processing: true,
		serverSide: true,
		ajax: {
			url: base_url + "pendaftaran/datakonfirmasi",
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
				data: "tanggal_daftar"
			},
			{
				data: "bukti",
                render: function (data, type, row, meta) {
                    if (`${data}` === 'null') {
                        return `<div class="text-center">
                                    <a  class="btn btn-xs btn-warning  text-light">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>`;
                        
                    } else {
                        let geturl= base_url+ "assets/upload/images/buktipembayaran/"  ;
                        return `<div class="text-center">
                                    <a target="blank" href="${geturl}${data}"  class="btn btn-xs btn-info  text-light">
                                        <i class="fa fa-share"></i> lihat
                                    </a>
                                </div>`;
                        
                    }
                    
                }
			},
			{
				data: "pay_status"
			}
		],
		columnDefs: [{
			targets: 7,
			data: "no_pendaftaran",
			render: function (data, type, row, meta) {
				return `<div class="text-center">
                                <a  data="${data}" class="btn btn-xs btn-info bhapus text-light">
                                    <i class="fa fa-check"></i> Konfirmasi
                                </a>
                            </div>`;
			}
		}],
		order: [
			[4, "desc"]
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
		.appendTo("#akun_wrapper .col-md-6:eq(0)");



    $('#akun').on('click', '.bhapus', function (e) {
      var id = $(this).attr('data');
      e.preventDefault();
      e.stopImmediatePropagation();
      Swal({
        title: 'Anda yakin?',
        text: "Pastikan Data Pembayaran Sudah Sesuai dan Masuk pada Saldo Rekening",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Konfirmasi!'
      }).then((result) => {
        if (result.value) {
  
  
          $.ajax({
            type: "POST",
            url: "pendaftaran/konfirmact",
            dataType: "JSON",
            data: {
              id: id
            },
            success: function (respon) {
              if (respon.status) {
                Swal({
                  "title": "Berhasil",
                  "text": " data berhasil dikonfirmasi",
                  "type": "success"
                });
              } else {
                Swal({
                  "title": "Gagal",
                  "text": "Tidak ada data yang dipilih",
                  "type": "error"
                });
              }
              $('#akun').DataTable().ajax.reload();
  
            }
          });
        }
      });
    })
});


