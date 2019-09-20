<nav class="pcoded-navbar">
   <div class="nav-list">
      <div class="pcoded-inner-navbar main-menu">
         <div class="pcoded-navigation-label">Navigation</div>
         <ul class="pcoded-item pcoded-left-item">
            <li class=" <?php echo $active=='main' ? 'active ': ''?> ">
               <a href="<?php echo base_url() ?>admin/main" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="fa fa-gamepad"></i></span>
                  <span class="pcoded-mtext">Permainan</span>
               </a>
            </li>
            <li class=" <?php echo $active=='persiapan' ? 'active ': ''?> ">
               <a href="<?php echo base_url() ?>admin/persiapan" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="fa fa-legal"></i></span>
                  <span class="pcoded-mtext">Persiapan</span>
               </a>
            </li>
            <li class=" <?php echo $active=='pertanyaan' ? 'active ': ''?>  ">
               <a href="<?php echo base_url() ?>admin/pertanyaan" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="fa fa-info"></i></span>
                  <span class="pcoded-mtext">Pertanyaan</span>
               </a>
            </li>
            <!-- <li class="pcoded-hasmenu  <?php echo $active=='list_data_majalah' || $active=='input_majalah' ? 'pcoded-trigger  active ': ''?>  ">
               <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                  <span class="pcoded-mtext">Majalah</span>
               </a>
               <ul class="pcoded-submenu">
                  <li <?php echo $active=='list_data_majalah' ? "class='active '": ""?>>
                     <a href="index.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">List Data</span>
                     </a>
                  </li>
                  <li <?php echo $active=='input_majalah' ? "class='active '": ""?> >
                     <a href="dashboard-crm.html" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Input Data</span>
                     </a>
                  </li>
               </ul>
            </li> -->
         </ul>
      </div>
   </div>
</nav>