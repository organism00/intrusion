<?php
include('connection.php');
include('header.php');
session_start();
if(!isset($_GET['id']))
{
  header("Location: index.php");
}
$Username = $_GET['id'];
$sql = "SELECT * FROM kostoma WHERE kostomaID = '$Username'";
$result = mysqli_query($conn, $sql);

?>
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
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Viewed Me</a></li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Matches</a></li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Favorites</a></li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">You Like</a></li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Like You</a></li>
    
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start --
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End --
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    Brand Logo
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
          <img  src="<?php echo $Row1['images'] ?>" class="img-circle elevation-2" alt="User Image">
          
          <?php
}
?>
        </div>
        <div class="info">
          <a href="#" class="d-block"> </a>
        </div>
      </div>

       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- nav item for profile -->
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>My Profile</p>
                </a>
              </li>
              <!-- nav item for Chats -->
              <li class="nav-item">
                <a href="chats.php" class="nav-link">
                  <i class="fas fa-tumblr nav-icon"></i>
                  <p>Chats</p>
                </a>
              </li>
              <!-- nav for my HookUps -->
              <li class="nav-item">
                <a href="hookups.php" class="nav-link">
                  <i class="fas fa-file-image nav-icon"></i>
                  <p>My HookUps</p>
                </a>
              </li>
         
              
              
              <!-- nav for logout -->
                <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="fas fa-power-off nav-icon"></i>
                  <p>Logout </p>
                </a>
              </li>
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
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
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
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
                  
                  <div class="card-body">
                  <div class="card-body">
                  <div class="image">
     
                
          
          
                      <?php
                  $query = "SELECT * FROM kostoma WHERE kostomaID = '$Username'";
                      $show = mysqli_query($conn, $query);
                    while($Row = mysqli_fetch_array($show))
                    {
                      ?>
                      <form method="POST" enctype='multipart/form-data'>
                      <img  src="<?php echo $Row['images'] ?>" style="width:300px;height:300px; border:5px solid;"  alt="User Image"><br><br>
                           
                      
                      <label>Firstname</label>
                        <input type="text" class="form-control" name="Firstname" value="<?php echo $Row['Firstname']?>"/><br>
                       
                          <label>Lastname</label>
                          <input type="text" class="form-control" name="Lastname" value="<?php echo $Row['Lastname']?>"/>
                        <br>
                       
                           <label>Email</label>
                      <input type="email" class="form-control" name="Email" value="<?php echo $Row['Email']?>"/><br>
                      
                       
                          <label>Phone</label>
                          <input type="text" class="form-control" name="PhoneNo" value="<?php echo $Row['PhoneNo']?>"/>
                        <br>
                        <label>Location</label>
                        <input type="text" class="form-control" name="Location" value="<?php echo $Row['Location']?>"/><br>
         
                            <label>Age</label>
                          <input type="date" class="form-control" name="Age" value="<?php echo $Row['Age']?>"/>
                            <br>
                           
                                                   
                          
                        <?php

                    }
                    ?>
            </div>
            <!-- /.card-body -->
          </div>
        
             <!-- php code to update staff profle -->
             
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
  <strong>Copyright &copy; 2020 <a href="http://adultxtra.com">ADULTXTRA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
   
    </div>
  </footer>
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
