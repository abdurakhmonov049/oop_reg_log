<?php
session_start();

if (isset($_SESSION['id'])) {
    header('Location:index.php');
}

require('connect.php');
$register = new Register();

if (isset($_POST['submit'])) {
    $result = $register->register($_POST['name'], $_POST['user'], $_POST['email'], $_POST['psw'],$_POST['confirmpsw']);
if($result==1){
    echo "<script>alert('Registration successfull')</script>";
}
elseif($result == 10){
    echo "<script>alert('Username or email has Already taken')</script>";
}
elseif($result==100){
    echo "<script>alert('Password Does not match')</script>";
}
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <h2>Registration</h2>
    <form action="" method="post" autocomplete="off">
        <label for="">Name: </label>
        <input type="text" name="name">
        <br>
        <label for="">Username: </label>
        <input type="text" name="user">
        <br>
        <label for="">Email: </label>
        <input type="email" name="email">
        <br>
        <label for="">Password: </label>
        <input type="password" name="psw">
        <br>
        <label for="">Confirmpsw: </label>
        <input type="password" name="confirmpsw">
        <br>
        <button type="submit" name="submit">Register</button>
    </form>
    <br><br>
    <a href="login.php">Login</a>
</body>

</html>