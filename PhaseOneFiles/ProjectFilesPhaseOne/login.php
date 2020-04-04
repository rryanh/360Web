<!-- 
    Carson Perreux, 85322311
    Ryan Hughes, 34193284
    COSC 360 - Project 
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Gamer Forums</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/login.css">

    </head>
    <body>
        <header>
            <a href="home.html"><img id="logo" src="images/gf-logo.png" alt="Gamer Forums Logo" title="Gamer Forums"></a>
            <p id="header-name">Log in</p>
        </header>
        <div id="main">
            <!-- Main content here -->
            <form method="POST" action="loginLogic.php">
                <fieldset>
                    <legend>Login</legend>
                    <label>Email:</label><br>
                    <input required type="text" name="email" placeholder="someone@example.com"><br>
                    <label>Password:</label><br>
                    <input required type="password" name="password"><br>
                    <input type="submit" value="Log in" name="login">
                    <p class="linked">Forget your password? <a href="forgot-password.html">Click Here</a></p>
                    <p class="linked">Don't have an account? <a href="signup.html">Create One</a>!</p>
                </fieldset>
            </form>
            <?php
                session_start();
               if( isset($_SESSION['error'])){
                $er = $_SESSION['error'];
                    if ($er){
                    echo "<p class='error' style='background-color: red;
                    text-align: center;padding-left:30%; padding-right:30%;'> Password or Email Incorrect </p>";
                }else{
                    echo"<script language='javascript'>
                    var element = document.getElelemtByClassName('error');
                    </script>";
                }
               }
               
            ?>
        </div>
    </body>
    <!-- <footer>
        <div id="contact">
            <p>Email</p>
            <a href="mailto:gamerforumscontact@gmail.com">gamerforumscontact@gmail.com</a>
        </div>
        <div id="socials">
            <p>Social Media Links</p>
            <div id="social-icons">
                <a href="https://www.facebook.com"><img id="center-img" class="social-img" src="images/FacebookIcon.png" alt="Facebook Icon" title="Facebook"></a>
                <a href="https://www.instagram.com"><img class="social-img" src="images/InstagramIcon.png" alt="Instagram Icon" title="Instagram"></a>
                <a href="https://www.twitter.com"><img class="social-img" src="images/TwitterIcon.png" alt="Twitter Icon" title="Twitter"></a>
                <a href="https://www.youtube.com"><img class="social-img" src="images/YouTubeIcon.png" alt="YouTube Icon" title="YouTube"></a>
            </div>
        </div>
        <div id="copy">
            Copyright &copy; Gamer Forums, <time datetime="2020-01-01"><em>January 01, 2020</em></time>
        </div>
    </footer> -->
</html>