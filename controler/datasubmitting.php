
<?php
//  include'C:\xampp\htdocs\Task\model\db_connect.php';
 require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Task/model/db_connect.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){

    // logic for registration:-

    if(isset($_POST['submit'])){
        $Fname= $_POST['fname'];
      $Lname= $_POST['lname'];
       $email= $_POST['email'];
       $contect= $_POST['contect'];
       $pass= $_POST['pswd'];
       $desc= $_POST['desc'];
       $pic_name=$_FILES['pic']['name'];
         $tmp_loc=$_FILES['pic']['tmp_name'];
        $folder="../image/".$pic_name;
        move_uploaded_file($tmp_loc,$folder);
        $rum = new connection();
        $erp=$rum->registor($Fname,$Lname, $email, $contect, $desc, $pass,$folder);

    }

    // logic for login :-
    if(isset($_POST['logon'])){
       $email= $_POST['email'];
       $pass= $_POST['pswd'];
       
        $rum = new connection();
        $erp=$rum->login( $email,$pass);

    }

   // logic for delete :-
    if(isset($_POST['delete'])){
        session_start();
    $shai = new connection();
    $wem=$shai->delete();
    }


    // logic for logout :-
    if(isset($_POST['logout'])){
        session_start();
        session_unset();
        session_destroy();
        header("location: ../view\login.php"); 
    exit;
       
    }


    // logic for name update :-
    if(isset($_POST['update'])){
      $finame= $_POST['finame'];
      $laname= $_POST['laname'];
      $cn = $_POST['contect'];
      $fn = $_POST['desc'];
        session_start();
    $shai = new connection();
    $wem=$shai->nupdate($finame,$laname,$cn,$fn);
       
    }
     

  // logic for Password change :-
  if(isset($_POST['Cpassword'])){
    session_start();
    $fn = "password";
    $cn = $_POST['Pass'];
    $rn= $_POST['pswd'];
    
    if(($cn == $rn)){
      $hash = password_hash($cn, PASSWORD_DEFAULT);
      $shai = new connection();
       $wem=$shai->pupdate($fn,$hash);
    }
    else{
      echo "Both password do not match please re-enter the password "; 

    }
  }
  

     // logic for picture update :-
     if(isset($_POST['picture'])){
      $pic_name=$_FILES['picr']['name'];
      $tmp_loc=$_FILES['picr']['tmp_name'];
     $fold="../image/".$pic_name;
     move_uploaded_file($tmp_loc,$fold);
     $fn='pic';
     session_start();

     $shai = new connection();
    $wem=$shai->dtupdate($fn,$fold); 

     }
        


}

?>