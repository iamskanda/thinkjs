<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Think js</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/fontawesome-free/css/all.min.css'); ?>" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>" />
  <!-- iCheck -->


  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/jqvmap/jqvmap.min.css'); ?>" />
  <!-- Theme style -->

  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'); ?>">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/bs-stepper/css/bs-stepper.min.css'); ?>">


  <link rel="stylesheet" href="<?php echo base_url('public/assets/dist/css/adminlte.min.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('public/assets/css/new-style.css'); ?>" />

  <!-- overlayScrollbars -->


  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/daterangepicker/daterangepicker.css'); ?>" />
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/summernote/summernote-bs4.min.css'); ?>" />

  <!-- jQuery -->
  <script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge("uibutton", $.ui.button);
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url('public/assets/plugins/chart.js/Chart.min.js'); ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url('public/assets/plugins/sparklines/sparkline.js'); ?>"></script>


  <!-- daterangepicker -->
  <script src="<?php echo base_url('public/assets/plugins/moment/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
  <!-- Summernote -->
  <script src="<?php echo base_url('public/assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('public/assets/dist/js/adminlte.js'); ?> "></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('public/assets/dist/js/demo.js'); ?> "></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url('public/assets/dist/js/pages/dashboard.js'); ?> "></script>
  <script src="<?php echo base_url('public/assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/dropzone/min/dropzone.min.css'); ?>">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/select2/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">

  <!-- Bootstrap4 Duallistbox -->
  <script src="<?php echo base_url('public/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/assets/plugins/inputmask/jquery.inputmask.min.js'); ?>"></script>

  <!-- Bootstrap Switch -->
  <script src="<?php echo base_url('public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"></script>

  <!-- bootstrap color picker -->
  <script src="<?php echo base_url('public/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'); ?>"></script>
  <!-- BS-Stepper -->
  <script src="<?php echo base_url('public/assets/plugins/bs-stepper/js/bs-stepper.min.js'); ?>"></script>
  <!-- dropzonejs -->
  <script src="<?php echo base_url('public/assets/plugins/dropzone/min/dropzone.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('public/assets/dist/js/adminlte.min.js'); ?>"></script>

  <!-- toastr -->
  <script src="<?php echo base_url('public/assets/toastr/toastr.min.js'); ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('public/assets/toastr/toastr.min.css'); ?>">

  <!-- sweet_alert -->
  <script src="<?php echo base_url('public/assets/sweet_alert/sweet-alert.js'); ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('public/assets/sweet_alert/sweet-alert.css'); ?>">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <h4><?php echo (session()->get('name')); ?></h4>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"><?php echo count($meeting) ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?php echo count($meeting) ?> Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            
            <div class="dropdown-divider"></div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('log-out'); ?>" role="button">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('Dashboard-Admin'); ?>" class="brand-link">
        <img src="<?php echo base_url('public/assets/img/logo1.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="background-color: white;width:2em;" />
        <span class="brand-text font-weight-light">Think js</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">




        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="<?php echo base_url('employee'); ?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Employee</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('meeting'); ?>" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>Meeting Section</p>
              </a>
            </li>




          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>



    <script>
      $('#orgSelect').change(function() {

        if (this.value == 0) {

        } else {

          var org = $('#orgSelect').val();

          $.ajax({

            type: 'post',
            url: '<?php echo site_url("change-branch") ?>',
            data: {
              org: org
            },

            success: function(response) {

              console.log(response);
              response = jQuery.parseJSON(response);
              window.location.href = "<?php echo site_url('Dashboard-Admin') ?>";
            }
          });
        }
      });

      $('#orgSelect').val(<?php echo session()->get('branch_select_id'); ?>);
    </script>