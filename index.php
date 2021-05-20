<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo "hello";
    $host = "ec2-52-21-252-142.compute-1.amazonaws.com";
    $user = "mjthlopbqtqvkd";
    $password = "a483b85042040a4413668e4212b89932b6276a2a716ed1e3d7b376dc7d33e758";
    $dbname = "df56u1c1jatv1b";
    $port = "5432";
    
    try{
      //Set DSN data source name
        $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";
    
    
      //create a pdo instance
      $pdo = new PDO($dsn, $user, $password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }
?><a href="public/Train Ticket Reservation/login.php"  target="_blank">click here</a>
</body>
</html>
