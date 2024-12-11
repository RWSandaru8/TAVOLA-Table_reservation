<?php
session_start();
session_unset();
session_destroy();
echo '<script>
    window.alert("Logged Out!");
    window.location.href = "adminlogin.php";
</script>';
?>