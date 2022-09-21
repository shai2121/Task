<?php
session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}



echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .container{
    border-radius: 30px;
    padding: 20px ;
    margin-top:70px;
    margin-left:370px
  }
  .solid {border-style: solid;
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
      $_SESSION['error']=NULL;
  }


  echo '<div class="container">
  
 
  <form  class =" solid col-4 p-4 px-5" method= "post" action="..\controler\datasubmitting.php" >
  <h2 class = " text-primary  text-center font-weight-bold">Change Password</h2>

    <div class="form-group">
      <label for="pass">New password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter new password " name="Pass" required>
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Confirm new password" name="pswd" required>
    </div>
    
    <button type="submit" class="btn btn-primary " name= "Cpassword" >Update Password</button>
   
  </form>
</div>
</body>
</html>';

?>