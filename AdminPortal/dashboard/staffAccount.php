<?php
include('connection.php');
if(isset($_POST['submit']))
{
try{
  $Firstname = mysqli_real_escape_string($conn, $_POST['Firstname']);
	$Lastname = mysqli_real_escape_string($conn, $_POST['Lastname']);
  $Sex = mysqli_real_escape_string($conn, $_POST['Sex']);
  $Email = mysqli_real_escape_string($conn, $_POST['Email']);
  $Department = mysqli_real_escape_string($conn, $_POST['Department']);
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
  $Password = mysqli_real_escape_string($conn, $_POST['Password']);
  $cPassword = mysqli_real_escape_string($conn, $_POST['cPassword']);
	
	if($_POST['Password'] != $_POST['cPassword']){
	   echo "<script>alert('password do not match');window.location='index.php'</script>";
	   exit();
    }
//     //code to upload image
//     $target_dir = "../../images-files/";
//     $Image = $target_dir.basename($_FILES["images"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = pathinfo($Image,PATHINFO_EXTENSION);
//     //checking if the upload file is an image
//    $check = getimagesize($_FILES["images"]["tmp_name"]);
//    if($check !== false) {
//     echo "File is an image - " . $check["name"] . ".";
//     $uploadOk = 1;
//     } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//     }
//     // Check file size
//     if ($_FILES["images"]["size"] > 5000000) {
//       echo "Sorry, your file is too large.";
//       $uploadOk = 0;
//     }
//     // Allow certain file formats
//     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//     && $imageFileType != "gif" ) {
//       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//       $uploadOk = 0;
//     }
//     // Check if $uploadOk is set to 0 by an error
//     if ($uploadOk == 0) {
//       echo "Sorry, your file was not uploaded.";
//     // if everything is ok, try to upload file
//     } else {
//       if (move_uploaded_file($_FILES["images"]["tmp_name"], $Image)) {
//           echo "The file ". basename( $_FILES["images"]["name"]). " has been uploaded.";
//       } else {
//           echo "Sorry, there was an error uploading your file.";
//       }
//     }

	// checking for redundancy
	$check_query = " SELECT * FROM staff WHERE Username = '$Username'";
	$CheckResult = mysqli_query($conn, $check_query);
	$Row = mysqli_num_rows($CheckResult);	
	if($Row > 0)
	{
		echo "<script>alert('this data already exist');</script>";
	}else{
		// // creating a hash (cryptography) function for password
		// $sashed = "STAFF".$Password."ACCOUNT";
		// $hash = hash('sha512',$sashed);
		// $Password = md5($hash, true);
		
		// inserting data into database
		$Query = "INSERT INTO staff (Firstname,Lastname,Sex,Email,Department,Username,Password) VALUES('$Firstname','$Lastname','$Sex','$Email','$Department','$Username','$Password')";
		$result = mysqli_query($conn, $Query);
		if($result)
		{
			echo "<script>alert('Your account has been created successfully');window.location='index.php'</script>";
		}else{
      echo "<script>alert('Data not saved please contact administrator');</script>";
		}
	}
}
catch(Exception $e )
{
	echo 'message'. $e->getMessage();
}
}
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff-Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>CREATE ACCOUNT</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">create a new account </p>

      <form action="staffAccount.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="Firstname" class="form-control" placeholder="Firstname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="text" name="Lastname" class="form-control" placeholder="firstname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
         
        <div class="input-group mb-3">
          <input type="text" name="Sex" class="form-control" placeholder="Sex" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
       
         
        <div class="input-group mb-3">
          <input type="email" name="Email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
         

        <div class="input-group mb-3">
          <input type="text" name="Department" class="form-control" placeholder="Department">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

       

        <div class="input-group mb-3">
          <input type="text" name="Username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" id="Pass" name="Password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" id="cPass" name="cPassword" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- <div class="input-group mb-3">
          <input type="file"  name="images" class="form-control" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> -->

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      <!-- <a href="login.php" class="text-center">Already have an account</a> -->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
