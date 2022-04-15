<?php
session_start();
include_once('connection.php');
$user = new  DB_con();

if (isset($_POST['login'])) {
  $username = $user->escape_string($_POST['name']);
  $password = $user->escape_string($_POST['password']);

  $auth = $user->check_login($username, $password);

  if ($auth) {
    $_SESSION['user'] = $auth;
    $_SESSION ['time']=date("Y-m-d H:i:s");

    header('location:dashbord.php');
  } else {
    $_SESSION['message'] = 'Invalid username or password';
    header('location:index.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
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
      <a href="./signup.php" class="navbar-text"> Signup </a>
    </div>
  </nav>
  <div class="page-content d-flex align-items-center">
    <div class="container d-flex justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
        <div class="auth-card">
          <div class="logo-area">
            <h5 class="auth-title">Log-in</h5>
          </div>

          <hr class="separator" />

          <form action="" method="POST">
            <div class="mb-2 ">
              <input id="username" type="name" name="name" class="form-control auth-input" placeholder="username" aria-describedby="name" />
              <div id="erreurName" class="mb-2"></div>
            </div>

            <div class="mb-3">
              <input id="password" type="password" name="password" class="form-control auth-input" placeholder="Password" />
              <div id="erreurPassword" class="mb-3"></div>
            </div>

            <button id="login" name="login" type="submit" class="btn auth-btn mt-2 mb-4">
              Login
            </button>
          </form>

          <p class="text mb-4">
            Don't have an account?
            <a href="signup.php" class="text-link">Sign-up</a>
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
        document.getElementById("header_logo").src =
          "assets/img/logo_dark.png";
        document.getElementById("theme_icon").className = "fas fa-sun";
      } else {
        cssStyleSheet.href = "Assets/css/style.css";
        document.getElementById("theme_icon").className = "fas fa-moon";
      }
    }
  </script>
  <script src="./loginvalidation.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>