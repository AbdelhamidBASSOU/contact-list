<?php
/*session_start();

if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:login.php');
}
 
include_once('connection.php');
 
$user = new DB_con();
 

$sql = "SELECT * FROM user WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);*/
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link id="mainStyle" rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body class="big">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Contact list</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarText">
        <a href="login.php" class="navbar-text"> Login </a>
      </div>
    </nav>

    <div
      class="big card border-0 col-12 d-flex justify-content-center align-items-center mt-5"
    >
      <div
        class="small auth-card card-body text-dark fs-5 border-0 px-4 py-5 mx-0 rounded-3 h-100"
      >
        <h3 class="title  card-title  mb-4 fw-bolder">Hello!</h3>
        <p class="auth-title txt card-text pb-4">
          Welcome to your contact list web site<br /><br />
          <a href="signup.php" class="fw-bold" style="color: #45a29e"
            >Sign Up</a
          > to start creating your conatct list for free  <br /> <br />
          already have an account?
          <a href="login.php" class="fw-bold" style="color: #45a29e"
            >login</a
          >
        </p>
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
          cssStyleSheet.href = "assets/css/style_dark.css";

          document.getElementById("theme_icon").className = "fas fa-sun";
        } else {
          cssStyleSheet.href = "assets/css/style.css";
          document.getElementById("theme_icon").className = "fas fa-moon";
        }
      }
    </script>
     <script src="./mode.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
