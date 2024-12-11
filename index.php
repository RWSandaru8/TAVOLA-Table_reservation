<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/login.css">
    <link rel="icon" type="image/x-icon" href="assets/Images/logo.jpg">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <img src="assets/images/login/logo1.jpg" alt="Logo">
            </div>
            <h2>Log in to your account</h2>
            <form action="index.php" method="post">
                <div class="input-group">
                    <input type="text" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <br><br>
                <a href="adminlogin.php" class="admin-btn">Admin Login</a>
            </form>
            <div class="login-footer">
                <a href="signup.php">Create a Account</a>
                <p>
                    <a href="#">Privacy policy</a> | <a href="#">Terms of use</a>
                </p>
                <a href="home.html" class="no">Continue without login</a>
            </div>
        </div>
    </div>
    <?php
    include "connection.php";
    //ini_set('display_errors', 0);

    if(isset($_POST['email'])  && isset($_POST['pass'])){
        $email = $_POST['email'];
        $password = $_POST['pass'];


        $sql = "select * from users where email = '$email' and password = '$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            $_SESSION['email'] = $email;
            echo '<script>
                window.alert("User Authentication successfull");
                window.location.href = "home.html";
            </script>';
            exit();
        }
        else{
            echo '<script>
                window.alert("User Authentication failed");
            </script>';
        }
    }
    ?>
</body>
</html>
