<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
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
  <br><div class='col-md-4 text-left'>
  <a name="" id="" class="btn btn-primary" href='javascript:history.go(-1)' role="button">pervious page</a>
  </div>
  
  
     <br> <div class="container">
  <h2>User Login</h2>
  <form action="logInHandler.php" class="was-validated" method="post">
  <br><a href="signUp.php">Click to sign up</a><br>
    <div class="form-group">
      <label for="uname">UserID:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter userID" name="userid" required>
      <div class="valid-feedback">Okey.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
      <div class="valid-feedback">Okey.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div><br>
    
    <button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
    <button type="reset" class="btn btn-danger" value="Reset">Reset</button>
  </form>
</div>
   
  </body>
</html>