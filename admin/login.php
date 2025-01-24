<?php
include 'include/config.php';
session_start();
if(isset($_SESSION['login']))
{
    header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Name | Log in</title>
  <link rel='stylesheet' href='css/sweetalert2.min.css'>
  <script src="css/sweetalert2.all.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="dist/js/sweetalert.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="" style="font-weight:bold;">Company Name</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
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
            <!-- <input type="submit" class="btn btn-primary btn-block" name="submit" value="Sign In"> -->
            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
      </div>
      <!-- /.social-auth-links -->
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
<?php
// Example usage
if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($username == "" || $password == "")
  {
    echo '<script>
        Swal.fire({
    title: "Oops",
    text: "Please Fill All Field",
    icon: "error",
    timer:2500
  })
        </script>';
  }else{
    $sql = "select * from admin where username = '{$username}' and password= '{$password}'";
    $query = mysqli_query($con,$sql);
    if(mysqli_num_rows($query)>0)
    {
      while($row = mysqli_fetch_assoc($query))
      {
        $_SESSION['username'] = $row['username'];
        $_SESSION['login'] = 1;
        echo '<script>
        Swal.fire({
        title: "Congratulations",
        text: "Login Successfully",
        icon: "success",
        timer:2500
      }).then(()=>{
      setTimeout(window.location.replace("dashboard.php"),1500)
      })
        </script>';
      }
    }
  }
}
?>