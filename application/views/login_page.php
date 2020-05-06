<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login Page | Peramalan</title>
    <link rel="apple-touch-icon" sizes="120x120" href="<?=BASE_URL()?>assets/images/cic.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="<?=BASE_URL()?>assets/images/cic.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?=BASE_URL()?>assets/images/cic.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=BASE_URL()?>assets/images/cic.png" />
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/vendor/toastr/toastr.min.css" />
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="<?=BASE_URL()?>assets/stylesheets/css/style.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body style="background-color: blue">
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        
        <div class="box">
            <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="<?=BASE_URL()?>assets/images/cic.png" />
        </div>
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action=""/>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username"/>
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" placeholder="Password" required name="password"/>
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="<?=BASE_URL()?>assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=BASE_URL()?>assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="<?=BASE_URL()?>assets/javascripts/template-script.min.js"></script>
<script src="<?=BASE_URL()?>assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->

<!-- TOASTR -->
<!-- ========================================================= -->

<script src="<?=BASE_URL()?>assets/vendor/toastr/toastr.min.js"></script>
<script type="text/javascript">
 
 
<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr['error']("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
</script>
</body>

</html>
