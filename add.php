<?php
include_once("connection.php");
$insertdata=new DB_con();
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $fname = $_POST['fullname'];
    date_default_timezone_set("Asia/Calcutta");
    $insertdate = date("Y-m-d H:i:s");
    $sql=$insertdata->save($email, $phone,$adresse,$fname,$insertdate);
    if($sql)
    {
       echo "Data inserted successfully !";
    }
    else
    {
        echo "Data inserted error !";
    }
}
 ?>
 <div class="model" id="bgdark" style="display:none;">
      <div class="modal-dialog w-100" id="exampleModal">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          </div>
          <div class="modal-body">

            <form name="frmUser"action="">
              <h1>ADD</h1>
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