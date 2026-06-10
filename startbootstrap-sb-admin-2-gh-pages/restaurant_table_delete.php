<?php
include("includes/auth.php");
include("includes/db.php");

$id = $_GET['id'];

$sql = "DELETE FROM restaurant_table WHERE table_id = $id";

mysqli_query($conn, $sql);

header("Location: restaurant_tables.php");
exit();
?>