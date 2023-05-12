let chatBox = document.getElementById('scrolbotom');


function scrollToBottom() {
			
    if (!chatBox.classList.contains('active')) {
        chatBox.scrollTop = chatBox.scrollHeight;
    }

}


if ($('.content-wrapper').is('.chatdata')) {

            const btn = document.getElementById("btnkirim");
			const pesan = document.getElementById("pesan");
			let chatBox = document.getElementById('scrolbotom');

			deactivate();
		

			function scrollToBottom() {
			
					if (!chatBox.classList.contains('active')) {
						chatBox.scrollTop = chatBox.scrollHeight;
					}
				
			}
			
			function activate() {
				btn.disabled = false;
			}
			
			function deactivate() {
				btn.disabled = true;
			}

			function check() {
				if (pesan.value != '') {
				activate()
				} else {
				deactivate()
				}
			}
			pesan.addEventListener('input', check)
            tampildata();
			scrollToBottom();

			
 
				var pusher = new Pusher('b6ddec25ff4b5cc46b4f', {
					cluster: 'ap1',
					forceTLS: true
				});

				var channel = pusher.subscribe('my-channel');
				channel.bind('my-event', function(data) {
					if(data.message === 'chat'){
						tampildata();
						scrollToBottom();


					}
				});
			
			
			function tampildata() {
			
			$.ajax({
				type: "GET",
				url: base_url + "user/getMessage",
				async : false,
                dataType : 'JSON',
				success: function(data) {
					 var html = '';
                   	 var i;
                    for(i=0; i < data.length; i++){
						if(data[i].pengirim == user){
						 html += '<li class="right"><div style="max-width:50%" class="conversation-list"><div class="user-chat-content "><div class="ctext-wrap"><div class="ctext-wrap-content  "><p class="mb-0 text-wrap">'+data[i].isi+'</p><p class="chat-time mb-0"><iclass="ri-time-line align-middle"></i> <spanclass="align-middle">'+data[i].waktu+'</span></p></div></div><div class="conversation-name">Anda</div></div></div></li>';

                        
						}
						else{
						html += '<li><div style="max-width:50%" class="conversation-list "><div class="chat-avatar"><img src="'+base_url+'assets/upload/images/profile/'+fotoadmin+'"alt=""></div><div class="user-chat-content"><div class="ctext-wrap"><div class="ctext-wrap-content"><p class="mb-0">'+data[i].isi+'</p><p class="chat-time mb-0"><iclass="ri-time-line align-middle"></i> <spanclass="align-middle">'+data[i].waktu+'</span></p></div></div><div class="conversation-name">Admin</div></div></div></li>';
						}

                    }
                    $('#isichat').html(html);
                    
					
				}
			});
			return false;

			}

			$.validator.setDefaults({
			submitHandler: function (form) {
				
				var formData = new FormData($(form)[0]);
				$.ajax({
					type: "POST",
					url:  base_url+"user/sendmessage",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: false,


					success: function (response) {
						if (response == "error") {
							$('[name="pesan"]').val("");
							
							
                            Lobibox.notify('warning', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                icon: 'bx bx-error',
                                msg: 'Pesan Gagal Dikirim',
                                sound: false,
                            });
						} else if (response == "success") {
						
                            $('[name="pesan"]').val("");
							tampildata();
							deactivate();
							scrollToBottom();
                            Lobibox.notify('success', {
                                pauseDelayOnHover: true,
                                continueDelayOnInactiveTab: false,
                                position: 'top right',
                                icon: 'bx bx-check-circle',
                                msg: 'Pesan Berhasil dikirim',
                                sound: false,
                            });
                            
							
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
		$('#chatform').validate({
			
			rules: {
				pesan: {
					required: true,
                    

				},
					
			},
			messages: {
				pesan: {
					required: 'Tulis Pesan',

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
    
}


$(document).on('pjax:complete', function (event) {

    if ($('.content-wrapper').is('.chatdata')) {

                const btn = document.getElementById("btnkirim");
                const pesan = document.getElementById("pesan");
                let chatBox = document.getElementById('scrolbotom');
    
                deactivate();
                tampildata();
                scrollToBottom();
            
    
                function scrollToBottom() {
                
                        if (!chatBox.classList.contains('active')) {
                            chatBox.scrollTop = chatBox.scrollHeight;
                        }
                    
                }
                
                function activate() {
                    btn.disabled = false;
                }
                
                function deactivate() {
                    btn.disabled = true;
                }
    
                function check() {
                    if (pesan.value != '') {
                    activate()
                    } else {
                    deactivate()
                    }
                }
                pesan.addEventListener('input', check)
              
                    var pusher = new Pusher('b6ddec25ff4b5cc46b4f', {
                        cluster: 'ap1',
                        forceTLS: true
                    });
    
                    var channel = pusher.subscribe('my-channel');
                    channel.bind('my-event', function(data) {
                        if(data.message === 'chat'){
                            tampildata();
                            scrollToBottom();
    
    
                        }
                    });
                
                
                function tampildata() {
                
                $.ajax({
                    type: "GET",
                    url: base_url + "user/getMessage",
                    async : false,
                    dataType : 'JSON',
                    success: function(data) {
                         var html = '';
                            var i;
                        for(i=0; i < data.length; i++){
                            if(data[i].pengirim == user){
                             html += '<li class="right"><div style="max-width:50%" class="conversation-list"><div class="user-chat-content "><div class="ctext-wrap"><div class="ctext-wrap-content  "><p class="mb-0 text-wrap">'+data[i].isi+'</p><p class="chat-time mb-0"><iclass="ri-time-line align-middle"></i> <spanclass="align-middle">'+data[i].waktu+'</span></p></div></div><div class="conversation-name">Anda</div></div></div></li>';
    
                            
                            }
                            else{
                            html += '<li><div style="max-width:50%" class="conversation-list "><div class="chat-avatar"><img src="'+base_url+'assets/images/profile/'+fotoadmin+'"alt=""></div><div class="user-chat-content"><div class="ctext-wrap"><div class="ctext-wrap-content"><p class="mb-0">'+data[i].isi+'</p><p class="chat-time mb-0"><iclass="ri-time-line align-middle"></i> <spanclass="align-middle">'+data[i].waktu+'</span></p></div></div><div class="conversation-name">Admin</div></div></div></li>';
                            }
    
                        }
                        $('#isichat').html(html);
                        
                        
                    }
                });
                return false;
    
                }
    
                $.validator.setDefaults({
                submitHandler: function (form) {
                    
                    var formData = new FormData($(form)[0]);
                    $.ajax({
                        type: "POST",
                        url:  base_url+"user/sendmessage",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
    
    
                        success: function (response) {
                            if (response == "error") {
                                $('[name="pesan"]').val("");
                                
                                
                                Lobibox.notify('warning', {
                                    pauseDelayOnHover: true,
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    icon: 'bx bx-error',
                                    msg: 'Pesan Gagal Dikirim',
                                    sound: false,
                                });
                            } else if (response == "success") {
                            
                                $('[name="pesan"]').val("");
                                tampildata();
                                deactivate();
                                scrollToBottom();
                                Lobibox.notify('success', {
                                    pauseDelayOnHover: true,
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    icon: 'bx bx-check-circle',
                                    msg: 'Pesan Berhasil dikirim',
                                    sound: false,
                                });
                                
                                
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
            $('#chatform').validate({
                
                rules: {
                    pesan: {
                        required: true,
                        
    
                    },
                        
                },
                messages: {
                    pesan: {
                        required: 'Tulis Pesan',
    
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
        
    }
})