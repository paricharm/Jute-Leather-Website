<?php
session_start();
include 'include/config.php';
if(!isset($_SESSION['login']))
{
    header("location:login.php");
}
$slider = mysqli_query($con,"select * from slider");
$count1 = mysqli_num_rows($slider);
$categori = mysqli_query($con,"select * from categories");
$count2 = mysqli_num_rows($categori);
$product = mysqli_query($con,"select * from product");
$count3 = mysqli_num_rows($product);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
<?php include 'include/header.php' ?>
<?php include 'include/sidebar.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="py-3 col-lg-3 col-6">
                <!-- small box -->
                 <a href="home.php?Categories">
                   <div class="small-box bg-info">
                     <div class="inner">
                       <h3 class="px-2">Categories</h3>
                       <p class="px-2"><?= $count2 ?></p>
                     </div>
                     <div class="icon">
                       <i class="ion ion-bag"></i>
                     </div>
                     <a href="home.php?Categories" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                 </a>
              </div>
              <div class="py-3 col-lg-3 col-6">
                <!-- small box -->
                 <a href="home.php?Slider">
                   <div class="small-box bg-info">
                     <div class="inner">
                       <h3 class="px-2">Slider</h3>
                       <p class="px-2"><?= $count1 ?></p>
                     </div>
                     <div class="icon">
                       <i class="ion ion-bag"></i>
                     </div>
                     <a href="home.php?Slider" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                 </a>
              </div>
              <div class="py-3 col-lg-3 col-6">
                <!-- small box -->
                 <a href="home.php?Product">
                   <div class="small-box bg-info">
                     <div class="inner">
                       <h3 class="px-2">Product</h3>
                       <p class="px-2"><?= $count3 ?></p>
                     </div>
                     <div class="icon">
                       <i class="ion ion-bag"></i>
                     </div>
                     <a href="home.php?Product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
                 </a>
              </div>
            </div>
          
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'include/footer.php'; ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
