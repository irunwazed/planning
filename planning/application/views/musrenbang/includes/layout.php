<!DOCTYPE html>
<html lang="en">
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
    <!-- datatables -->
    <link href="<?=base_url()?>public/template/musrenbang/dist/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/template/musrenbang/dist/css/responsive.dataTables.min.css">
    <!-- sweetalert2.min.css -->
    <link href="<?=base_url()?>public/template/musrenbang/dist/css/sweetalert2.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        .sidebar-item{
            margin: 7px;
        }
        .aktif{
            border-left : 4px solid #4fc3f7;
            /*border-bottom : 4px solid #4fc3f7;*/
        }
        .aktif .hide-menu{
            color: #9598a4;
        }
    </style>
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?=base_url()?>public/template/musrenbang/assets/images/musrenbang.png" alt="homepage" class="dark-logo" width="200" />
                            <!-- Light Logo icon -->
                            <img src="<?=base_url()?>public/template/musrenbang/assets/images/musrenbang.png" alt="homepage" class="light-logo" width="200" />
                        </b>
                        <!--End Logo icon -->
                        
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url()?>public/template/musrenbang/assets/images/users/user.png" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="#pengaturan"><i class="ti-settings m-r-5 m-l-5"></i> Pengaturan</a>
                                <a class="dropdown-item" href="<?=base_url()?>musrenbang/logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="<?=base_url()?>public/template/musrenbang/assets/images/users/user.png" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10" style="margin-left: 10px;">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><span id="tampil-username"><?=$this->session->username?></span> <i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email" id="tampil-tlp"><?=$this->session->no_hp?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="#pengaturan"><i class="ti-settings m-r-5 m-l-5"></i> Pengaturan</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url()?>musrenbang/logout" ><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="p-15 m-t-10">
                            <span class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fas fa-flag"></i>
                                <span class="hide-menu m-l-5" id="tipe-level" style="margin-left: 5px; text-transform: capitalize;"> 
                                </span>
                            </span>
                                
                        </li>
                        <!-- User Profile-->
                        <?php  
                            $levelLink = 'kelurahan/';
                        ?>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link<?=@$mn1?' aktif':''?>" href="<?=base_url()?>musrenbang/<?=$levelLink?>buat-usulan2" aria-expanded="false"><i class="mdi mdi-book-plus"></i><span class="hide-menu">Membuat Usulan Baru</span></a>
                        </li>

                        <li class="sidebar-item" id="berita_acara"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link<?=@$mn2?' aktif':''?>" href="<?=base_url()?>musrenbang/<?=$levelLink?>download-berita" aria-expanded="false"><i class="mdi mdi-cloud-download"></i><span class="hide-menu">Download Berita Acara</span></a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link<?=@$mn3?' aktif':''?>" href="<?=base_url()?>musrenbang/<?=$levelLink?>buat-usulan" aria-expanded="false"><i class="mdi mdi-clipboard-outline"></i><span class="hide-menu">Masukkan Usulan <span class="badge badge-primary" id="jumlah_usulan"></span></span></a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link<?=@$mn4?' aktif':''?>" href="<?=base_url()?>musrenbang/<?=$levelLink?>download-lampiran" aria-expanded="false"><i class="mdi mdi-download"></i><span class="hide-menu">Download Lampiran Usulan</span></a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link<?=@$mn5?' aktif':''?>" href="<?=base_url()?>musrenbang/<?=$levelLink?>upload-berkas" aria-expanded="false"><i class="mdi mdi-folder-upload"></i><span class="hide-menu">Upload Berkas</span></a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link<?=@$mn6?' aktif':''?>" href="<?=base_url()?>musrenbang/<?=$levelLink?>kirim" aria-expanded="false"><i class="mdi mdi-cube-send"></i><span class="hide-menu">Kirim Berkas</span></a>
                        </li>
                        <div class="row">
                            <div class="col-md-12 text-center" id="show-id">
                                
                            </div>
                        </div>

                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-12">
                        <!-- <h4 class="page-title posisi">Dashboard</h4> -->
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb" style="margin-top: -10px; margin-bottom: -10px;">
                                    <li class="breadcrumb-item"><a href="#">E-Musrenbang</a></li>
                                    <li class="breadcrumb-item active posisi" aria-current="page">Morowali</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7">
                        <!-- <div class="text-right upgrade-btn">
                            <a href="https://wrappixel.com/templates/xtremeadmin/" class="btn btn-danger text-white" target="_blank">Upgrade to Pro</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" id="isi-page">
                <?=@$content?>
            </div>
           

            <footer class="footer text-center bg-light" id="copyright">
                 &copy;
                <script>
                  document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>, 
                <a href="#">Kabupaten Morowali</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <script src="<?=base_url()?>public/template/musrenbang/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url()?>public/template/musrenbang/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>public/template/musrenbang/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- apps -->
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/app.min.js"></script>
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/app.init.js"></script>
    <!-- <script src="<?=base_url()?>public/template/musrenbang/dist/js/app-style-switcher.js"></script> -->
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->

    <!--This page plugins -->
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/dataTables.responsive.min.js"></script>
    <!-- Sweet alert -->
    <script src="<?=base_url()?>public/template/musrenbang/dist/js/sweetalert2.all.min.js"></script>

    <!--c3 charts -->
    <!-- <script src="<?=base_url()?>public/template/musrenbang/dist/js/d3.min.js"></script> -->
    <!-- <script src="<?=base_url()?>public/template/musrenbang/dist/js/c3.min.js"></script> -->

    <!-- CodeXV SCRIPT -->

<script>
    var level;
    var idUsul = false;
    var dataSession = {};
    var dataLokasi = {};
    var dataPokir = {};
    var link = 'musrenbang/';


      $(document).ready(function() {
        // loader
        // $.getScript(config.apiLibraries+'loader.js'); 
      });

     

    function loadPage(data){
      if(data == "buat-usulan"){
        menuAktif('#mn1');
        $(".posisi").html('Membuat Usulan Baru');
        $("#isi-page").hide().load(level+"/membuat-usulan.html").fadeIn('1000');
      }
      else if(data == "download-berita"){
        menuAktif('#mn2');
        $(".posisi").html('Download Berita Acara');
        $("#isi-page").hide().load(level+"/download-berita.html").fadeIn('1000');
      }
      else if(data == "masuk-usulan"){
        menuAktif('#mn3');
        $(".posisi").html('Masukkan Usulan');
        $("#isi-page").hide().load(level+"/masuk-usulan.html").fadeIn('1000');
      }
      else if(data == "download-lampiran"){
        menuAktif('#mn4');
        $(".posisi").html('Download Lampiran Usulan');
        $("#isi-page").hide().load(level+"/download-lampiran.html").fadeIn('1000');
      }
      else if(data == "upload-berkas"){
        menuAktif('#mn5');
        $(".posisi").html('Upload Berkas');
        $("#isi-page").hide().load(level+"/upload-berkas.html").fadeIn('1000');
      }
      else if(data == "kirim"){
        menuAktif('#mn6');
        $(".posisi").html('Kirim Berkas');
        $("#isi-page").hide().load(level+"/kirim.html").fadeIn('1000');
      }
      else if(data == "pengaturan"){
        menuAktif('#mn');
        $(".posisi").html('Pengaturan');
        $("#isi-page").hide().load(level+"/pengaturan.html").fadeIn('1000');
      }
      else{
        menuAktif('#mn1');
        $(".posisi").html('Membuat Usulan Baru');
        $("#isi-page").hide().load(level+"/membuat-usulan.html").fadeIn('1000');
      }
    }

    function menuAktif(menu){
      $('.aktif').removeClass('aktif');
      $(menu).addClass('aktif');
    }

    function getLokasi(){
        if (level == 'pokir') {
            var url = config.apiRoot+link+'cekPokir';
            return $.when(sendAjax(url, dataSession)).done(function(x){
                dataPokir = x;
                console.log(dataPokir);
            });
        }
        else{
            var url = config.apiRoot+'cek-lokasi';
            return $.when(sendAjax(url, dataSession)).done(function(x){
                dataLokasi = x;
                // console.log(dataLokasi.data.lokasi);
            });
        }
    }

    function sendAjax(url, dataKirim){
      //loading();
      return $.ajax({
        type: "POST",
        url: url,
        dataType: "JSON",
        data: dataKirim, 
        success: function(respon)
        {   
          //console.log('ini respon');
          //console.log(respon);
        },
        error:function(error){
          console.log(error);
          //$("#myerror").html(error.responseText);
        }
      });
    }

    function cekLogin(){
        url = config.apiRoot+'cek-login';
        session = getCookie('codexv-session');
        return $.ajax({
            type: "POST",
            url: url,
            dataType: "JSON",
            data: {
              session : session,
            }, 
            success: function(respon)
            {   
              if(!respon.status){
                  window.location.href = 'login.html';
              }else{
                dataSession = JSON.parse(getCookie('codexv-data'));
                if (dataSession.akun == 10 && dataSession.level == 2) {
                  $('#tampil-username').html(dataSession.username);
                  $('#tampil-tlp').html(dataSession.telepon);
                  level = 'kelurahan';
                }
                else if (dataSession.akun == 10 && dataSession.level == 1) {
                  $('#tampil-username').html(dataSession.username);
                  $('#tampil-tlp').html(dataSession.telepon);
                  level = 'kecamatan';
                }
                else if (dataSession.akun == 10 && dataSession.level == 3) {
                  $('#tampil-username').html(dataSession.username);
                  $('#tampil-tlp').html(dataSession.telepon);
                  level = 'pokir';
                  $('#berita_acara').css('display', 'none');
                }
                else{
                  logout();
                  // console.log(dataSession);
                }
              }
              $('#tipe-level').html(level);
              console.log(level);
            },
            error:function(error){
              window.location.href = 'login.html';
              console.log(error);
              // loader(false);
            }
          });
      }

       function logout(){
        setCookie('codexv-session', '', 7);
        setCookie('codexv-data', {}, 7);
        window.location.href = 'login.html';
      }

    // function notif(pesan = '', warna = 'info', from = 'top', align = 'center'){
    //   color = warna;
    //   $.notify({
    //       icon: "now-ui-icons ui-1_bell-53",
    //       message: pesan
    //     },{
    //         type: color,
    //         timer: 200,
    //         placement: {
    //             from: from,
    //             align: align
    //         }
    //     });
    // }
  </script>

<?=@$script?>

</body>

</html>