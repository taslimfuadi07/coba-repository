<!DOCTYPE html>
<html lang="en">
<head>
<title>Admindek | Admin Template</title>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/waves/css/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/chartist/css/chartist.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style-admin.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/widget.css">
<!-- datatable -->
<!-- <link href="<?php echo base_url();?>assets/plugin/datatable/datatables.min.css" rel="stylesheet" type="text/css" /> -->
<link href="<?php echo base_url();?>assets/plugin/datatable/DataTables-1.10.18/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/plugin/datatable/Responsive-2.2.2/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/plugin/datatables-checkboxes-1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" type="text/css" />

<!-- multi select -->
<link href="<?php echo base_url();?>assets/plugin/lou-multi-select/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
</head>
<body>

<div class="loader-bg">
   <div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
   <div class="pcoded-overlay-box"></div>
   <div class="pcoded-container navbar-wrapper">
     <?php echo $_header ?>
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <?php echo $_menu ?>
            <?php echo $_content ?>
         <div id="styleSelector">
         </div>
      </div>
   </div>
</div>
</div>


<!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
            <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->


<script data-cfasync="false" src="<?php echo base_url() ?>assets/js/email-decode.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugin/waves/js/waves.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugin/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script src="<?php echo base_url() ?>assets/plugin/chart/float/jquery.flot.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugin/chart/float/jquery.flot.categories.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugin/chart/float/curvedLines.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugin/chart/float/jquery.flot.tooltip.min.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>assets/plugin/chartist/js/chartist.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>assets/plugin/widget/amchart/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugin/widget/amchart/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugin/widget/amchart/light.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>assets/js/pcoded.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/vertical/vertical-layout.min.js" type="text/javascript"></script>
<script type=" text/javascript" src="<?php echo base_url() ?>assets/plugin/dashboard/custom-dashboard.min.js"></script>
<script type=" text/javascript" src="<?php echo base_url() ?>assets/js/script-admin.min.js"></script>

<!-- date table -->
<script src="<?php echo base_url();?>assets/plugin/datatable/datatables.js" type="text/javascript"></script>

<!-- multi select -->
<script src="<?php echo base_url();?>assets/plugin/lou-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/plugin/datatable/Responsive-2.2.2/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugin/datatables-checkboxes-1.2.11/js/dataTables.checkboxes.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/rocket-loader.min.js" data-cf-settings="cb5fc8e3412bf910369fedd2-|49" defer=""></script>

</body>
<script src="<?php echo base_url();?>assets/js/creatif-admin.js" type="text/javascript"></script>
<!-- Mirrored from colorlib.com//polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 08 Mar 2019 08:49:39 GMT -->
</html>