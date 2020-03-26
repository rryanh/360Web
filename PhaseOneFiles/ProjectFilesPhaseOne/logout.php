<?php
    session_start();
     $_SESSION['error'] = true;
     header("Location: login.php");
     exit;
?>