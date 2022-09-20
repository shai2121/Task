<?php


class connection{

// function for connection to xammp server.
     function conn() {
        $servername='localhost';
        $username = 'root';
        $password = '';
        $database = 'db4';

        $conn = mysqli_connect($servername,$username,$password,$database);
        if ($conn){
            return $conn;
          }
     else {
      return $rel = mysqli_error($conn);
      }

    }

    //  function for registor  the data

  function registor($Fname,$Lname, $email, $contect, $desc, $pass,$folder){
        $conn=$this->conn();
        $sql = "SELECT 'email' FROM `persondetail` WHERE email='$email' ";
        $res = mysqli_query($conn,$sql);
      $num =mysqli_num_rows($res);
       if ( $num === 0){
        $hash = password_hash($pass, PASSWORD_DEFAULT);
         $sql="INSERT INTO `persondetail` (`fname`, `lname`, `email`, `contect`, `about`, `password`, `pic`)
         VALUES ('$Fname', ' $Lname', '$email', '$contect', '$desc ', '$hash' , '$folder')";
       
         $result = mysqli_query($conn,$sql);
            if (!$result)
           {
            echo "mysqli throwing an error <br>". mysqli_error($conn);
           }
         else
          {
            header("location: ../view/login.php"); 
          }
        }
        else{
          echo "you aleady have an account. ";
        }
  }
   
//  function for login into account

   function login($email,$pass)
   {
    $conn=$this->conn();
    $sql = "SELECT * FROM `persondetail` WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
  $num =mysqli_num_rows($result);
       if ( $num === 1){
         while( $detail = mysqli_fetch_assoc($result)){
           if (password_verify($pass, $detail['password'])){ 
           $login = true;

          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $detail['email'];
         $_SESSION['fname'] = $detail['fname'] ;
         $_SESSION['lname'] = $detail['lname'];
         $_SESSION['contect'] = $detail['contect'];
         $_SESSION['about'] = $detail['about'];
         $_SESSION['pic'] = $detail['pic'];
         $_SESSION['password'] =$pass;
         echo $_SESSION['email'];
         header("location: ../view\profile.php"); 
         }
         else {
          echo "Wrong password";
        }
      }
    }
     else {
    echo "Invalid Email id please Registor firstly.";
   
      }
   
   }

  //  function for delete the account.

   function delete(){
    $conn=$this->conn();
     $usermail=$_SESSION['email'];
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']=true){
    
    $sql = "DELETE FROM `persondetail` WHERE email = '$usermail'";
    $result = mysqli_query($conn,$sql);
    if ( $result){
      session_unset();
      session_destroy();
      header("location: ../view\login.php");  
    }
  }
 
   }
    // function for update:-
    function nupdate($finame,$laname,$cn,$fn){
    $conn=$this->conn();
     $usermail=$_SESSION['email'];
     $password= $_SESSION['password'];
      $sql="UPDATE `persondetail` SET `fname` = '$finame', `lname` = ' $laname', 
     `contect` = '$cn', `about` = '$fn' WHERE email = '$usermail'";
    $result = mysqli_query($conn,$sql);
    if ( $result){
      $call=$this->login($usermail,$password);
    }
  }
  // function for contect no update:-
  function dtupdate($fn,$cn){
    $conn=$this->conn();
    $usermail=$_SESSION['email'];
     $password= $_SESSION['password'];
    
   $sql = "UPDATE `persondetail` SET `$fn` = '$cn' WHERE email = '$usermail' ";
   $result = mysqli_query($conn,$sql);
   if ( $result){
     $call=$this->login($usermail,$password);
    }
    }
  // function for change password update:-
  function pupdate($fn,$cn){
   $conn=$this->conn();
   $usermail=$_SESSION['email'];
    $password= $_SESSION['password'];
   
  $sql = "UPDATE `persondetail` SET `$fn` = '$cn' WHERE email = '$usermail' ";
  $result = mysqli_query($conn,$sql);
  if ( $result){

    session_destroy();
      header("location: ../view\login.php");

  }
 }


}


?>