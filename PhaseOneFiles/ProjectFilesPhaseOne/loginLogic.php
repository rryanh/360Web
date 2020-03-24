
<?php
session_start();
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
        $sql = ("SELECT * FROM user WHERE Email='$email'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ( $row["Email"] == $email &&  $row["Password"] == $pass){
                    $_SESSION['userId'] = $email;
                    echo "Bruh";
                    $error = false;
                    $_SESSION['error'] = $error;
                    $_SESSION['email'] = $email;
                    $_SESSION['pass'] = $pass;
                    header("Location: home.html");
                    exit;
                }else{
                    $error = true;
                    $_SESSION['error'] = $error;
                    header("Location: login.php");
                    exit;
                }
            }
        }   
    }catch(PDOException $e)
        {
        echo $e->getMessage();
        }
   
   
?>