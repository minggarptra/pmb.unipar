	tampilnotif();
	tampilnotifadmin();
    var pusher = new Pusher('b6ddec25ff4b5cc46b4f', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      if(data.message === 'chatadmin' || data.message === 'notifadmin'){
        tampilnotif();
		tampilnotifadmin();   
      }
    });


function tampilnotif() {
			
	$.ajax({
		type: "GET",
		url: base_url + "admin/headernotifikasichat",
		async : false,
		dataType : 'JSON',
		success: function(data) {
			 var html = '';
			 var jumlah = data.jumlah;
				var i;
			for(i=0; i < data.notif.length; i++){
				html+='<li><a href="#"><div class="pull-left"></div><div class="mail-contnet"><h4>'+data.notif[i].notifikasi+'</h4><span><i class="fa fa-clock-o"></i> '+data.notif[i].waktu+'</span></div></a></li>';
			}
			$('#notifku').html(html);
			$('.jumlahchat').html(jumlah);
			
		
			
		}
	});
	return false;
	

}

function tampilnotifadmin() {
			
	$.ajax({
		type: "GET",
		url: base_url + "admin/headernotifikasi",
		async : false,
		dataType : 'JSON',
		success: function(data) {
			 var html = '';
			 var jumlah = data.jumlah;
				var i;
			for(i=0; i < data.notif.length; i++){
				html+='<li><a href="#"><i class="fa fa-money text-aqua"></i>'+data.notif[i].notifikasi+'</a></li>';
			}
			$('#notifadmin').html(html);
			$('.jnadmin').html(jumlah);
			
		
			
		}
	});
	return false;
	

}


$("#clearnotif").click(function () {
	$.post(base_url + "admin/clearnotif", function (data) {})
});
$("#clearnotifchat").click(function () {
	$.post(base_url + "admin/clearnotifchat", function (data) {})
});




$(document).ajaxStart(function () {
	Pace.restart();
});

$(document).ready(function(){

	
	$('.select2').select2();
	$('#logout').on('click', function(e){
		e.preventDefault();

		Swal({
			title: "Logout",
			text: "Anda yakin ingin logout?",
			type: "question",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Logout!'
		}).then((result) => {
			if(result.value){
				location.href=base_url+"login/logout";
			}
		});
	});

	$('#ana').on('click', function(e){
		e.preventDefault();

		Swal({
			title: "Logout",
			text: "Anda yakin ingin logout?",
			type: "question",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Logout!'
		}).then((result) => {
			if(result.value){
				location.href=base_url+"login/logout";
			}
		});
	});

	
});