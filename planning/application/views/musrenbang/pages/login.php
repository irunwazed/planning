<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="CodeXV">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>public/template/musrenbang/assets/images/logo_morowali.png">
    <title>E-Musrenbang - Kabupaten Morowali</title>
    <!-- Custom CSS -->
    <!-- <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link href="<?=base_url()?>public/template/musrenbang/dist/css/style.min.css" rel="stylesheet">
    <link href="<?=base_url()?>public/template/musrenbang/dist/css/chartist.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?=base_url()?>public/template/musrenbang/assets/images/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="<?=base_url()?>public/template/musrenbang/assets/images/logo_morowali.png" alt="logo" width="70" /></span>
                        <h5 class="font-medium mb-3 mt-2">E-Musrembang | Kabupaten Morowali</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div id="notif" class="col-12">
                        <?php if(@$this->session->flashdata('pesan')['pesan']){ ?>
                            <div class="alert alert-danger col-12"> <i class="mdi mdi-alert"></i> <?=@$this->session->flashdata('pesan')['pesan']?> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                        <?php } ?>
                            </div>
                        <div class="col-12">
                            <form  class="form-horizontal mt-3" method="POST" action="<?=base_url()?>musrenbang/AdminController/login">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-3">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>
                            <a href="<?=base_url()?>">Kembali</a>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        
    </div>
    <!-- ============================================================== -->
  
    <script src="<?=base_url()?>public/template/musrenbang/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url()?>public/template/musrenbang/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>public/template/musrenbang/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- CodeXV SCRIPT -->

    <script type="text/javascript">
        $(document).ready(function() {
            $(".preloader").fadeOut();
        } );

    </script>
</body>

</html>