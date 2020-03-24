<?php
    session_start();
     $_SESSION['userId'] = "bruh";
     header("Location: login.php");
     exit;
?>