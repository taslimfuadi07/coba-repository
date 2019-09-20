<div class="pcoded-content">
   <div class="page-header card">
      <div class="row align-items-end">
         <div class="col-lg-8">
            <div class="page-header-title">
               <i class="feather icon-book bg-c-blue"></i>
               <div class="d-inline">
                  <h5>Persiapan Kuis</h5>
                  <span>Data Kuis Sekolah</span>
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
                     <div class="card ">
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
                            <div class="col-md-4 m-b-20">
                              <a href="./input_kuis" class="btn btn-primary btn-sm">Tambah Kuis</a>
                            </div>
                              <div class="col-md-12">
                                 <table class="  table table-striped table-bordered" id="data_table_persiapan"  cellpadding="0" cellspacing="0" border="0" class="" width="100%">
                                    <thead>
                                       <tr>
                                          <th></th>
                                          <th>Nama Kuis</th>
                                          <th>Tanggal Kuis</th>
                                          <th>Aksi</th>
                                       </tr>
                                    </thead>
                                 </table>
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
 
<div class="modal md-modal md-effect-10 md-show" id="modal-tambah-jawaban" tabindex="-1" role="dialog" aria-labelledby="DelMerkModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" >
         <div class="modal-header">
            <h5 class="modal-title">Jawaban Kuis</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <form action="" method="post" role="form" class="simpan-jawaban">
            <div class="modal-body">
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jawaban</label>
                  <div class="col-sm-10">
                     <input type="text" name="jawaban" id="jawaban" value="" class="form-control">
                     <input type="hidden" name="id_soal" value="" id="id_soal" class="form-control">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Point</label>
                  <div class="col-sm-10">
                     <input type="number" name="point" id="point" value="" class="form-control">
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-12" style="font-weight: bold; color: blue; text-align: center;" id="text-info"></div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary mobtn" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn-primary mobtn">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="modal   md-modal md-effect-10 md-show" id="modal-data" tabindex="-1" role="dialog" aria-labelledby="DelMerkModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" >
         <div class="modal-header">
            <h5 class="modal-title">Binatang yang bisa disembelih</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="table-jawaban"></div>
            <table class="table table-jawaban">
               <tr>
                  <th>Jawaban</th>
                  <th>Point</th>
                  <th>Action</th>
               </tr>
               <tr class="data-table-jawaban">
                  <td>AAAAAAAA</td>
                  <td>10</td>
                  <td>X</td>
               </tr>
            </table>
            <div id="lihat-jawaban"></div>
            
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary mobtn" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<div class="modal md-modal md-effect-10 md-show" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="DelMerkModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" >
         <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <div>
               Apakah anda yakin menghapus data "<span id="text-jawaban">"</span> ?
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary mobtn konfirmasi" data-dismiss="modal" confirm="tidak">Tidak</button>
            <button type="button" class="btn btn-primary mobtn konfirmasi" data-dismiss="modal" confirm="ya">Ya</button>
         </div>
      </div>
   </div>
</div>
 
<style type="text/css">
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