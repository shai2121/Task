<?php 
session_start();
 if(isset( $_SESSION['loggedin'])){
 header("location: profile.php");
   exit;
}


echo '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .border{border-style: solid;
    border-radius: 20px
  

  }
  </style>
</head>
  <body>';

  if(isset( $_SESSION['error'])){
    echo ' <div class="alert alert-'.$_SESSION['error'].' '.
     'alert-dismissible fade show" role="alert"><strong>'.$_SESSION['TYPE'].
           '!</strong>' .$_SESSION['massage'] .
           '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div> ';
  }
     session_unset();
     session_destroy();

 echo ' <div class="container my-4">

  <div class="border p-4 px-5">
  <h2 class="text-primary text-center">Registration form</h2>
  
  <form method= "post" action="..\controler\datasubmitting.php" enctype="multipart/form-data" >


  <div class="form-group  ">
      <label for="name">First Name :</label>
      <input type="name" class="form-control" id="name"  placeholder="Enter fist name" name="fname">
    </div>

    <div class="form-group">
      <label for="name">Last Name :</label>
      <input type="name" class="form-control" id="name" placeholder="Enter last name" name="lname">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>

    <div class="form-group">
      <label for="contect">Phone No:</label>
      <input type="contect-no" class="form-control" titile ="contect no must be only 10digit." maxlength="10" pattern="[0-9]{10}" id="contect" placeholder="contect no" name="contect">
    </div>
    <div class="form-groups">
      <label for="pic">Pofile picture:</label>
      <input type="file"  id="pic" name="pic">
    </div>
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" id="pswd" placeholder="password" name="pswd" required>
    </div>
    <div class="form-group">
      <label for="cpswd"> conform Password:</label>
      <input type="password" class="form-control" id="cpswd" placeholder="password" name="cpswd" required>
    </div>

    <div class="form-group">
      <label for="desc">About:</label>
      <textarea type="text" class="form-control" id="desc"  name="desc"></textarea>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary m-2">Submit</button>
    <button type="Reset" class="btn btn-primary m-2">Reset</button>
    <a class="btn btn-primary m-2" href="login.php" role="button">Login</a>
  </form>
</div>
 
       
  
</div>
</body>
</html>';
?>
