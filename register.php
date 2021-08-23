<?php
include('connect.php');
if(isset($_POST['submit']))
{
try{
  $MatricNo = mysqli_real_escape_string($conn, $_POST['matricno']);
	$Firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $Lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $Email = mysqli_real_escape_string($conn, $_POST['email']);
  $Department = mysqli_real_escape_string($conn, $_POST['department']);
	$Level = mysqli_real_escape_string($conn, $_POST['gradelevel']);
  $Password = mysqli_real_escape_string($conn, $_POST['password']);
  $cPassword = mysqli_real_escape_string($conn, $_POST['cPassword']);
	
	if($_POST['password'] != $_POST['cPassword']){
	   echo "<script>alert('password do not match');window.location='index.php'</script>";
	   exit();
	}
	// checking for redundancy
	$check_query = " SELECT * FROM student WHERE matricno = '$MatricNo'";
	$CheckResult = mysqli_query($conn, $check_query);
	$Row = mysqli_num_rows($CheckResult);	
	if($Row > 0)
	{
		echo "<script>alert('this data already exist');</script>";
  }
  else
  {
		// creating a hash (cryptography) function for password
		// $sashed = "SCHOOL".$Password."XTRA";
		// $hash = hash('sha512',$sashed);
		// $Password = md5($hash, true);
		
		// inserting data into database
		$Query = "INSERT INTO student (matricno,firstname,lastname,email,department,gradelevel,password) VALUES('$MatricNo','$Firstname','$Lastname','$Email','$Department','$Level','$Password')";
		$result = mysqli_query($conn, $Query);
		if($result)
		{
			echo "<script>alert('Your account has been created successfully');window.location='login.php'</script>";
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
  <title>Student-Registration Page</title>
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

      <form action="register.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="matricno" class="form-control" placeholder="MatricNo" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="text" name="firstname" class="form-control" placeholder="firstname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
         
        <div class="input-group mb-3">
          <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
       
         
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
         

        <div class="input-group mb-3">
          <input type="text" name="department" class="form-control" placeholder="Department">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="gradelevel" class="form-control" placeholder="Grade Level">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" id="Pass" name="password" class="form-control" placeholder="Password">
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

     

      <a href="login.php" class="text-center">Already have an account</a>
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
