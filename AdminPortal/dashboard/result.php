<?php
include('connection.php');
include('header.php');
session_start();
if(!isset($_SESSION['Username']))
{
  header("Location: ../login.php");
}
$Username = $_SESSION['Username'];
$sql = "SELECT * FROM superadmin WHERE Username = '$Username'";
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
            <!-- Message Start -->
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
            <!-- Message End -->
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
          <a href="#" class="d-block"> <?php echo $_SESSION['Username'] ?></a>
        </div>
      </div>

       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- nav item for result -->
              <li class="nav-item">
                <a href="result.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Student Result</p>
                </a>
              </li>
              <!-- nav item for students -->
              <li class="nav-item">
                <a href="students.php" class="nav-link">
                  <i class="fas fa-tumblr nav-icon"></i>
                  <p>Students Data</p>
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
                <h5 class="card-title"><?php echo $_SESSION['Username']?> Information</h5>

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
                  $query = "SELECT * FROM kostoma WHERE Username = '$Username'";
                      $show = mysqli_query($conn, $query);
                    while($Row = mysqli_fetch_array($show))
                    {
                      ?>
                      <form method="POST" enctype='multipart/form-data'>
                      <img  src="<?php echo $Row['images'] ?>" style="width:220px;height:250px; border:5px solid"  alt="User Image"><br><br>
                      <input type="text"class="form-control" name="oloshoID" value="<?php echo $Row['kostomaID']?>"/><br>
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
                           
                                                   
                              <label>Upload Image</label>
                            <input type="file" class="form-control" name="images" value="<?php echo $Row['images']?> "required>
   
                            <br>
                         
                        <input class="btn btn-warning" type="submit" name="update" value="UPDATE PROFILE">
                        <?php

                    }
                    ?>
            </div>
            <!-- /.card-body -->
          </div>
        
             <!-- php code to update staff profle -->
             <?php
             
              if(isset($_POST['update']))
              {
                try{

                  $location= mysqli_real_escape_string($conn, $_POST['Location']);
                
                  $Age = mysqli_real_escape_string($conn, $_POST['Age']);
                  
                  $target_dir = "../../images-files/";
                  $Image = $target_dir . basename($_FILES["images"]["name"]);
                  $uploadOk = 1;
                  $imageFileType = pathinfo($Image,PATHINFO_EXTENSION);
                  //checking if the upload file is an image
                 $check = getimagesize($_FILES["images"]["tmp_name"]);
                 if($check !== false) {
                  echo "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
                  } else {
                  echo "File is not an image.";
                  $uploadOk = 0;
                  }
                  // Check file size
                  if ($_FILES["images"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                  }
                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                  && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                  }
                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                  // if everything is ok, try to upload file
                  } else {
                    if (move_uploaded_file($_FILES["images"]["tmp_name"], $Image)) {
                        echo "The file ". basename( $_FILES["images"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }

                  //sql query to update table olosho
                  $updateQuery = "UPDATE kostoma SET Location = '$location', Age = '$Age', images = '$Image' WHERE Username = '$Username'";
                  $UpdateResult = mysqli_query($conn, $updateQuery);
                  if($UpdateResult)
                  {
                    echo "<script>alert('Data updated successfully'); document.location.href='profile.php'</script>";

                  }
                  else{
                    echo "<script>alert('Error in update');</script>";
                  }
                
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
