<?php 
include 'db.php';
session_start();
$user=$_POST['userid'];
$password=$_POST['password'];

$sql = "SELECT userId, password FROM user WHERE userId = '$user' ";
$result = mysqli_query($conn, $sql);

if($row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
    if ($password==$row['password'])
        echo ">brPassword OK!";
    else die("<h1>wrong password!</h1><br>" . "<a href='javascript:history.go(-1)'> Go Back</a>");
}else {die("<h1>User not exists!</h1><br>" . "<a href='javascript:history.go(-1)'> Go Back</a>");}

$_SESSION['userid'] = $user;
$url = "Location: personal.php";
header($url);

?>
