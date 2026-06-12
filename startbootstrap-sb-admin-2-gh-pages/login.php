<?php
session_start();
include("includes/db.php");

$error = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ADMIN LOGIN
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";

        header("Location: dashboard.php");
        exit();
    }

    // STAFF LOGIN
    $sql = "SELECT * FROM staff WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "staff";

        header("Location: dashboard.php");
        exit();
    }

    // CUSTOMER LOGIN
    $sql = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "customer";

        header("Location: customer_homepage/book-a-table.php");
        exit();
    }

    $error = "Invalid username or password";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="login-bg">

    <style>
        .login-bg {
    background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
                url("img/restaurant-bg.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;

    display: flex;
    justify-content: center;
    align-items: center;
}

    .login-card {
    width: 620px;
    height: 720px;
    border-radius: 15px;
    background: rgba(255,255,255,0.96);
    box-shadow: 0 0 30px rgba(0,0,0,0.45);
}

        .btn-primary {
            background-color: #c89b3c;
            border-color: #c89b3c;
        }

        .btn-primary:hover {
            background-color: #a77f2b;
            border-color: #a77f2b;
        }
.btn-user {
    height: 55px !important;
    font-size: 18px !important;
    font-weight: 600;
}
        .form-control-user {
    border: 1px solid #d4af37;
    height: 55px !important;
    font-size: 16px;
}

        .gold-text {
    color: #d4af37;
    letter-spacing: 8px;
    font-size: 18px;
    font-weight: 700;
}

h2 {
    font-size: 48px;
    font-weight: 700;
}

form.user {
    width: 80%;
    margin: auto;
}    
.text-center {
    text-align: center;
}

   hr {
    width: 80%;
} </style>

    <div class="card border-0 shadow-lg login-card">
            <div class="card-body p-5 d-flex flex-column justify-content-center" style="height:720px;">

              <div class="text-center mb-4">
    <img src="img/logo-top.png"
         alt="Restaurant Logo"
         style="width:180px; margin-bottom:10px;">

    <h2 class="text-gray-900 mb-1"
        style="font-size:42px;font-family:Georgia,serif;letter-spacing:5px;">
        RESTAURANT
    </h2>

    <div class="gold-text">
        BOOKING SYSTEM
    </div>
</div>

                <div class="text-center">
                    <h1 class="text-gray-900 mb-5" style="font-size:32px;">
    Welcome Back!
</h1>
                </div>

                <form class="user" method="POST" action="">
                   <div class="form-group position-relative">

    <i class="fas fa-user"
       style="
       position:absolute;
       left:20px;
       top:20px;
       color:#c89b3c;
       z-index:10;">
    </i>

    <input type="text"
           class="form-control form-control-user"
           name="username"
           placeholder="Enter Username"
           style="padding-left:55px;">

</div>

                    <div class="form-group position-relative">

    <i class="fas fa-lock"
       style="
       position:absolute;
       left:20px;
       top:20px;
       color:#c89b3c;
       z-index:10;">
    </i>

    <input type="password"
           class="form-control form-control-user"
           name="password"
           placeholder="Password"
           style="padding-left:55px;">

</div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>

                    <p style="color:red; text-align:center;"><?php echo $error; ?></p>
                </form>

                <hr>

                <div class="text-center">
                    <a class="small" style="color:#c89b3c;" href="forgot-password.html">Forgot Password?</a>
                </div>

                <div class="text-center">
                    <a class="small" style="color:#c89b3c;" href="customer_homepage/customer_register.php">Create an Account!</a>
                </div>

            </div>
        </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>