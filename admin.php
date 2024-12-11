<?php
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  }
  else{
    echo '<script>
        window.alert("Access denied!");
        window.location.href = "index.php";
    </script>';
    exit();
  }
  include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavola V1.1</title>
    <link rel="stylesheet" href="assets/admin.css">
    <link rel="icon" type="image/x-icon" href="assets/Images/logo.jpg">
</head>
<body>
    <div class="main">
        <div class="left">
            <img class="logo1" src="assets/Images/admin/logo1.jpg">
            <br>
            <h1>Tavola v1.1</h1><br>
            <?php
                echo "<h4> Admin - ". htmlspecialchars($email) ."</h4>";   
            ?>
            <br>
            <br>
            <a href="admin.php"><button class="leftbuttona"><img src="assets/Images/admin/dashboard1.png" alt="D">Dashboard</button></a><br>
            <a href="resadmin.php"><button class="leftbutton"><img src="assets/Images/admin/reserved.png" alt="D">Reservations</button></a><br>
            <a href="Logout.php"><button class="leftbutton">Logout</button></a>
        </div>
        <div class="right">
            <h1>Dashboard</h1>
            <br><br>
            <div class="status">
                <div class="box">
                    <h4>Total Reservations</h4>
                    <br>
                    <?php
                        $sql1 = "select count(*) from reservations";
                        $result = mysqli_query($conn, $sql1);
                        if($result){
                            $row = mysqli_fetch_row($result);
                            echo '<h4>'. htmlspecialchars($row[0]) . '</h4>';
                        }
                        else{
                            echo '<h4>'. htmlspecialchars("N/A") . '</h4>';
                        }
                    ?>
                </div>
                <div class="box">
                    <h4>Total Reservations Today</h4>
                    <br>
                    <?php
                        $today = date("y-m-d");
                        $sql1 = "select count(distinct email) from reservations where reservation_date = '$today'";
                        $result = mysqli_query($conn, $sql1);
                        if($result){
                            $row = mysqli_fetch_row($result);
                            echo '<h4>'. htmlspecialchars($row[0]) . '</h4>';
                        }
                        else{
                            echo '<h4>'. htmlspecialchars("N/A") . '</h4>';
                        }
                    ?>
                </div>
                <div class="box">
                    <h4>Total Sign ups</h4>
                    <br>
                    <?php
                        $sql1 = "select count(*) from users";
                        $result = mysqli_query($conn, $sql1);
                        if($result){
                            $row = mysqli_fetch_row($result);
                            echo '<h4>'. htmlspecialchars($row[0]) . '</h4>';
                        }
                        else{
                            echo '<h4>'. htmlspecialchars("N/A") . '</h4>';
                        }
                    ?>
                </div>
            </div><br>
            <div class="status">
                <div class="box">
                    <h4>Total Listed Restaurents</h4>
                    <br>
                    <h4>4</h4>
                </div>
                <div class="box">
                    <h4>Total Tables reserved Today</h4>
                    <br>
                    <?php
                        $sql1 = "select count(*) from reservations where reservation_date = '$today'";
                        $result = mysqli_query($conn, $sql1);
                        if($result){
                            $row = mysqli_fetch_row($result);
                            echo '<h4>'. htmlspecialchars($row[0]) . '</h4>';
                        }
                        else{
                            echo '<h4>'. htmlspecialchars("N/A") . '</h4>';
                        }
                    ?>
                </div>
                <div class="box">
                    <h4>Admins</h4>
                    <br>
                    <?php
                        $sql1 = "select count(*) from admin";
                        $result = mysqli_query($conn, $sql1);
                        if($result){
                            $row = mysqli_fetch_row($result);
                            echo '<h4>'. htmlspecialchars($row[0]) . '</h4>';
                        }
                        else{
                            echo '<h4>'. htmlspecialchars("N/A") . '</h4>';
                        }
                    ?>
                </div>
            </div>
            <div class="copyright">
                <p>Tavola v1.1 2024</p>
                <br><br>
            </div>
        </div>
    </div>
</body>
</html>