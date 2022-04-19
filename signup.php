<?php
include_once('DB_con.php');
$userdata = new DB_con();
if (isset($_POST['submit'])) {

  $uname = $_POST['name'];
  $uemail = $_POST['email'];
  $password = $_POST['password'];
  $rpassword = $_POST['rpassword'];



  /*if (!empty($uemail) || !empty($password)) {
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
      echo 'the password does not meet the requirements!';
    }
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $uemail)) {
      echo 'the Email does not meet the requirements!';
    }
  }*/

  if ($password == $rpassword) {
    $sql = $userdata->registration($uname, $uemail, $password);
    if ($sql) {

      echo "<script>alert('Registration successfull.');</script>";
      header('location:login.php');
    } else {

      echo "<script>alert('Something went wrong. Please try again');</script>";
    }
  } else {
    echo "<script>alert('password doesn't match');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SignUp</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link id="mainStyle" rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">Contact list</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarText">
      <a href="./login.php" class="navbar-text"> Login </a>
    </div>
  </nav>
  <div class="page-content d-flex align-items-center">
    <div class="container d-flex justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
        <div class="auth-card">
          <div class="logo-area">
            <h5 class="auth-title">Sign-up</h5>
          </div>

          <hr class="separator" />

          <form method="POST" action="">
            <div class="mb-2 mt-5">
              <input id="Username" type="name" name="name" class="form-control auth-input" placeholder="username" aria-describedby="name" />
              <div id="errUser" class="mb-2"></div>
            </div>
            <div class="mb-2">
              <input id="Email" type="email" name="email" class="form-control auth-input" placeholder="E-Mail Adresse" aria-describedby="emailHelp" />
              <div id="errEmail" class="mb-2"></div>
              <small></small>
            </div>

            <div class="mb-2">
              <input id="Password" type="password" name="password" class="form-control auth-input" placeholder="Password" />
              <div id="errPass" class="mb-2"></div>
              <small></small>
            </div>

            <div class="mb-3">
              <input id="PasswordV" type="password" name="rpassword" class="form-control auth-input" placeholder="Repeat Password" />
              <div id="errPassV" class="mb-2"></div>
            </div>

            <button id="signup" href="" name="submit" type="submit" class="btn bt auth-btn mt-2 mb-4">Register</button>
          </form>

          <p class="text mb-4">
            Already have an Account?
            <a href="login.php" class="text-link"> Login</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <button id="theme_button" class="btn btn-theme" onclick="onThemeChange()">
    <i id="theme_icon" class="fas fa-moon"></i>
  </button>

  <script type="text/javascript">
    function onThemeChange() {
      let cssStyleSheet = document.getElementById("mainStyle");
      let path = cssStyleSheet.href.substring(
        cssStyleSheet.href.length - 9,
        cssStyleSheet.href.length
      );
      if (path === "style.css") {
        cssStyleSheet.href = "Assets/css/style_dark.css";

        document.getElementById("theme_icon").className = "fas fa-sun";
      } else {
        cssStyleSheet.href = "Assets/css/style.css";

        document.getElementById("theme_icon").className = "fas fa-moon";
      }
    }
  </script>
  <script src="./mode.js"></script>
  <script src="./signupvalidation.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>