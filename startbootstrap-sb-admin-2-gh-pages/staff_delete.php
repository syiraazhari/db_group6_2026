<?php
include("includes/auth.php");
include("includes/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM staff WHERE staff_id = $id";
    mysqli_query($conn, $sql);
}

header("Location: staff_management.php");
exit();
?>