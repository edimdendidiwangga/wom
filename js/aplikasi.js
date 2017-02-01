$(document).ready(function(){
  var table = $('#example1').DataTable( {
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            leftColumns: 3,
            rightColumns: 1
        }
    });
  
  $("#boxs-resign").click(function(){
    $('#tbl_jdl').html("Data Karyawan Resign");
    $.ajax({
        url: "ambilresign.php",
        cache: false,
        success: function(msg){
            $(".box-resign").html(msg);
        }
    });
  });

  $("#boxs-active").click(function(){
    $('#tbl_jdl').html("Data Karyawan Active");
  });

  $("#btn-hapus").click(function(){
    var id_krywn = $(this).data('id');
    var tableA = $("#example1").DataTable();
    var r = confirm("Yakin Anda ingin Menghapus data ini ?");
    if (r) {
      $.ajax({
          type: "POST",
          url: "delete-step.php",
          data: "id_karyawan="+id_krywn,
          cache: false,
          success: function(msg){
            if(msg == '0'){
              alert("Gagal Menghapus Data!");
            }else{
                $('.box-resign').html(msg);
                $("#karyawan_"+id_krywn).fadeOut();
                $('#open').modal('toggle');
              tableA.destroy();
              tableA = $('#example1').DataTable( {
              scrollX:        true,
              scrollCollapse: true,
              paging:         true
              });
            }
          }
      });
       
    } else {
       $('#open').modal('toggle');
    }

 });

  $("#sbt-resign").click(function(){
    var id_kw = $('#input-res-id').val();
    var tgl_res = $('#tgl_metu').val();
    var tableB = $("#example1").DataTable();
    if(tgl_res == null || tgl_res == '' || tgl_res == undefined) {
       $(".error-msg").animate({opacity: "1"}, 400);
            return false;
    }else{
     $.ajax({
      type: "POST",
        url: "update-resign.php",
        data: { id_karyawan: id_kw, quit_date : tgl_res },
        cache: false,
        success: function(msg){
          if(msg == '0'){
            alert("Gagal Memindahkan ke Data Resign!");
          }else{
              $('.box-resign').html(msg);
              $("#karyawan_"+id_kw).fadeOut();
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

    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
  
  $(document).on("click", "#setting", function () {
     var id_karyawan = $(this).data('id');
     var nama_karyawan = $(this).data('nama');
     var nik = $(this).data('nik');
     $("#id_karyawan").html( id_karyawan );
     $("#nama_karyawan").val( nama_karyawan +" ("+nik+")" );
     $("#btn-edit").attr( "href", "edit-step.php?id_karyawan="+id_karyawan );
     $("#btn-hapus").attr( "data-id", id_karyawan );
     $("#input-res-id").attr( "value", id_karyawan );
});

  $( "#dari" ).datepicker({
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,
      yearRange: '1950:2026',
      dateFormat: "M-yy"
    });
          $( "#tgl_metu" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy"
    });

});