<?php
session_start();


class Connection
{
    public $HOSTNAME = 'localhost';
    public $USERNAME = 'root';
    public $PASSWORD = '';
    public $DB = 'oop_reg';
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB);
    }
}
class Register extends Connection
{
    public function register($name, $username, $email, $password, $confirmpsw)
    {
        $sql = "SELECT * FROM tb_user WHERE username='$username' OR email='$email'";
        $duplicate = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
            //Username or email ha already taken 
        } else {
            if ($password == $confirmpsw) {
                $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
                mysqli_query($this->conn, $query);
                return 1;
                //Registration successfull
            } else {
                return 100;
                //Password does not match
            }
        }
    }
}
class Login extends Connection
{
    public $id;
    public function login($usernameemail, $password)
    {

        $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username='$usernameemail' OR password = '$password'");
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if ($password == $row['password']) {
                $this->id = $row['id'];
                return 1;
                //LOGIN SUCCESSFULL
            } else {
                return 10;
                //wrong password
            }
        } else {
            return 100;
            // user not registered
        }
    }

    public function idUser()
    {
        return $this->id;
    }
}
class Select extends Connection{
    public function selectUserByid($id){
$result = mysqli_query($this->conn,"SELECT * FROM tb_user WHERE id='$id'");
return mysqli_fetch_assoc($result);
    }
}


?>