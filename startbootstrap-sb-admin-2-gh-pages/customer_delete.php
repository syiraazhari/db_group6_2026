<?php
include("includes/auth.php");
include("includes/db.php");

$id = $_GET['id'];

$sql = "DELETE FROM customer WHERE customer_id = $id";

mysqli_query($conn, $sql);

header("Location: customer_management.php");
exit();
?>