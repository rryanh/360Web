
<?php
    $hostname = 'localhost';
    $username = 'db_admin';
    $password = 'test';
    try {
        $conn = new PDO("mysql:host=$hostname;dbname=360web", $username, $password);
        echo 'Connected to database';
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $display = $_POST["displayname"];
        $first = $_POST["firstname"];
        $last = $_POST["lastname"];
        $country = $_POST["country"];
        $gender = $_POST["gender"];
        $day = $_POST["day"];
        $month = $_POST["month"];
        $year = $_POST["year"];
        //echo $email;
        $test = "zo;xknfklsdfnkl ";
        $sql = "INSERT INTO user (Email,Password,Display_Name,First,Last,Country,Gender,Day,Month,Year) 
        VALUES ( $test, $pass, $display, $first, $last, $country, $gender, $day, $month, $year)";
        $conn->exec($sql);
        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
   
   
?>