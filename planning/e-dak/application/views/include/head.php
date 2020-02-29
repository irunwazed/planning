<?php
if(!@$_SESSION['id'] || !@$_SESSION['lapor']){
  redirect(base_url()."logout");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>si PANDAI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/bower_components/select2/dist/css/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url()?>public/admin/dist/css/mystyle.css">
  <link rel="icon" href="<?=base_url()?>public/images/Lambang_Kabupaten_Kolaka_Utara.png">

  <!-- toast -->
  <link href="<?=base_url()?>public/admin/assets/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="<?=base_url()?>public/admin/assets/toastr/toastr.js"></script>


  <!-- mystyle -->
  <link rel="stylesheet" href="<?=base_url()?>public/admin/assets/css/mystyle.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
      
      .set-hide {
        display: none;
      }
      /* #003366; */
      .set-thead {
        /* background-color: RGB(60,141,188); */
        /* color: #FFFFFF; */
      }
      .set-thead th{
        text-align: center;
        /* vertical-align: bottom; */
      }
      .set-tbody{
        /* background-color: RGB(238,238,238); */
        color: #000000;
      }

      .isi-ada{
        color: #009933;
      }
      .isi-ada:hover{
        color: #00e64d;
      }

      .isi-tidak-ada{
        color: #802b00;
      }
      .isi-tidak-ada:hover{
        color: #cc4400;
      }

      /* .loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}    */

.loro{
    position:fixed;
  z-index: 999;
    width:231px;
    height:300px;
    margin: auto;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  overflow: visible;
      
  }

  .loro:before {
    content: '';
    display: block;
    position: absolute;
    top: 100;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(17,17,17,0.9);
  }

  .circ{
    position:absolute;
    width:121px;
    height:212px;
    border-radius: 300px 0  0 300px;
    background:#25b1b0;
    margin:30px 50%;
    transform-origin:50% 50%;
    -webkit-transform-origin:50% 50%;
    -moz-transform-origin:50% 50%;
     animation:gira 3s linear infinite;
      -moz-animation: gira 3s alternate infinite;
      -webkit-animation: gira 3s linear infinite;
      -o-animation: gira 3s alternate infinite;
    
    
  }
  .circ3{
    position:absolute;
    display:block;
    width:80px;
    height:45px;
    border-radius:0 0 90px 90px;
   background:#f7a500;
    margin:121px 192px;
    transform-origin:-21% 53%;
     -webkit-transform-origin:-21% 53%;
    -moz-transform-origin:-21% 53%;
     animation:gira5 3s linear infinite;
      -moz-animation: gira5 3s linear infinite;
      -webkit-animation: gira5 3s linear infinite;
      -o-animation: gira5 3s linear infinite;
    
  }
  .circ5{
    position:absolute;
    
    width:75px;
    height:121px;
    border-radius:90px 0 0 90px ;
    background:white;
    margin:70px 161px;
     transform-origin:19% 50%;
    -webkit-transform-origin:19% 50%;
    -moz-transform-origin:19% 50%;
     animation:gira3 3s linear infinite;
      -moz-animation: gira3 3s linear infinite;
      -webkit-animation: gira3 3s linear infinite;
      -o-animation: gira3 3s linear infinite;
      
  }
  .ojo{
    position:absolute;
    width:30px;
    height:30px;
    border-radius:100%;
    background:#333;
    border:3px solid #ff6666;
    margin:90px 192px;
     animation:va 3s linear infinite;
      -moz-animation: va 3s linear infinite;
      -webkit-animation:va 3s linear infinite;
      -o-animation: va 3s linear infinite;
    z-index:33;
    
  }
  .circ7{
    position:absolute;
    width:55px;
    height:60px;
    border-radius:0 192px 0 0;
    background:#f7ce43;
    margin:70px 235px;
      transform-origin:102% 207%;
    -webkit-transform-origin:-102% 207%;
    -moz-transform-origin:-102% 207%;
   
     animation:gira7 3s linear infinite;
      -moz-animation: gira7 3s linear infinite;
      -webkit-animation: gira7 3s linear infinite;
      -o-animation: gira7 3s linear infinite;
  }
  
  @-webkit-keyframes gira {
    0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    55% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    60% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    65% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    75% {transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    80% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
   85% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
   90% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    95% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    100% {  transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);   }
  }
  
  
  @keyframes gira {
    0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    55% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    60% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    65% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    75% {transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    80% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
   85% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
   90% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    95% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    100% {  transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);   }
  }
  @-moz-keyframes gira {
    0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    55% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    60% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    65% { transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -o-transform: rotate(180deg);
      -ms-transform: rotate(180deg); }
    75% {transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    80% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
   85% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
   90% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    95% { transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);  }
    100% {  transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -webkit-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);   }
  }
  
  @-webkit-keyframes gira3{
    0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    55% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    60% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    65% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    75% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    80% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
   85% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
   90% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    95% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    100%{transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
  }
  
  
  @keyframes gira3{
    0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    55% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    60% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    65% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    75% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    80% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
   85% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
   90% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    95% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    100%{transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
  }
  
  @-moz-keyframes gira3{
    0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    55% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    60% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    65% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg); }
    75% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    80% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
   85% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
   90% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    95% {transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
    100%{transform: rotate(-360deg);
      -moz-transform: rotate(-360deg);
      -webkit-transform: rotate(-360deg);
      -o-transform: rotate(-360deg);
      -ms-transform: rotate(-360deg);  }
  }
  @-webkit-keyframes gira5 {
      0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
     border-radius:0 0 90px 90px;}
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);border-radius:0 0 90px 90px; }
    50% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
    }
    55% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
     }
    60% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
     }
    65% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
     border-radius:90px 90px 0 0;}
    75% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); 
     border-radius:0 0 90px 90px;}
    80% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px;  }
   85% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); border-radius:0 0 90px 90px;   }
   90% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); border-radius:0 0 90px 90px;   }
    95% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px; }
    100%{transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px;  }
  }
  @keyframes gira5 {
      0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
     border-radius:0 0 90px 90px;}
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);border-radius:0 0 90px 90px; }
    50% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
    }
    55% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
     }
    60% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
     }
    65% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
     border-radius:90px 90px 0 0;}
    75% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); 
     border-radius:0 0 90px 90px;}
    80% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px;  }
   85% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); border-radius:0 0 90px 90px;   }
   90% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); border-radius:0 0 90px 90px;   }
    95% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px; }
    100%{transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px;  }
  }
  
  @-moz-keyframes gira5 {
      0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
     border-radius:0 0 90px 90px;}
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);border-radius:0 0 90px 90px; }
    50% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
    }
    55% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
     }
    60% { transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
       border-radius:90px 90px 0 0;
     }
    65% {  transform: rotate(-180deg);
      -moz-transform: rotate(-180deg);
      -webkit-transform: rotate(-180deg);
      -o-transform: rotate(-180deg);
      -ms-transform: rotate(-180deg);
     border-radius:90px 90px 0 0;}
    75% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); 
     border-radius:0 0 90px 90px;}
    80% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px;  }
   85% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); border-radius:0 0 90px 90px;   }
   90% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); border-radius:0 0 90px 90px;   }
    95% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px; }
    100%{transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  border-radius:0 0 90px 90px;  }
  }
  @-webkit-keyframes gira7{
      0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
     }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      
    }
    55% {  transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      
     }
    60% {transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
       
     }
    65% {  transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);;
    }
    75% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
   
    80% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
   85% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
   90% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
    95% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
    100%{transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);}}
    
  
  @keyframes gira7{
      0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
     }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      
    }
    55% {  transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      
     }
    60% {transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
       
     }
    65% {  transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);;
    }
    75% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
   
    80% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
   85% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
   90% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
    95% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
    100%{transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);}}
  
  @-moz-keyframes gira7{
      0% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
     }
      25% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
    50% { transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      
    }
    55% {  transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      
     }
    60% {transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
       
     }
    65% {  transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);;
    }
    75% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
   
    80% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg); }
   85% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
   90% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
    95% {transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);  
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      -ms-transform: rotate(0deg);   }
    100%{transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -o-transform: rotate(0deg);}}
  
  
    @keyframes va{
      0% {margin-left:192px;}
      25% {margin-left:192px;}
    50% { margin-left:121px; }
    55% {  margin-left:121px;}
    60% {margin-left:121px;}
    65% {  margin-left:121px;}
      75% {margin-left:192px;}
   
    80% {margin-left:192px; }
   85% {margin-left:192px;  }
   90% {margin-left:192px;   }
    95% {margin-left:192px;  }
      100%{margin-left:192px;}}
    
    
    
    
    @-moz-keyframes va{
       0% {margin-left:192px;}
      25% {margin-left:192px;}
    50% { margin-left:121px; }
    55% {  margin-left:121px;}
    60% {margin-left:121px;}
    65% {  margin-left:121px;}
      75% {margin-left:192px;}
   
    80% {margin-left:192px; }
   85% {margin-left:192px;  }
   90% {margin-left:192px;   }
    95% {margin-left:192px;  }
      100%{margin-left:192px;}}
    
    
    
    @-webkit-keyframes va {
      0% {margin-left:192px;}
      25% {margin-left:192px;}
    50% { margin-left:121px; }
    55% {  margin-left:121px;}
    60% {margin-left:121px;}
    65% {  margin-left:121px;}
      75% {margin-left:192px;}
   
    80% {margin-left:192px; }
   85% {margin-left:192px;  }
   90% {margin-left:192px;   }
    95% {margin-left:192px;  }
      100%{margin-left:192px;}}

    
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>" class="logo bg-batik2">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">s<b>P</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
      <img style="position: relative; top: -2px; left: -10px;max-width: 11%" src="<?=base_url()."public/images/Lambang_Kabupaten_Kolaka_Utara.png"?>" alt="">
      si <b>PANDAI</b>
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" >
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle " data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <!-- <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" data-toggle="modal" data-target="#modal-tahun">
            <i class="fa fa-calendar"></i>
            <span class="hidden-xs"><?=@$tahun?></span>
          </a>
        </li>
      </ul> -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav ">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>public/images/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=@$_SESSION['username']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>public/images/avatar.png" class="img-circle" alt="User Image">
                <p>
                  <?=@$_SESSION['username']?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="<?=base_url()?>logout" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?=base_url()?>beranda/<?=@$tahun?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
        <?php if(@$_SESSION['level'] == 1 ){ ?>
        <li><a href="<?=base_url()?>usulan/<?=@$tahun?>/bidang"><i class="fa fa-file-text-o"></i> <span>Usulan DAK</span></a></li>
        <?php } ?>
        <?php if(@$_SESSION['level'] == 4 ){ ?>
        <li><a href="<?=base_url()?>usulan/<?=@$tahun?>/bidang"><i class="fa fa-file-text-o"></i> <span>Entry Data</span></a></li>
        <?php } ?>
        <?php if(@$_SESSION['level'] == 1 || @$_SESSION['level'] == 2 || @$_SESSION['level'] == 3){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Verifikasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>usulan/<?=@$tahun?>/bidang""><i class="fa fa-circle-o"></i> Verifikasi</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if(@$_SESSION['level'] == 1 || @$_SESSION['level'] == 2 || @$_SESSION['level'] == 3){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-save"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="<?=base_url()?>usulan/<?=@$tahun?>/bidang""><i class="fa fa-circle-o"></i> Input</a></li>  -->
            <li><a href="<?=base_url()?>usulan/<?=@$tahun?>/laporan""><i class="fa fa-circle-o"></i> Cetak Laporan</a></li> 
          </ul>
        </li>
        <?php } ?>
        <?php if(@$_SESSION['level'] == 1 ){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-code-fork"></i> <span>Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>data/<?=@$tahun?>/pegawai"><i class="fa fa-circle-o"></i> Pegawai</a></li> 
            <li><a href="<?=base_url()?>data/<?=@$tahun?>/pengguna"><i class="fa fa-circle-o"></i> Pengguna</a></li> 
          </ul>
        </li>
        <?php } ?>
        <?php if(@$_SESSION['level'] == 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-code-fork"></i> <span>Data Pendukung</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>data/<?=@$tahun?>/pendukung/satuan"><i class="fa fa-circle-o"></i> Satuan</a></li> 
          </ul>
        </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-batik">
    
  <div id="myerror">

  </div>


  <div id="loading">

  </div>

    