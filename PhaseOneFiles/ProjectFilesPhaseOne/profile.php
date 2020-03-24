<!-- 
    Carson Perreux, 85322311
    Ryan Hughes, 34193284
    COSC 360 - Project 
-->
<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if( isset($_SESSION['error'])){
         $email = $_SESSION['userId'];
        // echo $email;
    }
    $servername = 'localhost';
    $username = 'db_admin';
    $password = 'test';
    $dbname ="360web";
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
       /// echo 'Connected to database';
        
        $sql = ("SELECT * FROM user WHERE Email='$email'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
           
            while($row = $result->fetch_assoc()) {
                $First = $row['First'];
                $Last =  $row['Last'];
                $Country =  $row['Country'];
                $Gender =  $row['Gender'];
                $Day =   $row['Day'];
                $Month =   $row['Month'];
                $Year =  $row['Year'];
                $dn =  $row['Display_Name'];
            }
        }
    }catch(PDOException $e){
    echo $e->getMessage();
    }

?>
    <head>
        <meta charset="utf-8">
        <title>Gamer Forums</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <header>
            <a href="home.html"><img id="logo" src="images/gf-logo.png" alt="Gamer Forums Logo" title="Gamer Forums"></a>
            <img id="profile" src="images/profile-outline.png" alt="Default Profile Picture" title="Default Profile Picture">
            <p id="display-name"><?php echo $dn?></p>
        </header>
        <div id="main">
            <!-- Main content here -->
            <div id="settings">
                <nav>
                    <ul>
                        <li class="current"><a href="profile.html" class="current">Profile</a></li>
                        <li><a href="settings.html">Settings</a></li>
                        <li><a href="home.html">Logout</a></li>
                    </ul>
                </nav>
            </div>
            <div id="profile-design">
            <img id="profile" src="images/profile-outline.png" alt="Default Profile Picture" title="Default Profile Picture">
            </div>
            <div id=profile-info>
                <p id="name"><?php  echo $First; echo " "; echo $Last ?> </p>
                <p id="email"><a href="<?php echo $email?>"><?php echo $email?></a></p>
                <p id="country"><?php echo $Country?></p>
                <p id="gender-and-age"><?php echo $Gender; echo  ", "; echo $Day; echo"-"; echo $Month; echo "-"; echo $Year; ?></p>
            </div>
        </div>
    </body>
</html>