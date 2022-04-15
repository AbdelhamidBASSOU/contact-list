<?php
session_start();
include_once("connection.php");
$viewdata = new DB_con();
$contacts = $viewdata->displayRecord();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link id="mainStyle" rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">Contact list</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarText">
      <a href="dashbord.php" class="navbar-text">Profile</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarText">
      <a href="./contact.php" class="navbar-text">Contact </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarText">
      <a href="./index.php" class="navbar-text"> Logout </a>
    </div>
  </nav>
  <div class="page-content d-flex align-items-center" style="position:relative;">
    <div class="container d-flex justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-9 ">
        <div class=" auth-card" style="height: 500px; max-height:440px;width:100%; overflow:scroll;">
          <div class="sticky-top w-100 " style="padding-top:0px;z-index:1030;background-color:#e5e5e5;;">
            <h1 class="d-flex justify-content-center txt " style="color:#45a29e;font-size: 60px">
              CONTACTS
            </h1>
          </div>
          <br /><br />
          <h4 class="txt">Contact list:</h4>
          <br /><br />

          <div class="d-flex table-responsive-sm table-responsive-md px-2" style="
                justify-content: space-evenly;
                align-items: center;
                flex-direction: column;
              ">
            <table class="txt table table table-hover align-middle table-borderless caption-top mb-3 mb-md-0 ">
              <thead class="sticky-top">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">fullname</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <?php foreach ($contacts as $contacte) : ?>
                <tbody>
                  <tr>
                    <th scope="col"><?php echo $contacte["id"] ?></th>
                    <th scope="col"><?php echo $contacte["email"] ?></th>
                    <th scope="col"><?php echo $contacte["phone"] ?></th>
                    <th scope="col"><?php echo $contacte["adresse"] ?></th>
                    <th scope="col"><?php echo $contacte["fullname"] ?></th>
                    <th scope="col">
                      <i class="ed fal fa-pen" data-id="<?php echo $contacte["id"] ?>" onclick="<?php $userid = $contacte["id"];
                                                                                                ?> " style="color: #1da19b"></i>
                      <a href="delete.php?id=<?php echo $contacte["id"] ?>"><i class="del fal fa-trash mx-1" style="color: #1da19b"></i></a>
                    </th>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>

            <a href="#" type="button" class="btn text-white my-3" style="background-color: #1da19b">ADD NEW CONTACT</a>
          </div>
          <br /><br />
        </div>
      </div>
    </div>

    <div class="model" id="bgdark" style="display:none;">
      <div class="modal-dialog w-100" id="exampleModal">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
          </div>
          <div class="modal-body">

            <form name="frmUser" method="post" action="update.php">
              <h1>Update</h1>
              <div class="form-group">
                <label for="id">id</label>
                <input type="hidden" class="form-control" name="id" value="">
              </div>
              <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" placeholder="contact@email.com" name="email" value="">
              </div>
              <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" class="form-control" placeholder="123XXXXXXXXXX" name="phone" value="">
              </div>
              <div class="form-group">
                <label for="enroll_number">Adresse</label>
                <input type="text" class="form-control" placeholder="123XXXXXXXXXX" name="adresse" value="">
              </div>
              <div class="form-group">
                <label for="Fullname">Fullname</label>
                <input type="text" class="form-control" placeholder="Entrez votre nom" name="fullname" value="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary close">Close</button>
                <input type="submit" name="update" class="btn btn-primary" value="Update">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <button id="theme_button" class="btn btn-theme" onclick="onThemeChange()">
      <i id="theme_icon" class="fas fa-moon"></i>
    </button>

    <script type="text/javascript">
      const edit = document.querySelectorAll('.ed');
      const modal = document.querySelector("#bgdark");
      const delet = document.querySelector('.del');
      for (i = 0; i < edit.length; i++) {
        edit[i].addEventListener("click", (e) => {

          <?php

          $js_array = json_encode($contacts);
          echo "var javascript_array = " . $js_array . ";\n";
          ?>
          const result = javascript_array.filter(contact => contact.id == e.target.getAttribute("data-id"));


          document.getElementsByName("id")[0].value = result[0].id
          document.getElementsByName("email")[0].value = result[0].email
          document.getElementsByName("phone")[0].value = result[0].phone
          document.getElementsByName("adresse")[0].value = result[0].adresse
          document.getElementsByName("fullname")[0].value = result[0].fullname

          modal.setAttribute("style", "display:flex; position:absolute ;z-index : 1060; background-color:rgba(0,0,0,0.5); height:100%;width:100%");
        });
      }

      document.querySelector(".close").addEventListener("click", function() {
        document.querySelector("#bgdark").style.display = "none";
      });

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>