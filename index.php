
<?php
session_start();
if(isset( $_SESSION['loggedin'])){
  header("location: view/profile.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>User Profile </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <style>
   
  .container {
    padding: 20px 120px;
   
    
  }.xtz{
    padding: 0px 0px 10px;

  }
 
  
   .bg-1 {
    
    background: #6d99c0;
     color:#000000; 
    
  }
 
 
  .bg-1 p {font-style: italic;}
  li{
    color: #000;
  }
  </style>
</head>
  <body>
  <div class="main">
<div class="bg-1">
  <div class="container">
    <h3 class="text-center text-primary font-weight-bold">PHP HOME</h3>
    <p class="text-center">Welcome to PHP data manipulation by CRUD app.<br> In which i have used Create, Read, Update, and Delete function <br>By using OOPS and MVC(model,view and controler).</p>
    <ul class="list-group">
      <li class="list-group-item text-center font-weight-bold">If you are new User then click on below register button for Registration. </li>
      <li class="list-group-item text-center"><a class="btn btn-primary text-center" href="view\signup.php" role="button" style= padding: 20px ;>Register</a></li>
      
      <li class="list-group-item text-center font-weight-bold ">IF you have already un account then click below for log in</li>
      <li class="list-group-item text-center"><a class="btn btn-primary text-center" href="view\login.php" role="button">Login</a></li>
    
 

  </ul>
  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>

  


  