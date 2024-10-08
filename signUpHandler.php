

  

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </head>
  <body>
  
  
<div class="container">
<div class="jumbotron">
<?php
    include 'db.php';

    $name = $_POST['username'];
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

  if (strlen($password) < 5 || strlen($password) > 12) {	// check length
	die ("Password < 5 or > 12 characters");
	exit();
}
  if (isset($userid) && isset($name) && isset($password) && isset($confirm)) {
	$sql= "insert into user(userName,userId,password,email,phone,address) values ('$name','$userid','$password','$email','$phone','$address')";
	if (mysqli_query($conn, $sql)) { 
		echo "<p>The User added  successfully !<p><br>\n";
	} 	else echo"<p>The query could not be executed!<p><br>\n" . mysqli_error($conn);
}
   ?>
    
    <a type="submit"  class="btn btn-primary btn-block"   role="button" href="carsales.php"> Back to Home Page </a>
  </p>
</div>

</div>


    
  </body>
</html>