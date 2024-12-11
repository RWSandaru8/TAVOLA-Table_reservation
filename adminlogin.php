<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            <form action="adminlogin.php" method="post">
                <div class="input-group">
                    <input type="text" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>

    <?php
    include "connection.php";
    //ini_set('display_errors', 0);

    if(isset($_POST['email'])  && isset($_POST['pass'])){
        $email = $_POST['email'];
        $password = $_POST['pass'];


        $sql = "select * from admin where email = '$email' and password = '$password';";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            $_SESSION['email'] = $email;
            echo '<script>
                window.alert("admin Authentication successfull");
                window.location.href = "admin.php";
            </script>';
            exit();
        }
        else{
            echo '<script>
                window.alert("User Authentication failed");
                window.location.href = "adminlogin.php"
            </script>';
        }
    }
    ?>
</body>
</html>
