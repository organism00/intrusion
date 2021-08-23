
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student| Log in</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>LOGIN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="loginFrm" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="matricno" class="form-control" placeholder="MatricNo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  id="login" submitform name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://antquakes.com.ng/dashboard/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$("form#loginFrm").submit(function(e){
  e.preventDefault();
  var formData = new FormData($("form#loginFrm")[0]);
  var $thiss=$("[submitform]");
  $thiss.attr("disabled",true);
  $thiss.text("Loading...");
  //Start Ajax
  $.ajax({
    url: 'server_scripts/login-backend.php',
    type: 'POST',
    data: formData,
    dataType: "json",
    //async: false,
    cache: false,
    contentType: false,
    processData: false,
    success : function(data){
    console.log(data);
      if (data.success == 1){ 
        $thiss.text("Redirecting...");
        window.location.replace("StudentPortal");
      } else {
        $thiss.text("Login");
        $thiss.removeAttr("disabled");
        $("[errordiv]").html(data.text);
      }
    }
  });

})
</script>   
<!--script>
  $(document).ready(
    function(){
      let loginFrm = $('#loginFrm');

      loginFrm.on('submit', function(e){
        e.preventDefault();
        $.ajax({
          //type: $(this).attr('method'),
          url: 'server_scripts/login-backend.php',
          type: "POST",
          data: $(this).serialize(),
          dataType: 'json',
          timeout: 2000,
          beforeSend: function(){
            $('[type="submit"]').text("loading");
          },
          success: function(response){
            setTimeout(() => {
            if(response.success === 1){
              alert("login successfull");
              location.href = 'StudentPortal';
            }else{
              alert("invalid login credentials, try again");
              $('.form-control').each(function(){
                $(this).val("");
              });
              $('[type="submit"]').text("Sign In");
            }
          }, 1500);
        } 
      });
      });
    }
  );
</script-->
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
