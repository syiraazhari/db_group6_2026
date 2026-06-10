<?php
include("includes/auth.php");
include("includes/db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM restaurant_table WHERE table_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $table_number = $_POST['table_number'];
    $capacity = $_POST['capacity'];
    $table_status = $_POST['table_status'];
    $location = $_POST['location'];

    $sql = "UPDATE restaurant_table SET
            table_number='$table_number',
            capacity='$capacity',
            table_status='$table_status',
            location='$location'
            WHERE table_id=$id";

    mysqli_query($conn, $sql);

    header("Location: restaurant_tables.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Table</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="p-5">

    <h1>Edit Restaurant Table</h1>

    <form method="POST" action="">

        <div class="form-group">
            <label>Table Number</label>
            <input type="text" name="table_number" class="form-control"
                   value="<?php echo $row['table_number']; ?>" required>
        </div>

        <div class="form-group">
            <label>Capacity</label>
            <input type="number" name="capacity" class="form-control"
                   value="<?php echo $row['capacity']; ?>" required>
        </div>

        <div class="form-group">
            <label>Table Status</label>
            <select name="table_status" class="form-control" required>
                <option value="Available" <?php if($row['table_status']=="Available") echo "selected"; ?>>Available</option>
                <option value="Reserved" <?php if($row['table_status']=="Reserved") echo "selected"; ?>>Reserved</option>
                <option value="Unavailable" <?php if($row['table_status']=="Unavailable") echo "selected"; ?>>Unavailable</option>
            </select>
        </div>

        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control"
                   value="<?php echo $row['location']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-warning">Update Table</button>
        <a href="restaurant_tables.php" class="btn btn-secondary">Back</a>

    </form>

</body>
</html>