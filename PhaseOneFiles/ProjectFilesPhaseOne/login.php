<?php
    $hostname = 'localhost';
    $username = 'db_admin';
    $password = 'test';
    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=360web", $username, $password);
        echo 'Connected to database';
        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
?>
<?php
    $hostname = 'localhost';
    $username = 'db_admin';
    $password = 'test';
    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=360web", $username, $password);
        echo 'Connected to database';
        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
    $sql = "SELECT * FROM login WHERE Id=";
    $result = $dbh->query($sql);
?>