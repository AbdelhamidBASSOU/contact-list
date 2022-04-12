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
        $sql=$insertdata->update($email,$phone, $adresse,$fname,$insertdate);
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