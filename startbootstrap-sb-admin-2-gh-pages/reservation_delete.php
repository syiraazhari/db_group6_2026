<?php
include("includes/auth.php");
include("includes/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM reservation WHERE reservation_id = $id";
    mysqli_query($conn, $sql);
}

header("Location: reservation_management.php");
exit();
?>