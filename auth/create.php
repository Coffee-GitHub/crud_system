<?php
    include_once 'dbconfig.php';

    session_start();

    if(!isset($_SESSION['admin'])){
        header('location: ../../index.php');
    }

    if(isset($_SESSION['user'])){
        header('location: ../user/index.php');
    }
    
    if(isset($_POST['save']))
    {	 
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $jobPosition = mysqli_real_escape_string($conn, $_POST['jobPosition']);
        $jobDesc = mysqli_real_escape_string($conn, $_POST['jobDesc']);
        $role = $_POST['role'];

        $checkdata = " SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn, $checkdata);

        if(mysqli_num_rows($result) > 0){

            $error[] = 'Email address already exist!';
      
        }
        else{
            if($password != $cpassword){
                $error[] = 'password not matched!';
             }
             else{
                $sql = "INSERT INTO users (firstName,lastName,contact,email,password,department,jobPosition,jobDesc,role)
                VALUES ('$firstName','$lastName','$contact','$email','$password','$department','$jobPosition','$jobDesc','$role')";
                mysqli_query($conn, $sql);

                $sql = "INSERT INTO role (roleType)
                VALUES ('$role')";
                mysqli_query($conn, $sql);

                $success[] = 'Employee added successfully.';
            }
        }
        mysqli_close($conn);
    }
?>