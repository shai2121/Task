<?php
session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
else {

}

?>
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
  <div class="container my-4">
    <div  class="border p-4 px-5">
  <h2 class = "text-center text-primary font-weight-bold">Update Data</h2>
  
  <form method= "post" action="..\controler\datasubmitting.php" >
   <div class="form-group">
      <label for="name"> Change First Name :</label>
      <input type="name" class="form-control" value=  "<?php echo $_SESSION['fname'];?>" id="name" placeholder="Enter fist name" name="finame">
    </div>

    <div class="form-group">
      <label for="name">Change Last Name :</label>
      <input type="name" class="form-control" value="<?php echo $_SESSION['lname'];?>" id="name" placeholder="Enter last name" name="laname">
    </div>
    
    <div class="form-group">
      <label for="contect">Update contact no:</label>
      <input type="contect-no" class="form-control" id="contect" value= "<?php echo $_SESSION['contect'] ;?>" placeholder="contect no" name="contect">
    </div>
   
    <div class="form-group">
      <label for="desc">Write some thing new about:- </label>
      <textarea type="text" class="form-control" id="desc"  name="desc"><?php echo $_SESSION['about'] ;?></textarea>
    </div>
    
    <button type="submit" name="update" class="btn btn-primary">change</button>
  </form>

         <!-- edit profile pic -->
  <form method= "post" action="..\controler\datasubmitting.php" enctype="multipart/form-data" >
  <div class="form-group">
      <label for="pic">Change Pofile picture:</label>
      <input type="file"  id="pic" name="picr">
    </div>
    
    <button type="submit" name="picture" class="btn btn-primary">change</button>
  </form>
  </div> 
</div>
</html>
