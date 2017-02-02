$(document).ready(function(){
  $("#boxs-resign").click(function(){
    $('#tbl_jdl').html("Data Contract Karyawan Resign");
    $.ajax({
        url: "ambil_contract_resign.php",
        cache: false,
        success: function(msg){
            $(".box-resign").html(msg);
        }
    });
  });
  $("#boxs-active").click(function(){
    $('#tbl_jdl').html("Data Contract Karyawan Active");
  });

 
  $("#sbt-contract").click(function(){
    var id_kw = $('#input-res-id').val();
    var pkwt_ke = $('#pkwt').val();
    var noe_pkwt = $('#no_pkwt').val();
    var start = $('#start_date').val();
    var end = $('#end_date').val();
    var tableB = $("#example1").DataTable();
    if(pkwt_ke == null || pkwt_ke == '' || pkwt_ke == undefined) {
       $(".error-pkwt").fadeIn();
            return false;
    }else if(noe_pkwt == null || noe_pkwt == '' || noe_pkwt == undefined) {
       $(".error-nopkwt").fadeIn();
            return false;
    }
    else{
     $.ajax({
      type: "POST",
        url: "update-contract.php",
        data: {id_karyawan:id_kw, pkwt: pkwt_ke, no_pkwt : noe_pkwt, start_date : start, end_date : end},
        cache: false,
        success: function(msg){
          if(msg == '0'){
            alert("Gagal Memindahkan ke Data Resign!");
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
            leftColumns: 3,
            rightColumns: 1
        }
    });
  
  $(document).on("click", "#setting", function () {
     var id_karyawan = $(this).data('id');
     var nama_karyawan = $(this).data('nama');
     var nik = $(this).data('nik');
     $("#id_karyawan").html( id_karyawan );
     $("#nama_karyawan").val( nama_karyawan +" ("+nik+")" );
     $("#btn-edit").attr( "href", "edit-step.php?id_karyawan="+id_karyawan );
     $("#btn-hapus").attr( "data-id", id_karyawan );
     $("#input-res-id").attr( "value", id_karyawan );
     //reset form_add_gaji
    $('#pkwt').val('');
    $('#no_pkwt').val('');
    $('#start_date').val('');
    $('#end_date').val('');
});

          $( "#start_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy"
    });
          $( "#end_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy"
    });

});