<?php
include('connect.php');
session_start();
if(!isset($_SESSION['matricno']))
{
  header("Location: ../login.php");
}
$Username = $_SESSION['matricno'];
$sql = "SELECT * FROM student WHERE matricno = '$Username'";
$result = mysqli_query($conn, $sql);

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>STUDENT | Dashboard </title>

  <!--datatable css cdn-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <!--bootstrap jquery-->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <!--bootstrap cdn-->
 <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

   <!--datatable jquery cdn-->
   <script type="text/javascript"  src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- datatables-->
  <link rel
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a></li>    
    </ul>   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>
    
<?php
include('sidebar-img.php');
?>

     <?php
      include('sidebar.php');
     ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">

                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button> -->
                  <div class="btn-group">
              
                </div>
              </div>
             <!-- /.card-header -->
             <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                  <div class="card-body">
                  
                  <?php
                  $query = "SELECT * FROM student WHERE matricno = '$Username'";
                      $show = mysqli_query($conn, $query);
                    while($Row = mysqli_fetch_array($show))
                    {
                      ?>
                      <form method="POST" enctype='multipart/form-data'>
                           <label>MatricNo</label>  
                      <input type="text"class="form-control" name="matricno" value="<?php echo $Row['matricno']?>"/><br>
                      <label>Firstname</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $Row['firstname']?>"/><br>
                       
                          <label>Lastname</label>
                          <input type="text" class="form-control" name="lastname" value="<?php echo $Row['lastname']?>"/>
                        <br>
                       
                           <label>Email</label>
                      <input type="email" class="form-control" name="email" value="<?php echo $Row['email']?>"/><br>
                      
                       
                          <label>Departmet</label>
                          <input type="text" class="form-control" name="department" value="<?php echo $Row['department']?>"/>
                        <br>
                        <label>Level</label>
                        <input type="text" class="form-control" name="gradelevel" value="<?php echo $Row['gradelevel']?>"/><br>
         
                    
                         
                        <?php

                    }
                    ?>
               <!-- NEED TO INPUT CONTENT WITHIN THE CARD BODY-->
              </div>

<script type="text/javascript">
$(document).ready(function()
{
$("#dataTable").DataTable();
});
</script>


          </div>
        
             

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>