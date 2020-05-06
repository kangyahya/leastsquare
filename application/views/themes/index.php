<!doctype html>
<html lang="en" class="fixed">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>.::e - Forecasting | Dashboard ::.</title>
    <link rel="apple-touch-icon" sizes="120x120" href="<?=BASE_URL()?>assets/images/logucic.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="<?=BASE_URL()?>assets/images/logucic.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?=BASE_URL()?>assets/images/logucic.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=BASE_URL()?>assets/images/logucic.png" />
    
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/pace/pace-theme-minimal.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/fontawesome/css/all.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/toastr/toastr.min.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/data-table/media/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/data-table/extensions/Responsive/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/stylesheets/css/style.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<div class="wrap">
    <?=$topheader?>

    <div class="page-body">
        <?=$sidebar?>
        <?=$content?>
        <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
</div>
<script src="<?=BASE_URL()?>assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/nano-scroller/nano-scroller.js"></script>
<script src="<?=BASE_URL()?>assets/javascripts/template-script.min.js"></script>
<script src="<?=BASE_URL()?>assets/javascripts/template-init.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/pace/pace.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/toastr/toastr.min.js"></script>

<script src="<?=BASE_URL()?>assets/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/data-table/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/data-table/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
<script src="<?=BASE_URL()?>assets/javascripts/examples/tables/data-tables.js"></script>
<?php
if($this->uri->segment(1)=='dashboard'){ ?>
    <script src="<?=BASE_URL()?>assets/vendor/chart-js/chart.min.js"></script>
    <script src="<?=BASE_URL()?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?=BASE_URL()?>assets/javascripts/examples/dashboard.js"></script>
<?php }?>
</body>

</html>
