<!DOCTYPE html>
<html lang="en">
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Kuis Sekolah Test Coba Repository</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    
     
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/css/custom-kuis.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container-fluid">
      <div class="kuis">
        <div class="col-md-12">
          <?php $no=1; foreach ($jawaban as $key => $value) { ?>
          <div class="list-jawaban bg-white green">
            <span class="jawban<?php echo $value->id_jawaban ?>"></span>
            <span class="point point<?php echo $value->id_jawaban ?>"></span>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/js/creatif-main.js"></script>
	
  </body>
</html>
