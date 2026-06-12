<?php
include("includes/auth.php");
include("includes/db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM staff WHERE staff_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $staff_name = $_POST['staff_name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE staff SET
            staff_name='$staff_name',
            phone_no='$phone_no',
            email='$email',
            username='$username',
            password='$password',
            role='$role'
            WHERE staff_id=$id";

    mysqli_query($conn, $sql);

    header("Location: staff_management.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Staff</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
body {
    background: linear-gradient(rgba(0,0,0,0.55),
                                rgba(0,0,0,0.55)),
                url('img/restaurant-bg.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

h1 {
    color: white;
    font-weight: bold;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.8);
}

label {
    color: white;
    font-weight: bold;
    text-shadow: 1px 1px 4px rgba(0,0,0,0.8);
}
</style>
</head>

<body class="p-5">

    <h1>Edit Staff</h1>

    <form method="POST" action="">

        <div class="form-group">
            <label>Staff Name</label>
            <input type="text" name="staff_name" class="form-control"
                   value="<?php echo $row['staff_name']; ?>" required>
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone_no" class="form-control"
                   value="<?php echo $row['phone_no']; ?>" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?php echo $row['email']; ?>">
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control"
                   value="<?php echo $row['username']; ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control"
                   value="<?php echo $row['password']; ?>" required>
        </div>

        <div class="form-group">
    <label>Role</label>
    <select name="role" class="form-control">
        <option value="Admin" <?php if($row['role']=="Admin") echo "selected"; ?>>Admin</option>
        <option value="Staff" <?php if($row['role']=="Staff") echo "selected"; ?>>Staff</option>
    </select>
</div>

        <button type="submit" name="update" class="btn btn-warning">Update Staff</button>
        <a href="staff_management.php" class="btn btn-secondary">Back</a>

    </form>

</body>
</html>