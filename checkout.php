<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Checkout Tavola V1.1</title>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="assets/checkout.css">
  <link rel="icon" type="image/x-icon" href="assets/Images/logo.jpg">
</head>
<body>

<div class="header">
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="reserve.html">Reserve</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
        </nav>
    </div>

  <div class="container">
    
      <fieldset>
      <h1>Table Reservation Checkout</h1>
      <form action="checkout.php" method="post" id="reservationForm">
        <table class="tbl">
          <tr>
            <td>
              <p><label for="date">Date:</label><br>
              <input type="date" name="date" id="date" required></p>
            </td>
            <td>
              <p><label for="time">Time:</label><br>
                <select name="time" id="time">
                    <option value="06:00:00">06.00 - 10.00 (Breakfast)</option>
                    <option value="11:00:00">11.00 - 16.00 (Lunch)</option>
                    <option value="18:00:00">18.00 - 22.00 (Dinner)</option>
                </select>
              </p>
            </td>
          </tr>
          <tr class="n"><td colspan="2">
            <h1>Table Map</h1>
            <br><br>
            <div class="rowx">
                <div class="col">
                    <div class="table1">
                        <p>A1<br>4 Seats</p>
                        <input type="checkbox" name="tables[]" value="A1">
                    </div>
                    <div class="table1">
                        <p>A2<br>4 Seats</p>
                        <input type="checkbox"  name="tables[]" value="A2">
                    </div>
                    <div class="table1">
                        <p>A3<br>4 Seats</p>
                        <input type="checkbox" name="tables[]" value="A3">
                    </div>
                </div>
                <div class="col">
                    <div class="table2">
                        <p>B1<br>6 Seats</p>
                        <input type="checkbox" name="tables[]" value="B1">
                    </div>
                    <div class="table2">
                        <p>B2<br>6 Seats</p>
                        <input type="checkbox" name="tables[]" value="B2">
                    </div>
                </div>
                <div class="col">
                    <div class="table3">
                        <p>C1<br>2 Seats</p>
                        <input type="checkbox" name="tables[]" value="C1">
                    </div>
                    <div class="table3">
                        <p>C2<br>2 Seats</p>
                        <input type="checkbox" name="tables[]" value="C2">
                    </div>
                    <div class="table3">
                        <p>C3<br>2 Seats</p>
                        <input type="checkbox" name="tables[]" value="C3">
                    </div>
                </div>
                <div class="col">
                    <div class="table1">
                        <p>D1<br>4 Seats</p>
                        <input type="checkbox" name="tables[]" value="D1">
                    </div>
                    <div class="table1">
                        <p>D2<br>4 Seats</p>
                        <input type="checkbox" name="tables[]" value="D2">
                    </div>
                    <div class="table1">
                        <p>D3<br>4 Seats</p>
                        <input type="checkbox" name="tables[]" value="D3">
                    </div>
                </div>
            </div></td>
          </tr>
          <tr>
            <td colspan="2">
              <p><label for="comments">Comments:</label><br>
              <textarea id="comments" name="comments"></textarea></p>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <button type="submit">Book Table</button>
            </td>
          </tr>
        </table>
      </form>
    </fieldset>
  </div>

  <div class="footer">
        <div>
            <p>&#169 Tavola v1.1 2024</p>
            <br><br>
        </div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="reserve.html">Reserve</a></li>
                <li><a href="home.html#contact">Contact Us</a></li>
                <li><a href="about.html">About us</a></li>
                <li><a href="">Terms</a></li>
            </ul>
        </nav>
        <br>
        <div class="social">
            <a href=""><img src="assets/Images/facebook.png" alt="Facebook"></a>
            <a href=""><img src="assets/Images/twitter.png" alt="Twitter"></a>
            <a href=""><img src="assets/Images/instagram.png" alt="Instagram"></a>
        </div>
    </div>

  <?php
    include "connection.php";
    //ini_set('display_errors', 0);
    

    if(isset($_SESSION['email'])){
      $email = $_SESSION['email'];
    }
    else{
      echo '<script>
          window.alert("You need to Log in for reserve!");
          window.location.href = "index.php";
      </script>';
      exit();
    }

    if (isset($_GET['source'])) {
      $_SESSION['source'] = (int)$_GET['source'];
    }

    if(isset($_POST['date'])  && isset($_POST['time']) && isset($_POST['tables'])){
        $res_id = $_SESSION['source'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $tables = $_POST['tables'];
        $load = false;
        if($res_id == 0){
          echo '<script>
            window.alert("We highly recommend you to first check out the restaurant page!");
            window.location.href = "reserve.html";
          </script>';
        }
        foreach($tables as $table){
            $sql = "select * from reservations where res_id = '$res_id' and reservation_date = '$date' and reservation_time = '$time' and table_id = '$table';";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 0){
              $load = true;
            }
            else{
              $load = false;
              break;
            }
        }
        if($load == true){
          foreach ($tables as $table) {
            $sql = "insert into reservations values ('$email','$res_id', '$date', '$time', '$table');";
              if(mysqli_execute_query($conn, $sql)){
                echo '<script>
                      window.alert("' . htmlspecialchars($table).' Reservation successfull");
                      </script>';
              }
              else{
                  echo '<script>
                      window.alert("Something went wrong!");
                  </script>';
              }
          }
        }
        else{
          echo '<script>
                      window.alert("SORRY!, Some or all of the Selected tables are booked!. Reservation canceled");
                </script>';
        }
      }
    ?>
</body>
</html>