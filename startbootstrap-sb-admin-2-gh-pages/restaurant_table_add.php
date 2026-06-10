<?php
include("includes/auth.php");
include("includes/db.php");

if (isset($_POST['save'])) {
    $table_number = $_POST['table_number'];
    $capacity = $_POST['capacity'];
    $table_status = $_POST['table_status'];
    $location = $_POST['location'];

    $sql = "INSERT INTO restaurant_table
            (table_number, capacity, table_status, location)
            VALUES
            ('$table_number', '$capacity', '$table_status', '$location')";

    mysqli_query($conn, $sql);

    header("Location: restaurant_tables.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Table</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="p-5">

    <h1>Add Restaurant Table</h1>

    <form method="POST" action="">

        <div class="form-group">
            <label>Table Number</label>
            <input type="text" name="table_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Capacity</label>
            <input type="number" name="capacity" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Table Status</label>
            <select name="table_status" class="form-control" required>
                <option value="Available">Available</option>
                <option value="Reserved">Reserved</option>
                <option value="Unavailable">Unavailable</option>
            </select>
        </div>

        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <button type="submit" name="save" class="btn btn-success">Save Table</button>
        <a href="restaurant_tables.php" class="btn btn-secondary">Back</a>

    </form>

</body>
</html>