<?php 
session_start();
 if(isset( $_SESSION['loggedin'])){
 header("location: profile.php");
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
  .border{border-style: solid;
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
  }
     session_unset();
     session_destroy();
     ?>
  <div class="container my-4">

  <div class="border p-4 px-5">
  <h2 class="text-primary text-center">Registration form</h2>
  
  <form method= "post" action="..\controler\datasubmitting.php" enctype="multipart/form-data" name ="signup" >


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
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
    </div>

    <div class="form-group">
      <label for="contect">Phone No:</label>
      <input type="contect-no" class="form-control" titile ="contect no must be only 10digit."  placeholder="contect no" name="contect">
    </div>
    <div class="form-groups">
      <label for="pic">Pofile picture:</label>
      <input type="file"  id="pic" name="pic">
    </div>
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" id="pswd" placeholder="password" name="pswd" >
    </div>
    <div class="form-group">
      <label for="cpswd"> conform Password:</label>
      <input type="password" class="form-control" id="cpswd" placeholder="password" name="cpswd">
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 
<script >
  $(signup).validate({
 rules:{
         email:
           {
            required:true,
            email:true },
           
         pswd: 'required',
         cpswd:{
             required:true,
             equalTo:pswd },

         contect:{
            // phoneUS: true,
              digits:true,
             minlength:10,
            maxlength:10 }
         
        },
        messages:{
         email:
           {
            required:'The email Id is required for signup',
            email:'You must enter a velid email address', },
           
         pswd: {required:'The Password  is required for signup',},
         cpswd:{
             required:'The Confirm Password is required for signup',
             equalTo: 'Please enter the same value for password and confirm password', },

         contect:{
            // phoneUS: true,
              digits:'Please enter only digits for phone no.',
             minlength:'Please enter exactly 10 digits for phone no.',
            maxlength:'Please enter  exactly 10 digits for phone no.', }
         
        }
      })
</script>

</body>
</html> 
   
     