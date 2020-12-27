<html>
<head>
<title>Train Ticket Reservation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<style>
.error {
 color: #FF0000;
 font-size:20px;
}
input[type=text] {
    width: 200px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	-webkit-transition-duration: 0.2s;
    transition-duration: 0.2s;
}
input[type=password] {
    width: 200px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	-webkit-transition-duration: 0.2s;
    transition-duration: 0.2s;
}
input[type=text]:hover {
	background-color: #4CAF50;
	color: white;
    width: 200px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password]:hover {
	background-color: #4CAF50;
    width: 200px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	color: white;
}
.div {
 width: 360px;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
.button2 {
    background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 10px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    cursor: pointer;
}
.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}
.button1:hover {
    background-color: #4CAF50;
    color: white;
}
a {
    color: Black;
	text-decoration: none;
	font-size:16px;
}
a:hover {
    color: #4CAF50;
    text-decoration: underline;
}
a:active {
    color: blue;
}
body {
	background-image:url("1.jpg");
}
</style>
</head>
<body>
<?php
$login_idErr = $passwordErr = "";
$login_id_4user = $password_4user = "";
$space = $status = $login_id = $password = "";
ob_start();
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["login_id"])) {
    $login_idErr = "Login ID is required";
  } else {
  $login_id_4user = test_input($_POST["login_id"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$login_id_4user)) {
      $login_idErr = "Only letters and white space allowed"; 
    }
 $con=mysqli_connect("localhost","Administrator","");
 if (!$con)
 {
  $status=2;
 }
  $db_name="test";
 $db=mysqli_select_db($con,$db_name);
 if(!$db)
 {
  $status=2;
 }
 $array=mysqli_query($con,"SELECT * FROM login_id WHERE login_id ='$login_id_4user'");
 if (!$array)
 {
  $status=2;
 }
 while($rowval = mysqli_fetch_array($array))
 {
  $login_id=$rowval['login_id'];
  $password=$rowval['password'];
 }
 if ($login_id==$space)
 {
  $login_idErr="Enter vaild Login ID";
 }
}
  
  if (empty($_POST["password"])&&$login_idErr==$space) {
    $passwordErr = "Password is required";
  } else {
  $password_4user = test_input($_POST["password"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password_4user)) {
      $passwordErr = "Only letters and white space allowed"; 
    }
 if($password==$password_4user){}
 else
 {
  if ($login_idErr==$space){
   $passwordErr="Incorret Password";
  }
 }
  }
}
if ($status>1) {
 print "There is a Problem in connecting Please try again ";
 die();
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center><h1><div class="w3-container w3-center w3-animate-zoom  w3-text-green w3-xxxlarge">Train Ticket Reservation</div></h1></center><p>
<div class="div"><form method ="post" action ="<?php $_PHP_SELF?>">
Login ID :<input type ="text" name ="login_id" placeholder="Login ID" value="<?php echo $login_id_4user;?>" required><br>
Password:<input type ="password" name ="password"  placeholder="Password" required>
<span class="error"><?php if($login_idErr!=$space){echo"<br>";echo $login_idErr;}?></span>
<span class="error"><?php if($passwordErr!=$space){echo"<br>";echo $passwordErr;}?></span><br><center>
<button type = "submit" onclick="clear()" class="button2 button1">Login</button><br>
<a href ="forgot_password.php" >Forgot Password</a><br>
<a href ="create_id.php" >Create your own ID</a></center></div>
</form></p>
<?php 
$space="";
if (!$login_idErr==$space||!$passwordErr==$space||$login_id_4user==$space){die();}
 ob_end_clean();
 $_SESSION['login_id'] = $login_id_4user;
 header("Location: home.php");
?>
</body>
</html>