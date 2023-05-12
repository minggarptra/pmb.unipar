function btnloading(){
    document.getElementById("loadbtn").classList.remove('d-none');
}


function showPass() {
    if (document.getElementById("password").type == 'password') {
        document.getElementById("password").type = 'text';

        document.getElementById("iconshow").classList.add('text-warning');
    } else {
        document.getElementById("password").type = 'password';
       
        document.getElementById("iconshow").classList.remove('text-warning');
       
    }
}

$.validator.setDefaults({
    submitHandler: function (form) {
       
        document.getElementById("loadbtn").classList.remove('d-none');
        
        var formData = new FormData($(form)[0]);
        $.ajax({
            type: "POST",
            url: base_url + 'login',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (response) {
              
                if (response === "notregist") {
               
                   
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-error',
                        msg: 'Akun belum terdaftar',
                        sound: false,
                    });
                    document.getElementById("loadbtn").classList.add('d-none');

                }

                else if (response === "failed") {
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-error',
                        msg: 'Login Gagal , E-mail atau password salah',
                        sound: false,
                    });
                    document.getElementById("loadbtn").classList.add('d-none');

                }


                else if (response === "notactive") {
                   
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-info-circle',
                        msg: 'Akun anda belum aktif',
                        sound: false,
                    });
                    document.getElementById("loadbtn").classList.add('d-none');

                }

                else if (response === "success") {
                    window.location = base_url + 'user';
                }


            },

            error: function (response) {
   
            }
        });
    }
});
$('#formlogin').validate({
    
    rules: {
        email: {
            required: true,
            email:true,
           

        },
        password: {
            required: true,
            // minlength:6
            
            

        },
       
    },
    messages: {
        email: {
            required: 'masukkan Email anda',
            email: 'format Email salah'

        },
        password: {
            required: 'masukkan Password anda',
            // minlength:'masukkan Minimal 6 Karakter'

        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        error.addClass('ml-5');
        error.addClass('text-info');
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
        document.getElementById("loadbtn").classList.remove('d-none');
       
        var formData = new FormData($(form)[0]);
        $.ajax({
            type: "POST",
            url: base_url + 'register-save',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (response) {
              
                if (response === "emailregist") {
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-error',
                        msg: 'Email Sudah Terdaftar',
                        sound: false,
                    });
                    document.getElementById("loadbtn").classList.add('d-none');

                   
                }

                else if (response === "hpregist") {
                    Lobibox.notify('info', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-error',
                        msg: 'Nomor HP Sudah Terdaftar',
                        sound: false,
                    });
                    document.getElementById("loadbtn").classList.add('d-none');

                    

                }


                
                else if (response === "success") {
                    // Swal.fire({
                    //     title: "Email Confirmation",
                    //     text: "Kami telah mengirim LINK Verifikasi pendaftaran ke Email anda , cek Inbox atau Spam",
                    //     imageUrl: base_url + "assets/loginuser/email.jpg",
                    //     imageWidth: 550,
                    //     imageHeight: 225,
                    //     imageAlt: "Eagle Image",
                    //     reverseButtons: true,
                    //   });
                    Swal.fire({
                        title: "Email Confirmation",
                        text: "Kami telah mengaktifkan akun pendaftaran anda, anda akan dialihkan secara otomatis ke halaman Login",
                        imageUrl: base_url + "assets/loginuser/email.jpg",
                        imageWidth: 550,
                        imageHeight: 225,
                        imageAlt: "Eagle Image",
                        reverseButtons: true,
                        // Tambahan
                        allowOutsideClick : false,
                    }).then(function (){
                        window.location = base_url + 'login';
                    });
                }


            },

            error: function (response) {
   
            }
        });
    }
});
$('#registform').validate({
    
    rules: {
        name: {
            required: true,
            
        },
        jurusan: {
            required: true,
            
        },
        nohp: {
            required: true,
            number:true,
            minlength:11,
            maxlength:15
        },
        email: {
            required: true,
            email:true,
        },
        password: {
            required: true,
            minlength:6
        },
        confirmpassword: {
            required: true,
            equalTo: '#password'
        },
       
    },
    messages: {
        email: {
            required: 'masukkan Email anda',
            email: 'format Email salah'

        },
        password: {
            required: 'masukkan Password anda',
           minlength:'masukkan Minimal 6 Karakter'
        },

        confirmpassword: {
            required: 'masukkan Konfirmasi Password',
      
            equalTo: "Password harus sama dengan sebelumnya"
        },
        name: {
            required: 'masukkan Nama lengkap anda',
            
        },
        jurusan: {
            required: 'pilih Jurusan anda',
            
        },

    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        error.addClass('ml-5');
        error.addClass('text-info');
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
            url: base_url + 'auth/proses_reset',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (response) {
              
                if (response === "notregist") {
               
                   
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-error',
                        msg: 'Email Tidak terdaftar',
                        sound: false,
                    });
                    document.getElementById("loadbtn").classList.add('d-none');

                }

                else if (response === "success") {
                    Swal.fire({
                        title: "Reset Password",
                        text: "Kami telah mengirim LINK RESET PASSWORD ke Email anda , cek Inbox atau Spam",
                        imageUrl: base_url + "assets/loginuser/email.jpg",
                        imageWidth: 550,
                        imageHeight: 225,
                        imageAlt: "Eagle Image",
                        reverseButtons: true,
                      });
                    document.getElementById("loadbtn").classList.add('d-none');

                }


            },

            error: function (response) {
   
            }
        });
    }
});
$('#formreset').validate({
    
    rules: {
        email: {
            required: true,
            email:true,
           

        },
        
    },
    messages: {
        email: {
            required: 'masukkan Email anda',
            email: 'format Email salah'

        }
    },
    
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        error.addClass('ml-3');
        error.addClass('text-info');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        document.getElementById("loadbtn").classList.add('d-none');
    }
    
});


$.validator.setDefaults({
    
    submitHandler: function (form) {
       
     
        var formData = new FormData($(form)[0]);
        $.ajax({
            type: "POST",
            url: base_url + 'auth/proses_reconfirm',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (response) {
              
                if (response === "notregist") {
               
                   
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-error',
                        msg: 'Email Tidak terdaftar',
                        sound: false,
                    });
                    document.getElementById("loadbtn").classList.add('d-none');

                }

                if (response === "aktif") {
               
                   
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-error',
                        msg: 'User dengan Email ini Sudah Aktif',
                        sound: false,
                    });
                    document.getElementById("loadbtn").classList.add('d-none');

                }

                else if (response === "success") {
                    Swal.fire({
                        title: "Konfirmasi Ulang",
                        text: "Kami telah mengirim LINK Konfirmasi Ulang  ke Email anda , cek Inbox atau Spam",
                        imageUrl: base_url + "assets/loginuser/email.jpg",
                        imageWidth: 550,
                        imageHeight: 225,
                        imageAlt: "Eagle Image",
                        reverseButtons: true,
                      });
                    document.getElementById("loadbtn").classList.add('d-none');

                }


            },

            error: function (response) {
   
            }
        });
    }
});
$('#formconfirm').validate({
    
    rules: {
        email: {
            required: true,
            email:true,
           

        },
        
    },
    messages: {
        email: {
            required: 'masukkan Email anda',
            email: 'format Email salah'

        }
    },
    
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        error.addClass('ml-3');
        error.addClass('text-info');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        document.getElementById("loadbtn").classList.add('d-none');
    }
    
});


$.validator.setDefaults({
    submitHandler: function (form) {
        var formData = new FormData($(form)[0]);
        $.ajax({
            type: "POST",
            url: base_url + 'auth/new_pas_proc',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (response) {
              
                

                 if (response === "success") {
                    Swal.fire({
                        title: "Reset Password Berhasil",
                        text: "Silahkan kembali ke halaman Login",
                        imageUrl: base_url + "assets/loginuser/succesrest.jpg",
                        imageWidth: 550,
                        imageHeight: 225,
                        imageAlt: "Eagle Image",
                        reverseButtons: true,
                        allowOutsideClick: false
                      }).then(function() {
                        window.location = base_url + 'login';
                    });

                    
                }


            },

            error: function (response) {
   
            }
        });
    }
});
$('#formnewpassword').validate({
    
    rules: {
        password: {
            required: true,
            minlength:6
        },
        confirmpassword: {
            required: true,
            equalTo: '#password'
        },
       
    },
    messages: {
        password: {
            required: 'masukkan Password anda',
           minlength:'masukkan Minimal 6 Karakter'
        },

        confirmpassword: {
            required: 'masukkan Konfirmasi Password',
      
            equalTo: "Password harus sama dengan sebelumnya"
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        error.addClass('ml-5');
        error.addClass('text-info');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        document.getElementById("loadbtn").classList.add('d-none');

    }
});