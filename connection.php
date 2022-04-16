<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'contactbase');
class DB_con
{
    function __construct()
    {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbh = $con;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    /*
    public function usernameavailblty($uname) {
    $result =mysqli_query($this->dbh,"SELECT name FROM user WHERE name='$uname'");
    return $result;}
*/


    public function registration($uname, $uemail, $pasword)
    {
        $ret = mysqli_query($this->dbh, "INSERT INTO user(name,email,Password) values('$uname','$uemail','$pasword')");
        return $ret;
    }


    // public function signin($uname,$pasword)
    // {
    // $result=mysqli_query($this->dbh,"SELECT * from user where name='$uname' and password='$pasword'");
    // i

    // }
    public function check_login($username, $password)
    {

        $sql = mysqli_query($this->dbh, "SELECT * FROM user WHERE name = '$username' AND password = '$password'");
        $num = mysqli_num_rows($sql);

        if ($num > 0) {
            $row = $sql->fetch_array();
            return $row['iduser'];
        } else {
            return false;
        }
    }

    public function details($sql)
    {

        $query = $this->dbh->query($sql);

        $row = $query->fetch_array();

        return $row;
    }

    public function escape_string($value)
    {

        return $this->dbh->real_escape_string($value);
    }

    public function displaycontact()
    {
        $sql = "SELECT * FROM contact";
        $query = $this->dbh->query($sql);
        $data = array();
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    public function displaycontactupdate()
    {

        $sql = "SELECT * FROM contact WHERE id='" . $_GET['id'] . "'";
        $query = $this->dbh->query($sql);
        $data = array();
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    public function displayRecord()
    {
        $sql = "SELECT * FROM contact WHERE iduser ='" . $_SESSION['user'] . "'";
        $query = $this->dbh->query($sql);
        $data = array();
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }


    public function update($email, $phone, $adresse, $fname, $id,$iduser)
    {
        echo  $sql = "UPDATE contact SET email='$email',phone='$phone',adresse='$adresse',fullname='$fname' where id='$id' AND iduser='" . $iduser . "'";
        $query = $this->dbh->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteRecord($id, $Id)
    {
        $sql = "DELETE from contact where iduser =$id and id=$Id";
        $query = $this->dbh->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function save($email, $phone, $adresse, $fname,$id)
    {
        $ret = mysqli_query($this->dbh, "INSERT INTO contact(iduser,email,phone,adresse,fullname) values('$id','$email','$phone','$adresse','$fname')");
        return $ret;
    }
}
