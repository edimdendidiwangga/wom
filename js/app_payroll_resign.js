$(document).ready(function(){

  $("#boxs-periode").click(function(){
    $('#tbl_jdl').html("Data Gaji Per Periode");
    $.ajax({
        url: "gaji-resign-history.php",
        cache: false,
        success: function(msg){
            $(".box-periode").html(msg);
        }
    });
  });

  $("#boxs-terbaru").click(function(){
    $('#tbl_jdl').html("Data Gaji Terbaru");
  });
  $("#boxs-result").click(function(){
    $('#tbl_jdl').html("Data Gaji Bulan");
  });

  $("#sbt-gaji").click(function(){
    var id_kw = $('#input-res-id').val();
    var kehadiran_val = $('#kehadiran').val();
    var ump_val = $('#ump').val();
    var gaji_pokok_val = $('#gaji_pokok').val();
    var tun_maintenance_val = $('#tun_maintenance').val();
    var tun_jabatan_val = $('#tun_jabatan').val();
    var tun_jaga_malam_val = $('#tun_jaga_malam').val();
    var tun_lain_val = $('#tun_lain').val();
    var insentive_val = $('#insentive').val();
    var overtime_val = $('#overtime').val();
    var rapel_val = $('#rapel').val();
    var periode_gaji_val = $('#periode_gaji').val();
    var data_add_gaji = {
    id_karyawan : id_kw, 
    kehadiran : kehadiran_val,
    ump :ump_val,
    gaji_pokok : gaji_pokok_val, 
    tun_maintenance : tun_maintenance_val,
    tun_jabatan : tun_jabatan_val,
    tun_jaga_malam : tun_jaga_malam_val,
    tun_lain : tun_lain_val,
    insentive : insentive_val,
    overtime : overtime_val,
    rapel : rapel_val,
    periode_gaji : periode_gaji_val
    };
    if(kehadiran_val == null || kehadiran_val == '' || kehadiran_val == undefined) {
       $(".error_kehadiran").fadeIn();
       return false;
    }if(ump_val == null || ump_val == '' || ump_val == undefined) {
       $(".error_ump").fadeIn();
       return false;
    }if(gaji_pokok_val == null || gaji_pokok_val == '' || gaji_pokok_val == undefined) {
       $(".error_gaji_pokok").fadeIn();
       return false;
    }if(tun_maintenance_val == null || tun_maintenance_val == '' || tun_maintenance_val == undefined) {
       $(".error_tun_maintenance").fadeIn();
       return false;
    }if(tun_jabatan_val == null || tun_jabatan_val == '' || tun_jabatan_val == undefined) {
       $(".error_tun_jabatan").fadeIn();
       return false;
    }if(tun_jaga_malam_val == null || tun_jaga_malam_val == '' || tun_jaga_malam_val == undefined) {
       $(".error_tun_jaga_malam").fadeIn();
       return false;
    }if(tun_lain_val == null || tun_lain_val == '' || tun_lain_val == undefined) {
       $(".error_tun_lain").fadeIn();
       return false;
    }if(insentive_val == null || insentive_val == '' || insentive_val == undefined) {
       $(".error_insentive").fadeIn();
       return false;
    }if(overtime_val == null || overtime_val == '' || overtime_val == undefined) {
       $(".error_overtime").fadeIn();
       return false;
    }if(rapel_val == null || rapel_val == '' || rapel_val == undefined) {
       $(".error_rapel").fadeIn();
       return false;
    }if(periode_gaji_val == null || periode_gaji_val == '' || periode_gaji_val == undefined) {
       $(".error_periode_gaji").fadeIn();
       return false;
    }else{
      $.ajax({
      type: "POST",
        url: "add-gaji.php",
        data: data_add_gaji,
        cache: false,
        success: function(msg){
            if(msg == '0'){
            alert("Gagal Menambah Data Gaji!");
          }else{
            $('#content_gaji').html(msg);
              $('#open').modal('toggle');
              alert("Data berhasil disimpan!");
          }
        }
      });
    }
    
   });

  $("#sbt_edit_gaji").click(function(){
    var idgaji = $('#input-gaj-id').val();
    var id_kyn = $('#input-kyn-id').val();
    var kehadiran_val = $('#kehadiran_ed').val();
    var ump_val = $('#ump_ed').val();
    var gaji_pokok_val = $('#gaji_pokok_ed').val();
    var tun_maintenance_val = $('#tun_maintenance_ed').val();
    var tun_jabatan_val = $('#tun_jabatan_ed').val();
    var tun_jaga_malam_val = $('#tun_jaga_malam_ed').val();
    var tun_lain_val = $('#tun_lain_ed').val();
    var insentive_val = $('#insentive_ed').val();
    var overtime_val = $('#overtime_ed').val();
    var rapel_val = $('#rapel_ed').val();
    var periode_gaji_val = $('#periode_gaji_ed').val();
    var data_edit_gaji = {
    id_gaji : idgaji,
    id_karyawan : id_kyn, 
    kehadiran : kehadiran_val,
    ump : ump_val,
    gaji_pokok : gaji_pokok_val, 
    tun_maintenance : tun_maintenance_val,
    tun_jabatan : tun_jabatan_val,
    tun_jaga_malam : tun_jaga_malam_val,
    tun_lain : tun_lain_val,
    insentive : insentive_val,
    overtime : overtime_val,
    rapel : rapel_val,
    periode_gaji : periode_gaji_val
    };
    if(kehadiran_val == null || kehadiran_val == '' || kehadiran_val == undefined) {
       $(".error_kehadiran").fadeIn();
       return false;
    }if(ump_val == null || ump_val == '' || ump_val == undefined) {
       $(".error_ump").fadeIn();
       return false;
    }if(gaji_pokok_val == null || gaji_pokok_val == '' || gaji_pokok_val == undefined) {
       $(".error_gaji_pokok").fadeIn();
       return false;
    }if(tun_maintenance_val == null || tun_maintenance_val == '' || tun_maintenance_val == undefined) {
       $(".error_tun_maintenance").fadeIn();
       return false;
    }if(tun_jabatan_val == null || tun_jabatan_val == '' || tun_jabatan_val == undefined) {
       $(".error_tun_jabatan").fadeIn();
       return false;
    }if(tun_jaga_malam_val == null || tun_jaga_malam_val == '' || tun_jaga_malam_val == undefined) {
       $(".error_tun_jaga_malam").fadeIn();
       return false;
    }if(tun_lain_val == null || tun_lain_val == '' || tun_lain_val == undefined) {
       $(".error_tun_lain").fadeIn();
       return false;
    }if(insentive == null || insentive == '' || insentive == undefined) {
       $(".error_insentive").fadeIn();
       return false;
    }if(overtime == null || overtime == '' || overtime == undefined) {
       $(".error_overtime").fadeIn();
       return false;
    }if(rapel == null || rapel == '' || rapel == undefined) {
       $(".error_rapel").fadeIn();
       return false;
    }if(periode_gaji == null || periode_gaji == '' || periode_gaji == undefined) {
       $(".error_periode_gaji").fadeIn();
       return false;
    }else{
      $.ajax({
      type: "POST",
        url: "update_gaji.php",
        data: data_edit_gaji,
        cache: false,
        success: function(msg){
            if(msg == '0'){
            alert("Gagal Menambah Data Gaji!");
          }else{
            $('#content_gaji').html(msg);
              $('#open').modal('toggle');
          }
        }
      });
    }
    
   });

  var btn_gaji = $("#btn-gaji"),
      btn_edit = $("#btn-edit"),
      modal_title = $(".modal-title"),
      form_add_gaji = $(".form_add_gaji"),
      form_edit_gaji = $(".form_edit_gaji");
     
  btn_gaji.click(function () { 
      form_add_gaji.fadeIn();
      form_edit_gaji.fadeOut();
      modal_title.html("Form Tambah Gaji");
  });
  btn_edit.click(function () { 
      form_add_gaji.fadeOut();
      form_edit_gaji.fadeIn();
      modal_title.html("Form Edit Gaji");
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
  var id_gaji = $(this).data('idgaji');
     var id_karyawan = $(this).data('id');
     var nama_karyawan = $(this).data('nama');
     var nik = $(this).data('nik');
     var kehadiran = $(this).data('kehadiran');
     var ump = $(this).data('ump');
     var gapok = $(this).data('gapok');
     var maintenance = $(this).data('maintenance');
     var jabatan = $(this).data('jabatan');
     var jalam = $(this).data('jalam');
     var lain = $(this).data('lain');
     var insentive = $(this).data('insentive');
     var overtime = $(this).data('overtime');
     var rapel = $(this).data('rapel');
     var periode = $(this).data('periode');
    $('#input-gaj-id').attr( "value", id_gaji );
    $('#input-kyn-id').attr( "value", id_karyawan );
    $('#kehadiran_ed').val(kehadiran);
    $('#ump_ed').val(ump);
    $('#gaji_pokok_ed').val(gapok);
    $('#tun_maintenance_ed').val(maintenance);
    $('#tun_jabatan_ed').val(jabatan);
    $('#tun_jaga_malam_ed').val(jalam);
    $('#tun_lain_ed').val(lain);
    $('#insentive_ed').val(insentive);
    $('#overtime_ed').val(overtime);
    $('#rapel_ed').val(rapel);
    $('#periode_gaji_ed').val(periode);
     $("#id_karyawan").html( id_karyawan );
     $(".enik").val( nik );
     $(".nama").val( nama_karyawan);
     $("#input-res-id").attr( "value", id_karyawan );
      $("#btn-hapus").attr( "data-id", id_karyawan );
      $("#btn-hapus").attr( "data-gapok", gapok );
      $("#btn-hapus").attr( "data-periode", periode );
      $("#btn-hapus").attr( "data-periode", periode );
      //reset form_add_gaji
    $('#kehadiran').val('');
    $('#ump').val('');
    $('#gaji_pokok').val('');
    $('#tun_maintenance').val('');
    $('#tun_jabatan').val('');
    $('#tun_jaga_malam').val('');
    $('#tun_lain').val('');
    $('#insentive').val('');
    $('#overtime').val('');
    $('#rapel').val('');
    $('#periode_gaji').val('');
    /* $("#btn-edit").attr( "href", "edit-step.php?id_karyawan="+id_karyawan ); */
});

          $( "#periode_gaji_ed" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "MM yy"
    });
          $( "#periode_gaji" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "MM yy"
    });
          $( "#seko" ).datepicker({
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy"
    });
    $( "#tekan" ).datepicker({
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy"
    });

  });