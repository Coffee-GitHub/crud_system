<?php
@include_once 'config.php';
$sql = "DELETE FROM user_form WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header('location: admin_page.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>