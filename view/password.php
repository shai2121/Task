<?php
session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  
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
  .error{
    color:red;
    padding: 10px;
  }
  

</style>  

</head>
  <body>
    <?php
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
  ?>


  <div class="container">
  
 
  <form  class =" solid col-6 p-4 px-5" method= "post" action="..\controler\datasubmitting.php" name="password" >
  <h2 class = " text-primary  text-center font-weight-bold">Change Password</h2>

    <div class="form-group">
      <label for="pass">New password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter new password " name="Pass" >
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Confirm new password" name="pswd" >
    </div>
    
    <button type="submit" class="btn btn-primary " name= "Cpassword" >Update Password</button>
   
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 
<script >
   $(password).validate({
 rules:{  
         Pass: 'required',
         pswd:{
             required:true,
             equalTo:("#pass") 
            }},
        messages:{
         Pass: {required:'The new Password  is required for Password change',},
         pswd:{
             required:'The Confirm Password is required for Password change ',
             equalTo: 'Please enter the same value for password and confirm password', }
        }

      })
  
</script>

</body>
</html>