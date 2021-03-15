<html>
<head>
<title>Forgot Password</title>
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
input[type=password]:hover {
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
.div {
 width: 500px;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #4CAF50;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 13px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.button:hover span {
  padding-right: 25px;
}
.button:hover span:after {
  opacity: 1;
  right: 0;
}
body {
	background-image:url("1.jpg");
}
</style>
</head>
<body>
<?php
$login_idErr = $passwordErr = $security_answerErr = $password1Err = $password2Err = "";
$login_id_4user = $password_4user = $security_answer = $security_answer_4user = $security_question = $password1 = $password2 = "";
$space = $status = $login_id = $password = "";
ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["login_id_4user"])) {
    $login_idErr = "Login ID is required";
  } else {
  $login_id_4user = test_input($_POST["login_id_4user"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$login_id_4user)) {
      $login_idErr = "Only letters and white space allowed"; 
    }$db_name="test";
 $con=mysqli_connect("localhost","Administrator","","$db_name");
 if (!$con)
 {
  $status=2;
 }
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
  $security_question=$rowval['security_question'];
  $security_answer=$rowval['security_answer'];
 }
 if ($login_id==$space)
 {
  $login_idErr="Enter vaild Login ID";
 }
 }
 if (empty($_POST["security_answer_4user"])) {
    $security_answerErr = "Security answer is required";
  } else {
    $security_answer_4user= test_input($_POST["security_answer_4user"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$security_answer_4user)) {
      $security_answerErr = "Only letters ,numbers and white space allowed"; 
    }
	if ($security_answer_4user!=$security_answer){
		$security_answerErr="Wronge answer entered";
	}
  }
  if (empty($_POST["password1"])) {
    $password1Err = "Password is required";
  } else {
    $password1= test_input($_POST["password1"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password1)) {
      $password1Err = "Only letters ,numbers and white space allowed"; 
    }
  }
    if (empty($_POST["password2"])) {
    $password2Err = "Password is required";
  } else {
    $password2= test_input($_POST["password2"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password2)) {
      $password2Err = "Only letters ,numbers and white space allowed"; 
    }
 if ($password1!=$password2&&$password1!=$space){
  $password2Err="Password dose not match";
 }
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center><h1><div class="w3-container w3-center w3-animate-zoom  w3-text-green w3-xxxlarge">Forget your Password?</div></h1></center><p>
<div class="div"><form method ="post" action ="<?php $_PHP_SELF?>">
Login ID                   :<input type ="text" name ="login_id_4user" value="<?php echo $login_id_4user;?>" placeholder="Login ID" required> 
<?php if ($login_id_4user!=$space&&$login_idErr==$space){goto a;}?>
<?php goto s; a: print"<br>"; print$security_question;?><br>
Security answer        :<input type="password" name="security_answer_4user" value="<?php echo $security_answer_4user;?>" placeholder="Security answer" required><br>
Type the Password    :<input type="password" name="password1"  value="<?php echo $password1;?>" placeholder="Type the Password" required> <br>
Retype the Password:<input type="password" name="password2"  value="<?php echo $password2;?>" placeholder="Retype the Password" required>
<span class="error"><?php if($login_idErr==$space&&$security_answerErr!=$space){echo"<br>"; echo $security_answerErr;}?></span>
<span class="error"><?php if($login_idErr==$space&&$security_answerErr==$space&&$password1Err!=$space){echo"<br>";echo $password1Err;}?></span>
<span class="error"><?php if($login_idErr==$space&&$security_answerErr==$space&&$password1Err==$space&& $password2Err!=$space){echo"<br>";echo  $password2Err;}?></span><?PHP s:?>
<span class="error"><?php if($login_idErr!=$space){echo"<br>"; echo $login_idErr;}?></span>
<center><button type="submit" name="submit" value="Submit" class="button" style="vertical-align:middle"><span>Submit</span></button>      </center> 
</form></div>
<?php
if ($login_idErr==$space&&$security_answerErr==$space&&$password1Err==$space&& $password2Err==$space&&$login_id_4user!=$space){
	$sql="UPDATE login_id SET password='$password2' WHERE login_id='$login_id_4user'";
	ob_clean();
	if (mysqli_query($con, $sql)) {} 
	else {
		echo "Error in changing password: " . mysqli_error($conn); die();
	}
	mysqli_close($con);
}else {die();}?>
<div class="w3-container w3-center w3-animate-zoom w3-text-orange w3-jumbo">
Password changed successfully</div>
</body>
</html>