$(document).ready(function(){
  $("#boxs-resign").click(function(){
    $('#tbl_jdl').html("Data Mutasi Karyawan Resign");
    $.ajax({
        url: "ambil_mutasi_resign.php",
        cache: false,
        success: function(msg){
            $(".box-resign").html(msg);
        }
    });
  });
  $("#boxs-active").click(function(){
    $('#tbl_jdl').html("Data Mutasi Karyawan Active");
  });

 
  $("#sbt-contract").click(function(){
    var id_kw = $('#input-res-id').val();
    var mut = $('#mutasi').val();
    var from = $('#dari').val();
    var to = $('#ke').val();
    var tableB = $("#example1").DataTable();
    if(mut == null || mut == '' || mut == undefined) {
       $(".error-mutasi").fadeIn();
            return false;
    }else if(from == null || from == '' || from == undefined) {
       $(".error-dari").fadeIn();
            return false;
    }else if(to == null || to == '' || to == undefined) {
       $(".error-ke").fadeIn();
            return false;
    }
    else{
     $.ajax({
      type: "POST",
        url: "update-mutasi.php",
        data: {id_karyawan:id_kw, mutasi: mut, dari : from, ke : to},
        cache: false,
        success: function(msg){
          if(msg == '0'){
            alert("Gagal Memindahkan ke Data !");
          }else{
              $('#content-karyawan').html(msg);
              $('#open').modal('toggle');
            tableB.destroy();
            tableB = $('#example1').DataTable( {
            scrollX:        true,
            scrollCollapse: true,
            paging:         true
            });
          }        
        }
    });
    }
    
   });

    var table = $('#example1').DataTable( {
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            rightColumns: 1
       	}
    });
  
  $(document).on("click", "#setting", function () {
     var id_karyawan = $(this).data('id');
     var nama_karyawan = $(this).data('nama');
     var nik = $(this).data('nik');
     $("#id_karyawan").html( id_karyawan );
     $("#nama_karyawan").val( nama_karyawan +" ("+nik+")" );
     $("#input-res-id").attr( "value", id_karyawan );
     //reset form_add_gaji
    $('#mutasi').val('');
    $('#dari').val('');
    $('#ke').val('');
});

});