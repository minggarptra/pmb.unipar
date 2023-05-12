$(document).ready(function() {
    $('#datakegiatan').DataTable({

    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "paging": true,

    "ajax": {
        url: base_url + "berita/getdata",
        type: 'GET',
    },

    });


$("#post_body").summernote({
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

$("#epost_body").summernote({
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
            EdituploadImage(image[0]);
        },
        onMediaDelete: function(target) {
            EditdeleteImage(target[0].src);
        }
    }
});



// summernote upload delete image
function EdituploadImage(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        url: base_url + "berita/upload_image",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
            $("#epost_body").summernote("insertImage", url);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function EditdeleteImage(src) {
    $.ajax({
        data: {
            src: src
        },
        type: "POST",
        url: base_url + "berita/delete_image",
        cache: false,
        success: function(response) {
            console.log(response);
        }
    });
}

function uploadImage(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        url: base_url + "berita/upload_image",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
            $("#post_body").summernote("insertImage", url);
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
        url: base_url + "berita/delete_image",
        cache: false,
        success: function(response) {
            console.log(response);
        }
    });
}



$.validator.setDefaults({
    submitHandler: function (form) {
        var formData = new FormData($(form)[0]);

    $.ajax({
        type: "POST",
        url: base_url + "berita/simpan_kegiatan",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,

        success: function(response) {

            if (response == "success") {
                $('[name="post_title"]').val("");
                $('#post_body').summernote('code', '');
                $('[name="post_date"]').val("");
                $('[name="post_thumbnail"]').val("");
                $('#modal-add').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                toastr.success('Data berhasil disimpan');
                $('#datakegiatan').DataTable().ajax.reload();


            } else {
                toastr.failed('Data Gagal disimpan');
            }

            console.log(response)
        },

        error: function(response) {
            toastr.failed('Data Gagal disimpan');

        }
    });
}
});
$('#inputform').validate({
    rules: {
        post_title: {
            required: true,

        },
        post_body: {
            required: true,

        },
        post_date: {
            required: true,

        },
        post_thumbnail: {
            required: true


        },




    },
    messages: {
        post_title: {
            required: 'masukkan Judul',

        },
        post_body: {
            required: true,

        },
        post_date: {
            required: 'Pilih Tanggal',

        },
        post_thumbnail: {
            required: 'Pilih Gambar',


        },





    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});



//saveedit
$('#editform').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: base_url +"berita/simpanedit",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,


        success: function(response) {
            if (response == "success") {

                $('[name="epost_title"]').val("");
                $('#epost_body').summernote('code', '');

                $('[name="epost_date"]').val("");
                $('[name="epost_thumbnail"]').val("");
                $('#modal-edit').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                toastr.success('Data berhasil disimpan');

                $('#datakegiatan').DataTable().ajax.reload();


            } else {
                toastr.success('Data gagal diedit');

            }

            console.log(response)
        },

        error: function(response) {
            toastr.success('Error');

        }


    });
})





// showedit data
$('#datakegiatan').on('click', '.bedit', function() {
    var id = $(this).attr('data');
    $.ajax({
        type: "GET",
        url: base_url + "berita/showedit",
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(data) {
            $.each(data, function(judul, id, isi, foto, tanggal) {
                $('#modal-edit').modal('show');
                $('[name="kodedit"]').val(id);
                $('[name="epost_title"]').val(data.judul);
                $('[name="epost_date"]').val(data.tanggal);
                $('[id="foto"]').attr("src",
                    base_url + "assets/upload/images/kegiatan/" + data
                    .foto);

                $('[name="epost_body"]').summernote('code', data.isi)




            });
        }
    });
    return false;
});


//hapus data
//GET HAPUS


$('#datakegiatan').on('click', '.bhapus', function () {
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
        url : base_url + 'berita/hapus_kegiatan',
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
                $('#datakegiatan').DataTable().ajax.reload();
                toastr.success('Data berhasil dihapus');

            } else if(a.responseText=='ada') {

                toastr.failed('Data gagal dihapus');


                
            }
            
            console.log(a.responseText)
        }

    });
}
});
   
});
});