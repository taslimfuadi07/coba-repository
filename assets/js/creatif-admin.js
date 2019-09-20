/*
author : ahmad taslim fuadi
ig : taslim_fuadi

Copyright © All rights Reserved 

*/


$(function(){

	// var id_table = $('.data_table').map(function(){
	// 	return $(this).attr('id');
	// })
	// console.log(id_table);

	var editor;
	//table terdaftar
	var dataTableMajalah = $('#data_table_majalah').DataTable( {
      "processing": true,
      "serverSide": true,
      "responsive": true,
       
      "ajax":{
        url :"../admin/ajax_list_data/1", // json datasource
        type: "post",  // method  , by default get
        error: function(){  // error handling
          $(".employee-grid-error").html("");
          $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
          $("#employee-grid_processing").css("display","none");
          
        }, 
      },
      "initComplete":function( settings, json){
      },
      'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': false
            }
         }
      ],
      'order': [[0, 'desc']]
       
    });

    var data_table_persiapan = $('#data_table_persiapan').DataTable( {
      "processing": true,
      "serverSide": true,
      "responsive": true,
       
      "ajax":{
        url :"../admin/ajax_list_data_persiapan/1", // json datasource
        type: "post",  // method  , by default get
        error: function(){  // error handling
          $(".employee-grid-error").html("");
          $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
          $("#employee-grid_processing").css("display","none");
          
        }, 
      },
      "initComplete":function( settings, json){
      },
      'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': false
            }
         }
      ],
      'order': [[0, 'desc']]
       
    });

    var data_table_main = $('#data_table_main').DataTable( {
      "processing": true,
      "serverSide": true,
      "responsive": true,
       
      "ajax":{
        url :"../admin/ajax_list_data_main/1", // json datasource
        type: "post",  // method  , by default get
        error: function(){  // error handling
          $(".employee-grid-error").html("");
          $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
          $("#employee-grid_processing").css("display","none");
          
        }, 
      },
      "initComplete":function( settings, json){
      },
      'order': [[0, 'desc']]
       
    });

  //-----------simpan pertanyaan-------------------
  $('form.simpan-pertanyaan').submit(function(e){
    e.preventDefault();
    var str = $(this).serialize();
     action = 'simpan_pertanyaan';
    $.ajax({
      type: "POST",
      url: action,
      data: str,
      success: function(msg) {
        // alert(msg);
        if (msg == 'sukses') {
          $("#modal-text-info").html('S I M P A N  B E R H A S I L');
          $('#modal-data').modal();
          setTimeout(function(){
            window.location.href = "http://localhost/kuis-sekolah/admin/pertanyaan";
          }, 500)
          
        } else {
          $("#modal-data").modal();
          $("#modal-text-info").html('S I M P A N  G A G A L')
          $("#sendmessage").removeClass("show");
          $("#errormessage").addClass("show");
          $('#errormessage').html(msg);
        }

      }
    });
  })

  //-----------simpan kuis-------------------
  $('form.simpan-kuis').submit(function(e){
    e.preventDefault();
    var str = $(this).serialize();
     action = 'simpan_kuis';
    $.ajax({
      type: "POST",
      url: action,
      data: str,
      success: function(msg) {
        // alert(msg);
        if (msg == 'sukses') {
          $("#modal-text-info").html('S I M P A N  B E R H A S I L');
          $('#modal-data').modal();
          setTimeout(function(){
            window.location.href = "http://localhost/kuis-sekolah/admin/persiapan";
          }, 500)
          
        } else {
          $("#modal-data").modal();
          $("#modal-text-info").html('S I M P A N  G A G A L')
          $("#sendmessage").removeClass("show");
          $("#errormessage").addClass("show");
          $('#errormessage').html(msg);
        }

      }
    });
  })

  //-----------simpan kuis-soal -------------------
  $('form.simpan-kuis-pertanyaan').submit(function(e){
    e.preventDefault();
    var str = $(this).serialize();
    console.log(str);
     action = '../simpan_kuis_pertanyaan';
    $.ajax({
      type: "POST",
      url: action,
      data: str,
      success: function(msg) {

        // alert(msg);
        // if (msg == 'sukses') {
        //   $("#modal-text-info").html('S I M P A N  B E R H A S I L');
        //   $('#modal-data').modal();
        //   setTimeout(function(){
        //     window.location.href = "http://localhost/kuis-sekolah/admin/persiapan";
        //   }, 500)
          
        // } else {
        //   $("#modal-data").modal();
        //   $("#modal-text-info").html('S I M P A N  G A G A L')
        //   $("#sendmessage").removeClass("show");
        //   $("#errormessage").addClass("show");
        //   $('#errormessage').html(msg);
        // }

      }
    });
  })


  //-------------- Simpan Jawaban ----------- 
  $('form.simpan-jawaban').submit(function(e){
    e.preventDefault();
    var str = $(this).serialize();
    if($("#jawaban").val() == '' || $('#point').val() == ''){
      $("#text-info").html("Form tidak boleh kosong!");
      return false;
    }
    action = 'simpan_jawaban';
    $.ajax({
      type: "POST",
      url: action,
      data: str,
      success: function(msg) {
        // alert(msg);
        if (msg == 'sukses') {
          $("#text-info").html("SIMPAN BERHASIL");
          setTimeout(function(){
            $('#modal-tambah-jawaban').modal('hide');
            $('.simpan-jawaban').find("input, textarea").val("");
            $("#text-info").hide();
          },2000);
        } else {
          $("#modal-data").modal();
          $("#modal-text-info").html('S I M P A N  G A G A L')
          $("#sendmessage").removeClass("show");
          $("#errormessage").addClass("show");
          $('#errormessage').html(msg);
        }

      }
    });
  })

   //-------- Hapus Soal -------------
   $('table').on('click','#hapus', function(){
      data=dataTableMajalah.row($(this).parents('tr') ).data();
      var id = data[4];

      $("#modal-hapus").modal();
      $("#text-jawaban").html(data[1]);
      
      $(".konfirmasi").click(function(){
         var konfirmasi = $(this).attr('confirm');
         if(konfirmasi == 'ya'){
            $.ajax({
               type: "get",
               url: 'hapus_soal',
               data: {id:id},
               success: function(msg) {
                  $("#data_table_majalah").dataTable().fnDraw(true);
                  $("#modal-data").modal('hide');
               }
            });
         }else{
            $("#modal-data").modal('hide');
         }
      })
   });

   //-------- Tambah Jawaban -------------
   $('table').on('click','#tambah', function(){
      id = $(this).attr('data');
      data=dataTableMajalah.row($(this).parents('tr') ).data();
      // $("#modal-hapus").modal();

      console.log(data[4]);
      $("#modal-tambah-jawaban").modal();
      $("#id_soal").val(data[4]);
      // $("#pdf-show").html(data[7]);
     
      return false;
   });

   //----------- Lihat Jawaban -----------------
   $('table').on('click','#lihat', function(){
      id = $(this).attr('data');
      data=dataTableMajalah.row($(this).parents('tr') ).data();
     
      console.log(data);
      $("#modal-data").modal();
      $.ajax({
         type: "get",
         url: 'lihat_jawaban',
         data: {id:data[4]},
         dataType: 'json',
         cache: false,
         success: function(msg) {
            var table = $('.table-jawaban').children();
            table.empty();
            table.append
               ( '<th>Jawaban</th><th>Point</th><th>Action</th>' );
            $.each(msg, function( index, value ) {
              table.append
               ( '<tr><td id="data-jawaban">' + value.jawaban + '</td><td>'+value.point+'</td><td><button type="button" class="btn btn-sm btn-danger hapus-jawaban" data="'+value.id_jawaban+'"> X </button></td></tr>' );
            });
         }
      });
   })

   //---------------- Hapus Jawaban ---------------
   $('table').on('click','.hapus-jawaban', function(){
      id = $(this).attr('data');
      $("#modal-hapus").modal();
      var row = $(this).closest("tr");    // Find the row
      var text = row.find("#data-jawaban").text(); // Find the text
      $("#text-jawaban").html(text);
      
      $(".konfirmasi").click(function(){
         var konfirmasi = $(this).attr('confirm');
         if(konfirmasi == 'ya'){
            $.ajax({
               type: "get",
               url: 'hapus_jawaban',
               data: {id:id},
               success: function(msg) {
                  $("#modal-data").modal('hide');
               }
            });
         }else{
            $("#modal-data").modal('hide');
         }
      })
   })

  $('#keep-order').multiSelect({
    keepOrder: true,
    afterSelect: function(value, text){
      var get_val = $("#multiple_value").val();
      var hidden_val = (get_val != "") ? get_val+"," : get_val;
      $("#multiple_value").val(hidden_val+""+value);
    },
    afterDeselect: function(value, text){
      var get_val = $("#multiple_value").val();
      var new_val = get_val.replace(value, "");
      $("#multiple_value").val(new_val);
    }
  });

  // ---------main----------
  $('table').on('click','#main', function(){
    data=data_table_main.row($(this).parents('tr') ).data();
    window.location.href = "http://localhost/kuis-sekolah/admin/main_mulai/"+data[4];
  });

   $(".tampil-jawaban").click(function(){
      id = $(this).attr('data');
      ini = $(this);
      $.ajax({
         type: "post",
         url: '../tampil_jawaban',
         data: {id:id},
         success: function(data) {
            if(data=='sukses'){
               ini.attr('disabled',true);
            }
         }
      });
   })

   $(".salah").click(function(){
      ini = $(this);
      idkuis = ini.attr('dataId');
      idsoal = ini.attr('dataSoal');
      $.ajax({
         type: "post",
         url: '../tampil_salah',
         data: {idkuis:idkuis, idsoal:idsoal},
         success: function(data) {
            if(data=='sukses'){
               // ini.attr('disabled',true);
            }
         }
      });
   })

   $(".lanjut").click(function(){
      ini = $(this);
      idkuis = ini.attr('dataId');
      idno   = ini.attr('dataNo');
      $.ajax({
         type: "post",
         url: '../tampil_lanjut',
         data: {idkuis:idkuis, idno:idno},
         success: function(data) {
            $("#kuis-main").html(data);
         }
      });
   })

})