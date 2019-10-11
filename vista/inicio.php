<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Báyental - Calculadora</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./vista/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./vista/fileinput/css/fileinput.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./vista/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./vista/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="./vista/plugins/pace/pace.min.css">
  <!-- jQuery 3 -->
    <script src="./vista/bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="./vista/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vista/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./vista/plugins/iCheck/all.css">
    <link rel="stylesheet" href="./vista/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="./vista/plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="./vista/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./vista/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="./vista/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="./vista/dist/css/skins/skin-purple-light.css">
    <link rel="stylesheet" href="./vista/dist/css/skins/skin-red.css">
    <link rel="stylesheet" href="./vista/datatables/datatables.min.css">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        .skin-purple .main-header .navbar .dropdown-menu li a {
            color: #333 !important;
        }
        .content-wrapper{
          background-color:#ffffff !important;
        }
        .content-wrapper, .main-footer {
          margin-left:0px !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('body').layout('fix');
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<!-- Site wrapper -->
<div class="wrapper" id="main_elem">
  <header class="main-header">
    <!-- Logo -->
    <a href="./inicio.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Báy</span>
      <!-- logo for regular state and mobile devices -->
      <!--<span class="logo-lg"><b>Báyental</b></span>-->
      <span class="logo-lg"><img src="./vista/img/bayental_logo_2.png" id="id_img_header" class="center-block img-responsive" style="height:50px;"/></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu">
        
      </div>
    </nav>
  </header>  
  <!-- Content Wrapper. Contains page content --> 
  <div class="content-wrapper" id="main_content">
    <section class="content">
      <div id="launcher">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="info-box"  style="height:54px;">
                    <a href="javascript:void(0)" @click="load_wrapper('./vista/simulador1.php');"><span class="info-box-icon bg-green"><i class="glyphicon glyphicon-signal"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text">
                          <a href="javascript:void(0)" @click="load_wrapper('./vista/simulador1.php');"><h3>SIMULADOR - CALL CENTER</h3></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="info-box"  style="height:54px;">
                    <a href="javascript:void(0)" @click="load_wrapper('./vista/simulador2.php');"><span class="info-box-icon bg-green"><i class="glyphicon glyphicon-signal"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text">
                          <a href="javascript:void(0)" @click="load_wrapper('./vista/simulador2.php');"><h3>FACTORES DE CONVERSION</h3></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="info-box"  style="height:54px;">
                    <a href="javascript:void(0)" @click="load_wrapper('./vista/simulador3.php');"><span class="info-box-icon bg-green"><i class="glyphicon glyphicon-signal"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text">
                          <a href="javascript:void(0)" @click="load_wrapper('./vista/simulador3.php');"><h3>PYA NUEVO</h3></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://www.bayental.com/" target='_blank'>Báyental BPO</a>.</strong> Todos los derechos reservados.
  </footer>
</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.7 -->
<script src="./vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./vista/fileinput/js/fileinput.js"></script>
<script src="./vista/fileinput/js/locales/es.js"></script>
<!-- PACE -->
<script src="./vista/bower_components/PACE/pace.min.js"></script>
<!-- SlimScroll -->
<script src="./vista/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="./vista/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="./vista/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="./vista/plugins/input-mask/jquery.inputmask.js"></script>
<script src="./vista/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="./vista/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="./vista/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="./vista/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="./vista/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="./vista/plugins/iCheck/icheck.min.js"></script>
<script src="./vista/datatables/datatables.min.js"></script>
<script src="./vista/js/vue.js"></script>
<script src="./vista/js/axios.min.js"></script>
<script src="./vista/js/moment.js"></script>
<script type="text/javascript" src="./vista/sweetalert/dist/sweetalert.min.js"></script>
<!-- FastClick -->
<script src="./vista/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="./vista/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./vista/dist/js/demo.js"></script>
<!-- page script -->
<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  });
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  });

  var elem = new Vue({
      el: '#main_elem',
      data: {
          mensajes: "Tienes 0 mensajes",
          notificaciones: "Tienes 0 notificaciones",
          tareas: "Tienes 0 tareas"
      },
      created: function () {
      },
      methods: {
        load_wrapper(url){
          if(url!=''){
              $('#main_content').load(url);
          }
        }
      },
      mounted() {
      }
  });
</script>
</body>
</html>
