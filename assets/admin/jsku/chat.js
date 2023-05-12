$(document).ready(function () {


	function getUserList(query) {
		return new Promise(function (resolve, reject) {
			$.ajax({
				url: base_url + "inbox/getUserInbox",
				type: 'POST',
				async: false,
                data:{query:query},
				success: function (data) {
					if (data != "") {
						resolve(data);
					}

				}
			})
		}).then(function (data) {
			document.getElementById('user_list').innerHTML = data;
		})
	}

    $('#search').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
         getUserList(search);
        }
        else
        {
         getUserList();
        }
       });

	

	getUserList();

	var pusher = new Pusher('b6ddec25ff4b5cc46b4f', {
		cluster: 'ap1',
		forceTLS: true
	});

	var channel = pusher.subscribe('my-channel');
	channel.bind('my-event', function (data) {
		if (data.message === 'chatadmin') {
			getUserList();
		}
	});
});
