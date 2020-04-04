<!-- 
    Carson Perreux, 85322311
    Ryan Hughes, 34193284
    COSC 360 - Project 
-->
<!DOCTYPE html>
<?php
    session_start();
    // checks if your logged in
    if( isset($_SESSION['error']) && $_SESSION['error'] != true ){
         $email = $_SESSION['email'];
         $pass = $_SESSION['pass'];
        // echo $email;
    
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
            // get user info 
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
    }else{
        header("Location: login.php");
        exit;
    }

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Gamer Forums</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/settings.css">
    </head>
    <body>
        <header>
            <a href="home.html"><img id="logo" src="images/gf-logo.png" alt="Gamer Forums Logo" title="Gamer Forums"></a>
            <a href="profile.php"><img id="profile" src="images/profile-outline.png" alt="Default Profile Picture" title="Default Profile Picture"></a>            <nav>
        </header>
        <div id="main">
            <!-- Main content here -->
            <div id="settings">
                <nav>
                    <ul>
                        <li class="current"><a href="profile.php" class="current">Profile</a></li>
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="home.html">Logout</a></li>
                    </ul>
                </nav>
            </div>
            <form method="POST" action="settings.php">
                <fieldset>
                    <legend>Profile Information</legend>
                    <p>
                        <label>First Name:</label>
                        <input value="<?php echo $First ?>" required type="text" name="firstname"/>
                        <label>Last Name:</label>
                        <input value="<?php echo $Last ?>" required type="text" name="lastname"/><br>
                    </p>
                    <p>
                        <label>Email:</label>
                        <input value="<?php echo $email ?>" required type="text" name="email" placeholder="someone123@example.com"><br>
                    </p>
                    <p>
                        <label>Display Name:</label>
                        <input value="<?php echo $dn ?>" required type="text" name="displayname"> (This is the name that will be displayed when you post, comment, etc.)<br>
                    </p>
                    <p>
                        <label>Profile Image:</label>
                        <input required type="file" id="img" name="profile-image" accept="image/*">
                    </p>
                    <p>
                        <label>Country:</label>
                        <select required name="country">
                        <option value="<?php echo $Country ?>"><?php echo $Country ?></option>
                            <option>Austrailia</option>
                            <option>Canada</option>
                            <option>China</option>
                            <option>England</option>
                            <option>Ireland</option>
                            <option>Mexico</option>
                            <option>North Korea</option>
                            <option>South Korea</option>
                            <option>United States</option>
                            <option>Other</option>
                        </select>
                    </p>
                    <p>
                        <label>Gender:</label>
                        <select  required name="gender">
                        <option>
                        <?php echo $Gender?>
                        </option>
                            <option>Female</option>
                            <option>Male</option>
                            <option>Rather not say</option>
                            <option>Other</option>
                        </select>
                        <label>Other:</label>
                        <input  type="text" name="other">
                    </p>
                    <p>
                    <label>Change Password:</label><br>
                    <label>Current Password:</label>
                    <input  required type="text" name="currentPassword"><br>
                    <label>New Password:</label>
                    <input type="text" name="newPassword"><br>
                    <label>Confirm Password:</label>
                    <input    type="text" name="confirmPassword"><br>
                    </p>
                    <p>
                        <input type="submit" value="Save Changes" text="save-changes">
                        <input type="submit" value="Cancel" text="cancel">
                    </p>
                </fieldset>

            </form>
        </div>
    </body>
</html>