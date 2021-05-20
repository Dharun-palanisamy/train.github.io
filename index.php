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
     $conn = pg_connect(getenv("postgres://mjthlopbqtqvkd:a483b85042040a4413668e4212b89932b6276a2a716ed1e3d7b376dc7d33e758@ec2-52-21-252-142.compute-1.amazonaws.com:5432/df56u1c1jatv1b"));
    if (!$conn) 
   {
     echo "Database connection failed.";
   }
   else 
   {
     echo "Database connection success.";
   }
?>123<a href="public/Train Ticket Reservation/login.php"  target="_blank">click here</a>
</body>
</html>
