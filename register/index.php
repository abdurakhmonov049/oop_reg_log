<?php 
session_start();
require('connect.php');
$select = new Select();
if(isset($_SESSION['id'])){
    $user = $select->selectUserByid($_SESSION['id']);
}
else{
    header('Location:login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome </title>
</head>
<body>
    <h2>Welcome,<?php echo $user['name']; ?></h2>

    <a href="logout.php">Logout</a>

</body>
</html>