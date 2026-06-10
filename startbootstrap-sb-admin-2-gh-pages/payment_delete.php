<?php
include("includes/auth.php");
include("includes/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM payment WHERE payment_id = $id";
    mysqli_query($conn, $sql);
}

header("Location: payment_management.php");
exit();
?>