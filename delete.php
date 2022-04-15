<?php
session_start();
include_once("connection.php");
$insertdata=new DB_con();
$id = $_SESSION['user'];
if(isset($_GET['id'])){
$Id=$_GET['id'];
}
$sql=$insertdata->deleteRecord($id,$Id);
if($sql)
{
    echo "Data deleted successfully !";
    header('location:contact.php');
}
else
{
    echo "Error ! Please try again";
}

 ?>