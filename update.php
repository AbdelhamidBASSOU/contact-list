<?php
session_start();
include_once("DB_con.php");
$insertdata = new DB_con();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $fname = $_POST['fullname'];
    $iduser = $_SESSION['user'];
    
    $sql = $insertdata->update($email, $phone, $adresse, $fname,$id,$iduser);
    if ($sql) {
        echo "<script>alert('Data inserted successfully !')</script>";

        header('location:contact.php');
    } else {
        echo "<script>alert('Data inserted successfully !')</script>";
    }
}
?>
