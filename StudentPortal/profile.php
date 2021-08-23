<?php
include('connect.php');
include('header.php');
session_start();
if(!isset($_SESSION['matricno']))
{
  header("Location: ../login.php");
}
$Username = $_SESSION['matricno'];
$sql = "SELECT * FROM student WHERE matricno = '$Username'";
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
    <?php
include('sidebar-img.php');
?>


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
                <h5 class="card-title">Student Profile </h5>

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
                  $query = "SELECT * FROM student WHERE matricno = '$Username'";
                      $show = mysqli_query($conn, $query);
                    while($Row = mysqli_fetch_array($show))
                    {
                      ?>
                      <form id="profileForm" method="POST" enctype='multipart/form-data'>
                      <img  src="<?php echo $Row['images'] ?>" style="width:150px;height:150px; border:5px solid"  alt="User Image"><br><br>
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
         
                    
                                                   
                              <label>Upload Image</label>
                            <input type="file" class="form-control" name="images" value="<?php echo $Row['images']?> "required>
   
                            <br>
                         <input type="hidden" name="info" value="user tried to tamper with information" class="info">
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

                           
                  $target_dir = "../images-files/";
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

                  //sql query to update table student
                  $updateQuery = "UPDATE student SET images = '$Image' WHERE matricno = '$Username'";
                  $UpdateResult = mysqli_query($conn, $updateQuery);
                  if($UpdateResult)
                  {
                    //javascript alert function with page reload function
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



</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>
  $(document).ready(
    function(){
      $('.form-control').each(
        function(){
          $(this).on('change', function(){
            $frm = $('#profileForm')
            alert('you cannot manipulate any text field');
            $.ajax({
                type: 'POST',
                url: '../server_scripts/tamper.php',
                data: $frm.serialize(),
                dataType: "json",
                success: function(response){
                  if(response.success === 1){
                    window.location = 'profile.php';
                  }
                }
              });
            });
        }
      );
    }
  );
</script>
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
