<?php

include 'dbconfig.php';

session_start();

if(isset($_SESSION['admin'])){
    header('location: dashboard/admin/index.php');
 }

 if(isset($_SESSION['user'])){
    header('location: dashboard/user/index.php');
 }


if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']);

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['role'] == 'admin'){

         $_SESSION['admin'] = $row['id'];
         header('location: dashboard/admin/index.php');

      }elseif($row['role'] == 'user'){

         $_SESSION['user'] = $row['id'];
         header('location: dashboard/user/index.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>