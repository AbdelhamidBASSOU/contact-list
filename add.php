<?php
session_start();
include_once("DB_con.php");
$insertdata=new DB_con();
if(isset($_POST['Add']))
{
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $fname = $_POST['fullname'];
    $id=$_SESSION['user'];
    $sql=$insertdata->save($email, $phone,$adresse,$fname,$id);
    if($sql)
    {
       echo "Data inserted successfully !";
       header("location:contact.php");
    }
    else
    {
        echo "Data inserted error !";
    }
}
 ?>
 <!-- <div class="model" id="modalAddCours">
<div class="modal-dialog" id="dark">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Contact</h4>
            </div>
            <div class="modal-body d-flex justify-content-center align-item-center" style="flex-direction: column;">
            <h1>Formulaire d'ajout</h1>
             <form method="POST" enctype="multipart/form-data" action="add.php">
               <fieldset> 
                  
              
                 <div class="form-group">
                   <label for="email"> email</label>
                   <input type="email" class="form-control"  placeholder="user@email.com" name="email">
                 </div>
                 <div class="form-group">
                   <label for="phone"> phone</label>
                   <input type="text" class="form-control"  placeholder="123XXXXXXXXXX" name="phone">
                 </div>
                 <div class="form-group">
                   <label for="adresse"> adresse</label>
                   <input type="text" class="form-control"  placeholder="123XXXXXXXXXX" name="adresse">
                 </div>
                 <div class="form-group">
                   <label for="fullname"> fullName</label>
                   <input type="text" class="form-control"  placeholder="123XXXXXXXXXX" name="fullname">
                 </div>
                 <input id="submit"
                 class="btn btn-info my-3 px-5" type="submit"
                        name="submit" value="submit"
                        onclick="on_submit()"> 
                 
               </fieldset>
             </form>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger hideModel"  data-bs-dismiss="modal">Close</button>
            </div>
        </div>
</div>
</div> -->