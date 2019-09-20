<div class="pcoded-content">
   <div class="page-header card">
      <div class="row align-items-end">
         <div class="col-lg-8">
            <div class="page-header-title">
               <i class="fa fa-gamepad bg-c-blue"></i>
               <div class="d-inline">
                  <h5>Siap Bermain</h5>
                  <span>Pilih Nama Kuis Permainan</span>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
               <ul class=" breadcrumb breadcrumb-title">
                  <li class="breadcrumb-item">
                     <a href="#!"><i class="feather icon-book"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#!">List Data</a> </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card " id="kuis-main">
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
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> 
 
<style type="text/css">
   .btn-primary.disabled, .btn-primary:disabled {
      cursor: default !important;
      background-color: #8CC2FF;
      border-color: #8CC2FF;
   }
   .btn-primary:hover, .sweet-alert button.confirm:hover, .wizard>.actions a:hover {
      background-color: #8CC2FF;
      border-color: #8CC2FF;
   }
  hr{
    margin-top:inherit;
    margin-bottom:10px;
  }
  .table1 table tr th{
    text-align: right;
    padding:5px;
  }
  .table1 td{
    padding:5px; 

  }
</style>