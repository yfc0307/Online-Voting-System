<?php
include 'db.php';
session_start();
$k=$_SESSION['userid'];
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Personal Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
       <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
          <a class="navbar-brand" href="carsales.php">E-Voting</a>
          <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

              <li class="nav-item active"><a class="nav-link" href="">Home <span class="sr-only">(current)</span></a></li>

              

              
              <?php
                if($k != null){
                  echo "<li class='nav-item'><a class='nav-link' href=personal.php>Personal Information</a></li>";
                  
              }?>


              <li class="nav-item"></li>

            </ul>
            <?php if( isset($_SESSION['userid']) && !empty($_SESSION['userid'])){?>
                <ul class='navbar-nav navbar-right'><li class='nav-item'><a class='nav-link' href=logout.php>Log Out</a></li></ul>
               
            <?php }else{ ?>
              <ul class='navbar-nav navbar-right'>
                <li class='nav-item'><a href='signUp.php' class='nav-link'> Sign Up</a></li>
                <li class='nav-item'><a href='logIn.php' class='nav-link'>Login</a></li>
                </ul>
                <?php } ?>
            
            

          </div>
        </nav>
        <!--navbar-->

        
    <!--personalinfo-->
    <?php
include 'db.php';
session_start();
$user=$_SESSION['userid'];
$sql = "select * from user where userId ='$user'";
    $result = mysqli_query($conn,$sql);
    echo "<h1><li class='list-group-item active'>Personal Information</li></h1>";
    $numOfRecord = mysqli_num_rows($result);
            if($numOfRecord <= 0) {
        echo "<tr><td>NO data found</td> </tr>";
            } else {
        while ($row = mysqli_fetch_array($result)) {
          echo'<ul class="list-group">';
          echo "<b>Name: </b>" ."<li class='list-group-item col-md-6'>". $row["userName"] ."</li>". "<br>";
          echo "<b>User ID: </b>" ."<li class='list-group-item col-md-6'>". $row["userId"] ."</li>". "<br>";
          echo "<b>E-mail: </b>" . "<li class='list-group-item col-md-6'>". $row["email"] ."</li>" . "<br>";
          echo "<b>Phone Number: </b>" . "<li class='list-group-item col-md-6'>". $row["phone"] ."</li>" . "<br>";
          echo "<b>Address: </b>" . "<li class='list-group-item col-md-6'>". $row["address"] ."</li>" . "<br>";
          echo'</ul>';
            
            echo "<u><a href=editper.php?userName=".$row["userName"].">Edit your information</a><br>";
           
}
}
?>

      

  </body>
</html>


