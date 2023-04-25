<?php
    include 'auth/login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/css/style.css">
</head>
<body>
<div class="container">
<div class="login">
    <div class="login-logo">
        <img src="assets/logo/logo.jpg" alt="">login
    </div>
    <form method="POST" action="">
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span><br>';
                };
            };
        ?>
        <input type="email" name="email" placeholder="Enter your email adress">
		<br>
        <input type="password" name="password" placeholder="Enter your password">
        <div class="login-btn">
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
</div>
</div>
</body>
</html>