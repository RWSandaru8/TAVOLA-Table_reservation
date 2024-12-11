<?php
    $conn = mysqli_connect('localhost','root','','tavola');

    if(!$conn){
        die("Connection faild" + mysqli_connect_error());
    }
?>