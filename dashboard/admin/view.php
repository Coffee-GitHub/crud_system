<?php
    include '../../auth/dbconfig.php';

    session_start();

    if(!isset($_SESSION['admin'])){
        header('location: ../../index.php');
    }

    if(isset($_SESSION['user'])){
        header('location: ../user/index.php');
    }
    
    $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new employee</title>
    <link rel="stylesheet" href="../../style/css/style.css">
</head>
<body>
    <form method="POST" action="../../auth/create.php">
		<input type="text" name="firstName" placeholder="Enter your first name" value="<?php echo $row["firstName"]; ?>" readonly>
		<br>
        <input type="text" name="lastName" placeholder="Enter your last name" value="<?php echo $row["lastName"]; ?>" readonly>
		<br>
        <input type="text" name="contact" placeholder="Enter your contact number" value="<?php echo $row["contact"]; ?>" readonly>
		<br>
        <input type="email" name="email" placeholder="Enter your email address" value="<?php echo $row["email"]; ?>" readonly>
		<br>
        <input type="text" name="department" placeholder="Enter your department" value="<?php echo $row["department"]; ?>" readonly>
		<br>
        <input type="text" name="jobPosition" placeholder="Enter your job position" value="<?php echo $row["jobPosition"]; ?>" readonly>
		<br>
        <input type="text" name="jobDesc" placeholder="Enter your job description" value="<?php echo $row["jobDesc"]; ?>" readonly>
		<br>
        <input type="text" name="role" placeholder="Enter your role" value="<?php echo $row["role"]; ?>" readonly>
		<br><br>
        <a href="index.php">Back</a>
        <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
	</form>
</body>
</html>