<?php
include_once("connection.php");
$viewdata = new DB_con();
$contacts = $viewdata->displayRecord();
$userid = $_GET['id'];
$contact = $viewdata->displayRecordbyid($userid);
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
      <a href="dashbord.php" class="navbar-text">Alex </a>
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
      <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
        <div class="auth-card" style="height: 500px; width: 650px">
          <h1 class="d-flex justify-content-center txt" style="font-size: 60px">
            CONTACTS
          </h1>
          <br /><br />
          <h4 class="txt">Contact list:</h4>
          <br /><br />
          <div class="d-flex" style="
                justify-content: space-evenly;
                align-items: center;
                flex-direction: column;
              ">
            <table class="txt table ">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">fullname</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <?php foreach ($contacts as $contact) { ?>
                <tbody>
                  <tr>
                    <th scope="col"><?php echo $contact["id"] ?></th>
                    <th scope="col"><?php echo $contact["email"] ?></th>
                    <th scope="col"><?php echo $contact["phone"] ?></th>
                    <th scope="col"><?php echo $contact["adresse"] ?></th>
                    <th scope="col"><?php echo $contact["fullname"] ?></th>
                    <th scope="col">
                      <a href='?id=<?php echo $contact['id'] ?> '> <i class="ed fal fa-pen" style="color: #1da19b"></i></a>
                      <a href="#"><i class="del fal fa-trash mx-1" style="color: #1da19b"></i></a>
                    </th>
                  </tr>
                </tbody>
              <?php } ?>
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
                <input type="hidden" class="form-control" name="id" value="<?php echo $contact['id']; ?>">
              </div>
              <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" placeholder="contact@email.com" name="email" value="<?php echo $contact['email']; ?>">
              </div>
              <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" class="form-control" placeholder="123XXXXXXXXXX" name="phone" value="<?php echo $contact['phone']; ?>">
              </div>
              <div class="form-group">
                <label for="enroll_number">Adresse</label>
                <input type="text" class="form-control" placeholder="123XXXXXXXXXX" name="adresse" value="<?php echo $contact['adresse']; ?>">
              </div>
              <div class="form-group">
                <label for="Fullname">Fullname</label>
                <input type="text" class="form-control" placeholder="Entrez votre nom" name="adresse" value="<?php echo $contact['fullname']; ?>">
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
      const edit = document.querySelector('.ed');
      const modal = document.querySelector("#bgdark");
      const delet = document.querySelector('.del');
      for(i=0;i<edit.length;i++){
      edit.addEventListener("click", (e) => {

        modal.setAttribute("style", "display:flex; position:absolute ;z-index : 1060; background-color:rgba(0,0,0,0.5); height:100%;width:100%");
      });}

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