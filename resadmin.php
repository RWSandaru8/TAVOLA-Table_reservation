<?php
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    echo '<script>
        window.alert("Access denied!);
        window.location.href = "index.php";
    </script>';
    exit();
}

    include "connection.php";

    function dis_no($res_id, $conn){
        $sql1 = "select count(*) from reservations where res_id = $res_id;";
        $result = mysqli_query($conn, $sql1);
        if($result){
            $row = mysqli_fetch_row($result);
            echo '<h4>'. htmlspecialchars($row[0]) . '</h4>';
        }
        else{
            echo '<h4>'. htmlspecialchars("N/A") . '</h4>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavola V1.1</title>
    <link rel="stylesheet" href="assets/resadmin.css">
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
            <h1>Select the Hotel</h1>
            <br><br>
            <div class="status">
                <div class="box">
                    <h4>Pedlar's Inn Cafe</h4>
                    <br>
                    <?php
                        dis_no(1, $conn); 
                    ?>
                    <a href="res1.php?source=1"><button class="view">View</button></a>
                </div>
                <div class="box">
                    <h4>The Barn-Starbeans</h4>
                    <br>
                    <?php
                        dis_no(2, $conn); 
                    ?>
                    <a href="res1.php?source=2"><button class="view">View</button></a>
                </div>
                <div class="box">
                    <h4>Kenoli Restaurant</h4>
                    <br>
                    <?php
                        dis_no(3, $conn); 
                    ?>
                    <a href="res1.php?source=3"><button class="view">View</button></a>
                </div>
            </div><br>
            <div class="status">
                <div class="box">
                    <h4>Fox Kandy</h4>
                    <br>
                    <?php
                        dis_no(4, $conn); 
                    ?>
                    <a href="res1.php?source=4"><button class="view">View</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>