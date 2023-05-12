
$(document).ready(function () {
    $("#desc").summernote({
        height: "200px",
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['misc', ['fullscreen', 'codeview', 'help']],
        ],
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            },
            onMediaDelete: function(target) {
                deleteImage(target[0].src);
            }
        }
        
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: base_url + "programstudi/upload_img",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $("#desc").summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteImage(src) {
        $.ajax({
            data: {
                src: src
            },
            type: "POST",
            url: base_url + "programstudi/delete_img",
            cache: false,
            success: function(response) {
                console.log(response);
            }
        });
    }


$('#datajurusan').DataTable({

"responsive": true,
"lengthChange": true,
"autoWidth": false,
"paging": true,

"ajax": {
    url: base_url + "programstudi/getdata",
    type: 'GET',
    

},

});

$('#clear').on('click', function () {
    
$('[name="kode"]').val("");
                    $('[name="kodedit"]').val("");
                    $('[name="jurusan"]').val("");
                    $('[name="biaya"]').val("");
                    $('[name="instagram"]').val("");
                    $('[id="desc"]').summernote('code', '')



                    $('[name="jurusan_thumbnail"]').val("");
                    $('[id="fotojurusan"]').attr("src",
                    "");


});


//tambah data edit data

$.validator.setDefaults({
    submitHandler: function (form) {
        
        var formData = new FormData($(form)[0]);
        $.ajax({
            type: "POST",
            url: base_url + "programstudi/simpan",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,


            success: function (response) {
                if (response == "ada") {
                    $('[name="kode"]').val("");
                    $('[name="jurusan"]').val("");
                    $('[name="biaya"]').val("");
                    $('[name="instagram"]').val("");
                    $('[name="jurusan_thumbnail"]').val("");
                    $('[id="desc"]').summernote('code', '')
                    $('[id="fotojurusan"]').attr("src",
                    "");
                    $('#datajurusan').DataTable().ajax.reload();
                    toastr.warning('Kode Jurusan sudah ada');
                } else if (response == "success") {
                
                    $('[name="kode"]').val("");
                    $('[name="kodedit"]').val("");
                    $('[name="jurusan"]').val("");
                    $('[name="instagram"]').val("");
                    $('[name="biaya"]').val("");
                    $('[id="desc"]').summernote('code', '')



                    $('[name="jurusan_thumbnail"]').val("");

                    
                    toastr.success('Data berhasil disimpan');
                    $('[id="fotojurusan"]').attr("src",
                    "");
                    $('#datajurusan').DataTable().ajax.reload();


                } else if (response == "adadaftar") {
                
                $('[name="kode"]').val("");
                $('[name="kodedit"]').val("");
                $('[name="jurusan"]').val("");
                $('[name="biaya"]').val("");
                $('[name="instagram"]').val("");
                $('[id="desc"]').summernote('code', '')

                $('[id="fotojurusan"]').attr("src",
                    "");
                
                toastr.success('Nama jurusan berhasil diupdate, Kode tidak bisa diedit Sudah ada pendaftar');
                $('#datajurusan').DataTable().ajax.reload();
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
        kode: {
            required: true,
            number: true,
            maxlength: 4

        },
        biaya: {
            required: true,
            number: true,
            

        },
        jurusan: {
            required: true,
            

        },
        
            jurusan_thumbnail: {
             required: function(){
                return $("#kodedit").val() === ""
                ;}
                


        }	
    },
    messages: {
        jurusan: {
            required: 'masukkan Nama jurusan',

        },
        kode: {
            required: 'masukkan Kode jurusan',

        },
        biaya: {
            required: 'masukkan Biaya Pendaftaran',

        },
        
        jurusan_thumbnail: {
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



//editview

$('#datajurusan').on('click', '.bedit', function () {
    var id = $(this).attr('data');
    $.ajax({
        type: "GET",
        url: base_url + "programstudi/showedit",
        dataType: "JSON",
        data: {
            id: id
        },
        success: function (data) {
            $.each(data, function (judul ) {

                $('[name="kodedit"]').val(id);
                $('[name="kode"]').val(data.kode);
                $('[name="biaya"]').val(data.biaya);
                $('[name="jurusan"]').val(data.jurusan);
                $('[name="instagram"]').val(data.instagram);
                $('[id="desc"]').summernote('code', data.deskripsi)

                $('[id="fotojurusan"]').attr("src",
                    base_url + "assets/upload/images/jurusan/" + data
                    .foto);
                    $('[id="fotojurusan"]').attr("style",
                    "border: 1px solid #4B49AC ; border-radius: 12px;");
                
            });
        }
    });
    return false;
});

// modal hapus

$('#datajurusan').on('click', '.bhapus', function () {
    var id = $(this).attr('data');
    swal.fire({
title: 'Yakin Menghapus data ini?',
text: "Tekan ya jika anda yakin ?",
type: 'warning',
showCancelButton: true,
confirmButtonText: 'Yes'
    }).then(function(result) { 
if (result.value) {
    $.ajax({
        url : base_url + 'programstudi/hapus',
        type : 'POST',
        dataType:'json',
        data: {
            id: id
        },
       
        success: function(jqXHR, textStatus) { 
            if (respon == "success") {

                
                        $('#datajurusan').DataTable().ajax.reload();


                        } else {
                        
                       
                        }

                        console.log(response)
         },
        complete: function() {
            swal.hideLoading();
        },

        error: function(a, textStatus) {
            if (a.responseText=='success') {
                $('#datajurusan').DataTable().ajax.reload();
                swal.fire("Ups ", "Data Berhasil Di hapus", "success");
            } else if(a.responseText=='ada') {

                swal.fire("Ups ", "Jurusan sudah ada yang mendaftar", "error");

                
            }
            
            console.log(a.responseText)
        }

    });
}
});
   
});
});