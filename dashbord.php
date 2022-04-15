<?php
/*session_start();
$timern=time()-$_SESSION ['time'];
if($timern > 3600){
    session_start();
    session_unset();
    session_destroy();
    header('location:index.php');
}*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
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
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">Contact list</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarText">
        <a href="dashbord.php" class="navbar-text">Alex </a>
      </div>
      <div class="collapse navbar-collapse" id="navbarText">
        <a href="./contact.php" class="navbar-text">Contact </a>
      </div>
      <div class="collapse navbar-collapse" id="navbarText">
        <a href="./index.php" class="navbar-text"> Logout </a>
      </div>
    </nav>
    <div class="page-content d-flex align-items-center">
      <div class="container d-flex justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
          <div class="auth-card" style="height: 450px; width: 600px">
            <h1 class="d-flex justify-content-center txt" style="font-size: 60px;">Welcome,Alex!</h1>
            <br /><br />
            <div class="d-flex" style="justify-content: space-evenly;align-items: center;">
              <h4 class="txt">Your Profile:</h4>
              <img
                src="./Assets/img/student-img(1).png"
                style="width: 80px; height: 80px; border-radius: 50%"
                alt=""
              />
            </div>
            <br /><br />

            <table class="table" style="justify-content: center;">
              <thead>
                <br />
                <tr class="txt">
                  <th scope="col" style="font-weight: bolder;">Username :</th>

                  <th href="dashbord.php" scope="col"style="font-weight: lighter;">Alex</th>
                </tr>
                <tr class="txt">
                  <th scope="col" style="font-weight: bolder;">Signup date :</th>

                  <th scope="col" style="font-weight: lighter;">Sun,07 Apr 2019 16:11:25 +0000</th>
                </tr>
                <tr class="txt">
                  <th scope="col" style="font-weight: bolder;">Last login :</th>

                  <th scope="col"style="font-weight: lighter;">Mon,08 Apr 2019 14:24:20 +0000</th>
                </tr>
              </thead>
            </table>
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
          cssStyleSheet.href = "assets/css/style_dark.css";

          document.getElementById("theme_icon").className = "fas fa-sun";
        } else {
          cssStyleSheet.href = "assets/css/style.css";
          document.getElementById("theme_icon").className = "fas fa-moon";
        }
      }
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
