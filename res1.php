<?php
include "connection.php";
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

if (isset($_GET['source'])) {
    $res_id = (int)$_GET['source'];
}
$sql = "SELECT * FROM reservations WHERE res_id = $res_id";
$result = mysqli_query($conn, $sql);
$no = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavola V1.1</title>
    <link rel="stylesheet" href="assets/res1.css">
    <link rel="icon" type="image/x-icon" href="assets/Images/logo.jpg">
</head>

<body>
    <div class="main">
        <div class="left">
            <img class="logo1" src="assets/Images/admin/logo1.jpg">
            <br>
            <h1>Tavola v1.1</h1><br>
            <?php
            echo "<h4> Admin - " . htmlspecialchars($email) . "</h4>";
            ?>
            <br>
            <br>
            <a href="admin.php"><button class="leftbuttona"><img src="assets/Images/admin/dashboard1.png" alt="D">Dashboard</button></a><br>
            <a href="resadmin.php"><button class="leftbutton"><img src="assets/Images/admin/reserved.png" alt="D">Reservations</button></a><br>
            <a href="Logout.php"><button class="leftbutton">Logout</button></a>
        </div>
        <div class="right">
            <h1>Seat Map</h1>
            <br><br>
            <div class="rowx">
                <div class="col">
                    <div class="table1">
                        <p>A1<br>4 Seats</p>
                    </div>
                    <div class="table1">
                        <p>A2<br>4 Seats</p>
                    </div>
                    <div class="table1">
                        <p>A3<br>4 Seats</p>
                    </div>
                </div>
                <div class="col">
                    <div class="table2">
                        <p>B1<br>6 Seats</p>
                    </div>
                    <div class="table2">
                        <p>B2<br>6 Seats</p>
                    </div>
                </div>
                <div class="col">
                    <div class="table3">
                        <p>C1<br>2 Seats</p>
                    </div>
                    <div class="table3">
                        <p>C2<br>2 Seats</p>
                    </div>
                    <div class="table3">
                        <p>C3<br>2 Seats</p>
                    </div>
                </div>
                <div class="col">
                    <div class="table1">
                        <p>D1<br>4 Seats</p>
                    </div>
                    <div class="table1">
                        <p>D2<br>4 Seats</p>
                    </div>
                    <div class="table1">
                        <p>D3<br>4 Seats</p>
                    </div>
                </div>
            </div>
            <div>
            </div>
            <div class="res_table">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Table ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($no > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['reservation_date']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['reservation_time']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['table_id']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No reservations found.</td></tr>";
                        }
                        ?>
                    </tbody>
            </div>
        </div>
    </div>
</body>

</html>