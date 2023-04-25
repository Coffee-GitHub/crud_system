<?php

@include 'config.php';

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
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="container">

        <div class="content">
            <h3>hi, <span>admin</span></h3>
            <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <p>this is an admin page</p>
            <a href="register_form.php" class="btn">Add new</a>
            <a href="logout.php" class="btn">logout</a>
        </div>
    </div>
    <?php
        $select = " SELECT * FROM user_form WHERE user_type='user'";
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
            <td><a href="update.php?id=<?php echo $data["id"]; ?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $data["id"]; ?>">Delete</a></td>
        <tr>
    <?php
        $sn++;}} else { ?>
        <tr>
            <td>No data found</td>
        </tr>
    <?php } ?>
    </table>
    <br><br><br>

</body>

</html>