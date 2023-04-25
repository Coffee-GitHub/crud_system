<?php
    session_start();

    if(!isset($_SESSION['admin'])){
        header('location: ../../index.php');
    }

    if(isset($_SESSION['user'])){
        header('location: ../user/index.php');
    }

    

    include '../../auth/dbconfig.php';
    $result = mysqli_query($conn,"SELECT *, CONCAT(lastName, ' ', firstName) AS fullName FROM users WHERE role='user'");
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
<div class="container">
<div class="content">
    <div class="welcome">
    <h1>Welcome to admin page <span><?php echo $_SESSION['admin']; ?></span>!</h1>
    </div>
    <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table>
        
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Email address</th>
            <th>Contact number</th>
            <th>Department</th>
            <th>Job position</th>
            <th>role</th>
            <th>Action</th>
        </tr>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td>Emp-00<?php echo $row["id"]; ?></td>
            <td><?php echo $row["fullName"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["contact"]; ?></td>
            <td><?php echo $row["department"]; ?></td>
            <td><?php echo $row["jobPosition"]; ?></td>
            <td><?php echo $row["role"]; ?></td>
            <td>
                <a href="view.php?id=<?php echo $row["id"]; ?>">View</a>
                <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                <a href="../../auth/delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
        </table>
        <div class="add-btn">
        <?php
            }
            else{
                echo "No result found";
            }
        ?>
            <a href="create_new.php">Create</a>
            <a href="../../auth/logout.php">logout</a>
        </div>
</div>
</div>
</body>
</html>