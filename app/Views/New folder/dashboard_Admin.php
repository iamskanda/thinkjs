<?php
    echo view('includes/header');    
?>

<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0"><span class="fa fa-tachometer-alt"></span> Dashboard</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                     <div class="col-lg-4 col-6 animated bounceInLeft">
                        <!-- small box -->
                        <div class="small-box bg-1">
                           <div class="inner">
                              <h3>8</h3>
                              <p>Instructors</p>
                           </div>
                           <div class="icon">
                              <i class="fa fa-user fa-2x"></i>
                           </div>
                           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-4 col-6 animated rubberBand">
                        <!-- small box -->
                        <div class="small-box bg-2">
                           <div class="inner">
                              <h3>20</h3>
                              <p>Students</p>
                           </div>
                           <div class="icon">
                              <i class="fa fa-users fa-2x"></i>
                           </div>
                           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-4 col-6 animated bounceInRight">
                        <!-- small box -->
                        <div class="small-box bg-3">
                           <div class="inner">
                              <h3>20,000</h3>
                              <p>Income</p>
                           </div>
                           <div class="icon">
                              <i class="fa fa-money-bill fa-2x"></i>
                           </div>
                           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-12 col-6">
                        <!-- small box -->
                        <div class="small-box">
                           <div class="inner" style="background-color: #fff">
                              <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                           </div>
                        </div>
                     </div>
                     <!-- ./col -->
                  </div>
                  <!-- /.row -->
                  <!-- /.row (main row) -->
               </div>
               <!-- /.container-fluid -->
            </section>
</div>


<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
   animationEnabled: true,
   theme: "light2", // "light1", "light2", "dark1", "dark2"
   title:{
      text: "Monthly Sales"
   },
   axisY: {
      title: "Income"
   },
   data: [{        
      type: "column",  
      showInLegend: true, 
      legendMarkerColor: "grey",
      legendText: "MMbbl = one million barrels",
      dataPoints: [      
         { y: 70000, label: "January" },
         { y: 80000,  label: "February" },
         { y: 90000,  label: "March" },
         { y: 85000,  label: "April" },
         { y: 95000,  label: "May" },
         { y: 100000, label: "June" },
         { y: 110000,  label: "July" },
         { y: 99000,  label: "August" },
         { y: 120000,  label: "September" },
         { y: 130000,  label: "October" },
         { y: 140000,  label: "November" },
         { y: 145000,  label: "December" }
      ]
   }]
});
chart.render();

}
</script>


<?php
    echo view('includes/footer');    
?>