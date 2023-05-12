if ($('.page-wrapper').is('.pendaftaran')) {

    load_data();
   
    function load_data(query)
    {
     $.ajax({
      url: base_url + "pendaftaran/fetch",
      method:"POST",
      data:{query:query},
      success:function(data){
       $('#result').html(data);
      }
     })
    }
   
    $('#search_text').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      load_data(search);
     }
     else
     {
      load_data();
     }
    });

};


if ($('.page-wrapper').is('.detailpendaftaran')) {

    var table = $('#datadaftar').DataTable();

    function filterData() {
       
        table.column(4).search($('.pembayaran').val()).draw();
    }

    function filterData2() {
       
        table.column(5).search($('.berkas').val()).draw();
    }
    $('.pembayaran').on('change', function () {
        filterData();
    });

    $('.berkas').on('change', function () {
        filterData2();
    });


    $("#cleardata").click(function(){
     
        $('.berkas ').val("");
        $('.pembayaran ').val("");
        table.column(4).search("").draw();
        table.column(5).search("").draw();


      });

};



