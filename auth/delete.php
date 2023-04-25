<?php
    include_once 'dbconfig.php';

    $sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($conn, $sql)) {
        header('location: ../dashboard/admin/index.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>