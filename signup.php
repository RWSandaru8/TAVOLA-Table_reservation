<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="icon" type="image/x-icon" href="assets/Images/logo.jpg">
    <link rel="stylesheet" href="assets/signup.css">
</head>
<body>
    <div class="signup-container">
        <div class="signup-box">
            <h2>Sign Up</h2>
            <p>Please fill in this form to create an account!</p>
            <form action="signup.php" method="post">
                <div class="input-group">
                    <input type="text" name="fname" placeholder="First Name" required>
                    <input type="text" name="lname" placeholder="Last Name">
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="pass" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <input type="password" name="cpass" placeholder="Confirm Password" required>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a>.</label>
                </div>
                <button type="submit" class="signup-btn">Sign Up</button>
            </form>
            <p class="login-link">Already have an account? <a href="#">Login here.</a></p>
        </div>
    </div>
    <br>

    <?php
    include "connection.php";
    //ini_set('display_errors', 0);

    if(isset($_POST['email'])  && isset($_POST['pass'])){
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $passwordr = $_POST['cpass'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        if($password != $passwordr){
            echo '<script>
                window.alert("Password and Password confirmation does not match!");
                </script>';
        }
        else{
            $sql = "insert into users values ('$email', '$password', '$fname', '$lname')";

            if(mysqli_query($conn, $sql)){
                echo '<script>
                    window.alert("You will now bw redirected to the login page");
                    window.location.href = "index.php";
                </script>';
            }
            else{
                echo '<script>
                    window.alert("Something went wrong:(");
                </script>';
            }
        }
    }
    ?>
</body>
</html>
