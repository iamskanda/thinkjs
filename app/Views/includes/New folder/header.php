<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Driving School Management</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url('public/assets/fontawesome/css/all.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('public/assets/css/adminlte.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('public/assets/css/animate.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>">

   
   <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo base_url('public/assets/tables/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('public/assets/tables/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('public/assets/tables/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">


   
   

   <!-- bootstrap CDN -->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

   <!-- <script src="<?php echo base_url('public/assets/jquery/jquery-3.6.0.min.js'); ?>"></script> -->
   <script src="<?php echo base_url('public/assets/js/adminlte.js'); ?>"></script>
   <script src="<?php echo base_url('public/assets/js/canvasjs.min.js'); ?>"></script>

   <!-- toastr -->
   <script src="<?php echo base_url('public/assets/toastr/toastr.min.js'); ?>"></script>
   <link rel="stylesheet" href="<?php echo base_url('public/assets/toastr/toastr.min.css'); ?>">

   <!-- sweet_alert -->
   <script src="<?php echo base_url('public/assets/sweet_alert/sweet-alert.js');?>"></script>
   <link rel="stylesheet" href="<?php echo base_url('public/assets/sweet_alert/sweet-alert.css');?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">

         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">

               <?php
               $role_id = session()->get('role_id');
               if ($role_id == '1') {
               ?>
                  <select class="nav-link" name="org" id="orgSelect">
                     <option value="0">select</option>

                     <?php foreach ($branchdata as $key => $branch) {
                        if (!empty($branch)) {
                           if ($branch['id'] == session()->get('branch_id')) {
                     ?>

                              <option value="<?php echo $branch['id'] ?>" >
                                 <?php echo $branch['name'] ?>
                              </option>

                           <?php } else { ?>

                              <option value="<?php echo $branch['id'] ?>">
                                 <?php echo $branch['name'] ?>
                              </option>

                     <?php }
                        }
                     } ?>

                  </select>
               <?php } else { ?>

                  <select class="nav-link" name="org" id="orgSelect">

                     <?php foreach ($branchdata as $key => $branch) {
                        if (!empty($branch)) {
                           if ($branch['id'] == session()->get('branch_id')) {
                     ?>
                              <option value="<?php echo $branch['id'] ?>" >
                                 <?php echo $branch['name'] ?>
                              </option>
                     <?php
                           }
                        }
                     }
                     ?>
                  </select>

               <?php } ?>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="<?php echo base_url('log-out');?>">
                  <i class="fas fa-power-off"></i>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(62,88,113);">
         <!-- Brand Logo -->
         <a href="index.html" class="brand-link animated swing">
            <img src="<?php echo base_url('public/assets/img/logo1.png'); ?>" alt="DSMS Logo" width="200">
         </a>
         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="<?php echo base_url('public/assets/img/avatar.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                  <a href="#" class="d-block">John Doe</a>
               </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item animated bounceInLeft">
                     <a href="index.html" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item animated bounceInRight">
                     <a href="<?php echo base_url('branch-page') ?>" class="nav-link">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>
                           Branch
                        </p>
                     </a>
                  </li>

                  <li class="nav-item animated bounceInRight">
                     <a href="<?php echo base_url('employee-page') ?>" class="nav-link">
                        <!-- <i class=" fas fa-code-branch"></i> -->
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                           Employee
                        </p>
                     </a>
                  </li>
                  
                  <li class="nav-item animated bounceInRight">
                     <a href="<?php echo base_url('student-page') ?>" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                           Student
                        </p>
                     </a>
                  </li>

                  <li class="nav-item animated bounceInLeft">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-wpforms"></i>
                        <!-- <i class="nav-icon fas fa-user"></i> -->
                        <p>
                           Forms
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="add-instructor.html" class="nav-link">
                              <i class="nav-icon fas fa-envelope-open-text"></i>
                              <!-- <i class="nav-icon fa fa-plus"></i> -->
                              <p>Add</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="manage-instructor.html" class="nav-link">
                              <i class="nav-icon fas fa-envelope-open-text"></i>
                              <!-- <i class="nav-icon fa fa-list"></i> -->
                              <p>Manage</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  
                  <li class="nav-item animated bounceInLeft">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                           Instructor
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="add-instructor.html" class="nav-link">
                              <i class="nav-icon fa fa-plus"></i>
                              <p>Add</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="manage-instructor.html" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>Manage</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item animated bounceInRight">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                           Schedule
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="add-schedule.html" class="nav-link">
                              <i class="nav-icon fa fa-plus"></i>
                              <p>Add</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="manage-schedule.html" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>Manage</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item animated bounceInLeft">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                           Enrollment
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="add-enroll.html" class="nav-link">
                              <i class="nav-icon fa fa-plus"></i>
                              <p>Add</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="manage-enroll.html" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>Manage</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item animated bounceInRight">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                           Payment
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="add-payment.html" class="nav-link">
                              <i class="nav-icon fa fa-plus"></i>
                              <p>Add</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="manage-payment.html" class="nav-link">
                              <i class="nav-icon fa fa-list"></i>
                              <p>Manage</p>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
               </li>
               </ul>
            </nav>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">



<script>

   $('#orgSelect').change(function() {

      if (this.value == 0) {

      }else{  

         var org = $('#orgSelect').val();        

         $.ajax({

            type: 'post',
            url: '<?php echo site_url("change-branch") ?>',
            data: {org: org},

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