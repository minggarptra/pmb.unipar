<?php $this->load->view('admin/partials/header2'); ?>

<div class="row">
<div class="col-md-12">
<div  class="box direct-chat direct-chat-success ">
	<div class="box-header with-border">
    <img style="margin: 0; padding: 0; width: 50px;"src="<?= base_url('assets/upload/images/profile/'.$fotouser) ?>"alt="user">
		<h3 class="box-title ml-15"><?= $subjudul ?> </h3> <?= $nodaftar ?>
        

		<div class="box-tools pull-right">
			
			<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
				data-widget="chat-pane-toggle">
				<i class="fa fa-comments"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			</button>
			
		</div>
	</div>
	<!-- /.box-header -->
	<div class=" box-body  ">
		<!-- Conversations are loaded here -->
		<div class=" nanagemoy p-15" id="isichat">
		</div>
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<form id="chatform" >
			<div class="input-group">
				<input  type="text" id="pesan" name="pesan" placeholder="Tulis Pesan ..." class="form-control">
				<input type="hidden" name="user" value="<?= $iduser ?>">
				<span class="input-group-btn">
					<button id="button-addon2" type="submit" class="btn bg-green btn-flat">Kirim Pesan</button>
				</span>
			</div>
		</form>
	</div>
	<!-- /.box-footer-->
</div>
<!--/.direct-chat -->

</div>

</div>
<script  type="text/javascript">
    $(document).ready(function () {
        $('.nanagemoy').slimScroll({
		height: '400px'
	});

            const btn = document.getElementById("button-addon2");
			const pesan = document.getElementById("pesan");
			let chatBox = document.getElementById('isichat');
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
					if(data.message === 'chatadmin'){
						tampildata();
						scrollToBottom();

					}
				});
			
			
			function tampildata() {
			
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>inbox/getMessage",
				async : false,
                dataType : 'JSON',
				data: {
					id: <?= $iduser ?>
				},
				success: function(data) {
					 var html = '';
                   	 var i;
                    for(i=0; i < data.length; i++){
						if(data[i].pengirim == 'admin'){
						 html += '<div class="direct-chat-msg right"><div class="direct-chat-info clearfix"></br><span class="direct-chat-timestamp pull-right">'+data[i].waktu+'</span></div><div class="direct-chat-text pull-right">'+data[i].isi+'.</div></div>';
						}
						else{
						html += '<div class="direct-chat-msg left"><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-left">'+data[i].waktu+'</span></div><div class="direct-chat-text pull-left">'+data[i].isi+'</div></div>';
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
					url: "<?php echo base_url() ?>inbox/sendmessage",
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					async: false,


					success: function (response) {
						if (response == "error") {
							$('[name="pesan"]').val("");
							
							
							toastr.failed('Pesan Gagal dikirim');
						} else if (response == "success") {
						
                            $('[name="pesan"]').val("");
							tampildata();
							deactivate();
							scrollToBottom();
							toastr.success('Pesan Berhasil dikirim');
                            
							
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



    })
    
    
</script>
<?php $this->load->view('admin/partials/footer2'); ?>
