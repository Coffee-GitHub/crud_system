<?php
    include '../../auth/update.php';

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
    <form method="POST" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>">
        <?php
            if(isset($success)){
                foreach($success as $success){
                    echo '<span class="error-msg">'.$success.'</span><br>';
                };
            }
        ?> 
		<input type="text" name="firstName" placeholder="Enter your first name" value="<?php echo $row["firstName"]; ?>">
		<br>
        <input type="text" name="lastName" placeholder="Enter your last name" value="<?php echo $row["lastName"]; ?>">
		<br>
        <input type="text" name="contact" placeholder="Enter your contact number" value="<?php echo $row["contact"]; ?>">
		<br>
        <input type="email" name="email" placeholder="Enter your email address" value="<?php echo $row["email"]; ?>" >
		<br>
        <select name="department">
            <option value="<?php echo $row["department"]; ?>"><?php echo $row["department"]; ?></option>
            <option value="department1">department1</option>
            <option value="department2">department2</option>
            <option value="department3">department3</option>
            <option value="department4">department4</option>
        </select>
		<br>
        <select name="jobPosition">
            <option value="<?php echo $row["jobPosition"]; ?>"><?php echo $row["jobPosition"]; ?></option>
            <option value="jobPosition1">jobPosition1</option>
            <option value="jobPosition2">jobPosition2</option>
            <option value="jobPosition3">jobPosition3</option>
        </select>
		<br>
        <input type="text" name="jobDesc" placeholder="Enter your job description" value="<?php echo $row["jobDesc"]; ?>">
		<br>
        <select name="role">
            <option value="<?php echo $row["role"]; ?>"><?php echo $row["role"]; ?></option>
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
		<br><br>
        <a href="index.php">Cancel</a>
        <input type="submit"  class="form-btn update" value="Update">
	</form>
</body>
</html>