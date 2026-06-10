<?php
include("includes/auth.php");
include("includes/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get table_id before deleting
    $getReservation = "SELECT table_id FROM reservation WHERE reservation_id = $id";
    $result = mysqli_query($conn, $getReservation);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $table_id = $row['table_id'];

        // Delete payment first because payment depends on reservation
        $deletePayment = "DELETE FROM payment WHERE reservation_id = $id";
        mysqli_query($conn, $deletePayment);

        // Delete reservation
        $deleteReservation = "DELETE FROM reservation WHERE reservation_id = $id";
        mysqli_query($conn, $deleteReservation);

        // Make table available again
        $updateTable = "UPDATE restaurant_table 
                        SET table_status = 'Available' 
                        WHERE table_id = $table_id";
        mysqli_query($conn, $updateTable);
    }
}

header("Location: reservation_management.php");
exit();
?>