<?php
    include 'dbconfig.php';
    
    if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE users SET firstName='".$_POST['firstName']."', lastName='".$_POST['lastName']."',
                                            contact='".$_POST['contact']."', email='".$_POST['email']."',
                                            department='".$_POST['department']."', jobPosition='".$_POST['jobPosition']."',
                                            jobDesc='".$_POST['jobDesc']."', role='".$_POST['role']."'
                                            WHERE id='".$_GET['id']."'");
                                            $success[] = 'Employee updated successfully.';
                                            // header('location: index.php');
    }
    $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
?>