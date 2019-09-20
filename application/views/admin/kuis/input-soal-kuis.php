<div class="pcoded-content">
   <div class="page-header card">
      <div class="row align-items-end">
         <div class="col-lg-8">
            <div class="page-header-title">
               <i class="feather icon-book bg-c-blue"></i>
               <div class="d-inline">
                  <h5>Tambah Kuis</h5>
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
                           <h5>Form Tambah Kuis</h5>
                        </div>

                        <div class="card-block">
                           <div class="row">               
                              <div class="col-md-12">
                                <form action="" method="post" role="form" class="simpan-kuis-pertanyaan">
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pilih Soal Kuis</label>
                                    <div class="col-sm-12">
                                      <br>
                                      <input type="hidden" name="idKuis" value="<?php echo $id ?>">
                                      <select id='keep-order' multiple='multiple'>
                                        <?php foreach ($soal as $value) { ?>
                                          <option value='<?php echo $value->id_soal ?>'><?php echo $value->soal ?></option>
                                        <?php } ?>
                                      </select>
                                      
                                      <input type="hidden" name="multiple_value" id="multiple_value"  />
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    
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
 
<style type="text/css">
  .ms-container {
    width: 100%;
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