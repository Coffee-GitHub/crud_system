<?php
    include '../../auth/create.php';
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
    <form method="POST" action="">   
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span><br>';
                };
            }

            if(isset($success)){
                foreach($success as $success){
                    echo '<span class="error-msg">'.$success.'</span><br>';
                };
            }
        ?>
		<input type="text" name="firstName" placeholder="Enter your first name">
		<br>
        <input type="text" name="lastName" placeholder="Enter your last name">
		<br>
        <input type="text" name="contact" placeholder="Enter your contact number">
		<br>
        <input type="email" name="email" placeholder="Enter your email address">
		<br>
        <input type="password" name="password" placeholder="Create password">
		<br>
        <input type="password" name="cpassword" placeholder="Confirm password">
		<br>
        <select name="department">
            <option value="">Select department</option>
            <option value="department1">department1</option>
            <option value="department2">department2</option>
            <option value="department3">department3</option>
            <option value="department4">department4</option>
        </select>
		<br>
        <select name="jobPosition">
            <option value="">Select position</option>
            <option value="jobPosition1">jobPosition1</option>
            <option value="jobPosition2">jobPosition2</option>
            <option value="jobPosition3">jobPosition3</option>
        </select>
		<br>
        <input type="text" name="jobDesc" placeholder="Enter your job description">
		<br>
        <select name="role">
            <option value="">Select role</option>
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
		<br><br>
        <a href="index.php">Cancel</a>
        <input type="submit" name="save" value="submit">
	</form>
</body>
</html>