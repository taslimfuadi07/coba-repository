<div class="pcoded-content">
   <div class="page-header card">
      <div class="row align-items-end">
         <div class="col-lg-8">
            <div class="page-header-title">
               <i class="feather icon-book bg-c-blue"></i>
               <div class="d-inline">
                  <h5>Pertanyaan</h5>
                  <span>Data pertanyaan Kuis-Sekolah</span>
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
                           <h5>Form Pertanyaan</h5>
                        </div>

                        <div class="card-block">
                           <div class="row">
                            
                              <div class="col-md-12">
                                <form action="" method="post" role="form" class="simpan-pertanyaan">
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pertanyaan</label>
                                    <div class="col-sm-10">
                                      <textarea name="soal" rows="5" cols="5" class="form-control" placeholder="Pertanyaan lengkap"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10">
                                      <button type="submit" class="btn btn-primary m-b-0" >Simpan</button>
                                    </div>
                                  </div>
                                </form>
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
 

<div class="modal md-modal md-effect-10 md-show" id="modal-data" tabindex="-1" role="dialog" aria-labelledby="DelMerkModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" >
         <div class="modal-header">
            <h5 class="modal-title">Informasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="modal-text-info" style="font-weight: bold;"></div>
            
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary mobtn" data-dismiss="modal">Close</button>
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