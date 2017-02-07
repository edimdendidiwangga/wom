$(document).ready(function(){
  $("#boxs-resign").click(function(){
    $('#tbl_jdl').html("Data SP Karyawan Resign");
    $.ajax({
        url: "ambil_sp_resign.php",
        cache: false,
        success: function(msg){
            $(".box-resign").html(msg);
        }
    });
  });
  $("#boxs-active").click(function(){
    $('#tbl_jdl').html("Data SP Karyawan Active");
  });

  $("#sbt-contract").click(function(){
    var id_kw = $('#input-res-id').val();
    var no_sp = $('#sp').val();
    var tglsp = $('#tgl_sp').val();
    var berlaku = $('#berlaku_sp').val();
    var tableB = $("#example1").DataTable();
    if(no_sp == null || no_sp == '' || no_sp == undefined) {
       $(".error-sp").fadeIn();
            return false;
    }else if(tglsp == null || tglsp == '' || tglsp == undefined) {
       $(".error-tgl-sp").fadeIn();
            return false;
    }else if(berlaku == null || berlaku == '' || berlaku == undefined) {
       $(".error-ke").fadeIn();
            return false;
    }
    else{
     $.ajax({
      type: "POST",
        url: "update-sp.php",
        data: {id_karyawan:id_kw, sp: no_sp, tgl_sp : tglsp, berlaku_sp : berlaku},
        cache: false,
        success: function(msg){
          if(msg == '0'){
            alert("Gagal Menyimpan ke Data !");
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
            leftColumns: 2,
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
    $('#sp').val('');
    $('#berlaku_sp').val('');
    $('#tgl_sp').val('');
});
  
$( "#tgl_sp" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy"
    });

});