<?php
include_once("connection.php");
$insertdata = new DB_con();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $fname = $_POST['fullname'];
   
    
    $sql = $insertdata->update($email, $phone, $adresse, $fname,$id);
    if ($sql) {
        echo "Data inserted successfully !";

        header('location:contact.php');
    } else {
        echo "Data inserted error !";
    }
}
