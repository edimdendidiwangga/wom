$(document).ready(function(){
  $("#boxs-resign").click(function(){
    $.ajax({
        url: "ambilresign.php",
        cache: false,
        success: function(msg){
            $(".box-resign").html(msg);
        }
    });
  });

  $("#btn-hapus").click(function(){
  	var id_krywn = $(this).data('id');
    var r = confirm("Yakin Anda ingin Menghapus data ini ?");
    var table = $("#example1").DataTable();
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
            	$("#karyawan_"+id_krywn).fadeOut();
            	$('#open').modal('toggle');
            	table.destroy();
        		table = $('#example1').DataTable( {
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
  	var tableA = $("#example1").DataTable();
  	var tableB = $("#example2").DataTable();
  	 $.ajax({
    	type: "POST",
        url: "update-resign.php",
        data: { id_karyawan: id_kw, quit_date : tgl_res },
        cache: false,
        success: function(msg){
        	if(msg == '0'){
        		alert("Gagal Memindahkan ke Data Resign!");
        	}else{
	            $("#karyawan_"+id_kw).fadeOut();
	            $("#employee_"+id_kw).fadeIn();
	            $('#open').modal('toggle');
            	tableA.destroy();
        		tableA = $('#example1').DataTable( {
		        scrollX:        true,
		        scrollCollapse: true,
		        paging:         true
		    });
        		tableB.destroy();
        		tableB = $('#example2').DataTable( {
		        scrollX:        true,
		        scrollCollapse: true,
		        paging:         true
		    });
       		}
        	
        }
    });
   });


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
	
  $( function() {
    var dateFormat = "dd-M-yy",
      tgl_out = $( "#tgl_out" )
        .datepicker({
          dateFormat: "dd-M-yy",
          changeMonth: true,
          changeYear: true
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
      	dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
  } );
  
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