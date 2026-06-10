<?php
$conn = mysqli_connect("localhost", "root", "", "restaurant_booking");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>