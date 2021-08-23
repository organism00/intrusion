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

  <title>STUDENT |Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php
                    while($Row1 = mysqli_fetch_array($result))
                    {
                      ?>
          <img  src="<?php echo $Row1['images'] ?>" style="height:50; width:50" class="img-circle elevation-2" >
          
          <?php
}
?>
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['matricno'] ?></a>
        </div>
  </div>

     <!-- Sidebar Menu -->
     <?php
      include('sidebar.php');
      ?>
    <!-- /.sidebar -->
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
                <h5 class="card-title">My Payments  </h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
               <!-- NEED TO INPUT CONTENT WITHIN THE CARD BODY-->
                  <div class="card-body">
                  <form method="post" action="payment.php">
                  <label>Payment Type</label>
                  <select name="POptions" class="form-control">
                  <option value="#">Payment-Options</option>
                  <option value="schoolfee">SCHOOL FEE</option>
                  <option value="ThirdParty">THIRD PARTY</option>
                  </select><br>

                  <label>Academic Sessions</label>
                  <select name="ASession" class="form-control">
                  <option value="#">Select-Session</option>
                  <option value="schoolfee">SCHOOL FEE</option>
                  <option value="ThirdParty">THIRD PARTY</option>
                  </select><br>

                  <label>Amount</label>
                  <input type="text" name="Amount" class="form-control" placeholder="0.00">
                  <br>
                  <input type="submit" name="submit" class="btn btn-warning" value="Make Payment">
                  </form>
          </div>
        
             <!-- php code to update staff profle -->
             <?php
             
              if(isset($_POST['update']))
              {
                try{

                  $location= mysqli_real_escape_string($conn, $_POST['Location']);
                
                  $Age = mysqli_real_escape_string($conn, $_POST['Age']);
                  
                 
                  //sql query to update table olosho
                  $updateQuery = "UPDATE olosho SET Location = '$location', Age = '$Age', images = '$Image' WHERE Username = '$Username'";
                  $UpdateResult = mysqli_query($conn, $updateQuery);
                  if($UpdateResult)
                  {
                    echo "<script>alert('Data updated successfully');</script>";
                  }
                  else{
                    echo "<script>alert('Error in update');</script>";
                  }
                
                }
                
                catch(Exception $e)
                {
                  echo "Message".$e->getMessage();
                }
              }
             ?>


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
