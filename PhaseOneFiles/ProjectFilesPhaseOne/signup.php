
<?php
    $servername = 'localhost';
    $username = 'db_admin';
    $password = 'test';
    $dbname ="360web";
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo 'Connected to database';
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
        $sql = ("SELECT * FROM user WHERE Email='$email'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                header("Location: login.php");
                exit;
            }   
        }else{
            $sql = "INSERT INTO user (Email,Password,Display_Name,First,Last,Country,Gender,Day,Month,Year) 
            VALUES ('$email','$pass', '$display', '$first', '$last', '$country', '$gender', '$day', '$month', '$year')";
            $result = $conn->query($sql);
            header("Location: home.html");
            exit;
        }
    }catch(PDOException $e)
        {
        echo $e->getMessage();
    
        }
   
   
?>