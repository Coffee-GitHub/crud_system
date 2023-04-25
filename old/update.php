<?php
// Include database connection file
require_once "config.php";
session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:index.php');
}

if(!isset($_SESSION['admin_name'])){
    header('location: user_page.php');
 }

 if(isset($_SESSION['admin_name']) == ""){
    header('location:index.php');
 }
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE user_form SET name='".$_POST['name']."', contactNumber='".$_POST['number']."',
                                        email='".$_POST['email']."', user_type='".$_POST['user_type']."' 
                                        WHERE id='".$_POST['id']."'");
                                        header('location:admin_page.php');
}
$result = mysqli_query($conn,"SELECT * FROM user_form WHERE id='" . $_GET['id'] . "'");
$data= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="form-container">
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
<h3>Update Information</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      }
      ?>
    <input type="text" name="name" required placeholder="enter your name" value="<?php echo $data['name']; ?>">
      <input type="text" name="number" required placeholder="Enter your contact number"
            maxlength="15" pattern="^\d*(\.\d{0,2})?$" value="<?php echo $data['contactNumber']; ?>">
      <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"
            maxlength="100" required placeholder="enter your email" value="<?php echo $data['email']; ?>">
      <select class="update-role" name="user_type">
         <option><?php echo $data['user_type']; ?></option>
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
<input type="hidden" name="id" value="<?php echo $data["id"]; ?>"/>
<input type="submit"  class="form-btn update" value="Update">
<a href="admin_page.php" class="btn btn-default">Cancel</a>
</form>
</div>
</body>
</html>