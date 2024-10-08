<?php
session_start();
include 'db.php';
$k = $_SESSION['userid'];
?>

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



  <br><br><br><?php 
  
    include 'db.php';
	if (isset($_POST['edit'])) {
      $name =$_POST['name'];
      $password=$_POST['password'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $address=$_POST['address'];
      
      $sql = "update user set userName='$name',password='$password',email='$email',phone='$phone',address='$address' where userId='$k'";
      $result = mysqli_query($conn,$sql);
      if(!$result){
    die("Database access failed" .mysqli_error($conn));
      }
        else{
          echo "Edit your information success!";
          echo  "<a href=personal.php>Back to edit page</a>";
            
  ?>
   <?php   }
    }else {?>
    <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="post">
   Name:<input class="form-control" type="text" name="name">
   <div class="form-row">
    <div class="form-group col-md-6">
    Pasword:<input class="form-control" type="password" name="password">
    </div>
      <div class="form-group col-md-6">
      Confirm password: <input class="form-control" type="password" name="confirm">
      </div>
   </div>
   <div class="form-row">
      <div class="form-group col-md-8">
      Email:<input class="form-control" type="email" name="email">
      </div>
          <div class="form-group col-md-4">
          Phone:<input class="form-control" type="phone" name="phone"><br>
          </div>
   </div>
   Address:<input class="form-control" type="text" name="address"><br>

   <input type="submit" name="edit" value="Submit Edit" ><br>
   <br><u><a name=""id=""class="btn btn-primary"href="javascript:history.go(-1)" role="button">pervious page</a></u> 
   
  
 </form>
    </div>
   

<?php }?>

    
  </body>
</html>