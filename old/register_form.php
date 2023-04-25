<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location: index.php');
 }

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Email address already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, contactNumber, email, password, user_type) VALUES('$name',$number,'$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         $success[] = 'Employee added successfully.';
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add new employee</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Add new employee</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      }

      if(isset($success)){
         foreach($success as $success){
            echo '<span class="error-msg">'.$success.'</span>';
         };
      }
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="text" name="number" required placeholder="Enter your contact number"
            maxlength="15" pattern="^\d*(\.\d{0,2})?$">
      <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"
            maxlength="100" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <a href="admin_page.php" class="btn">Cancel</a>
      <!-- <p>already have an account? <a href="index.php">login now</a></p> -->
   </form>

</div>


<?php
        $select = " SELECT * FROM user_form ";
        $result = mysqli_query($conn, $select);
    ?>
    <table  style="width: 50%; border-collapse: collapse; text-align: left; margin: auto;">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Role No</th>
        </tr>
    <?php
        if (mysqli_num_rows($result) > 0) {
        $sn=1;
        while($data = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $data['name']; ?> </td>
            <td><?php echo $data['contactNumber']; ?> </td>
            <td><?php echo $data['email']; ?> </td>
            <td><?php echo $data['user_type']; ?> </td>
        <tr>
    <?php
        $sn++;}} else { ?>
        <tr>
            <td>No data found</td>
        </tr>
    <?php } ?>
    </table>

</body>
</html>