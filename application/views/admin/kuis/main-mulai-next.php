<div class="card-header">
   <h5>Data Kuis Sekolah</h5>
   <div class="card-header-right">
      <ul class="list-unstyled card-option">
         <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
         <li><i class="feather icon-maximize full-card"></i></li>
         <li><i class="feather icon-minus minimize-card"></i></li>
         <li><i class="feather icon-refresh-cw reload-card"></i></li> 
         <li><i class="feather icon-chevron-left open-card-option"></i></li>
      </ul>
   </div>
</div>

<div class="card-block">
   <div class="row">
      <div class="col-md-12">
         <h3><?php echo $soal[0]->soal ?></h3>
         <br>
         <table class="table">
            <?php foreach ($soal as $rsoal) { ?>
            <tr>
               <td style="text-transform: uppercase;"><?php echo $rsoal->jawaban ?></td>
               <td><?php echo $rsoal->point ?></td>
               <td>
                  <button type="button" class="btn btn-primary tampil-jawaban" data="<?php echo $rsoal->id_jawaban;?>" <?php echo ($rsoal->status =='1') ? 'disabled' : '' ?>><i class="fa fa-eye" > Tampil</i></button>
               </td>
            </tr>
         <?php } ?>
         </table>
      </div>
      <div class="col-md-12">
         <div class="row">
            <div class="col-md-6">
               <button class="btn btn-danger salah" dataId="<?php echo $rsoal->id_kuis ?>" dataSoal="<?php echo $rsoal->id_soal ?>">SALAH</button>
            </div>
            <div class="col-md-6">
               <div class="float-right">
                  <?php if($rsoal->max == $rsoal->nomor){?>
                     <button class="btn btn-primary">SELESAI</button>
                  <?php } else {?>
                  <button class="btn btn-primary lanjut" dataId="<?php echo $rsoal->id_kuis ?>" dataNo="<?php echo $rsoal->nomor ?>">LANJUT</button>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
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

</script>