<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<style>
.error {
 color: #FF0000;
 font-size:16px;
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
input[type=date] {
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
input[type=number] {
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
input[type=email] {
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
select {
    width: 200px;
    padding: 8px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	-webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
	-webkit-transition-duration: 0.2s;
    transition-duration: 0.2s;
}
input[type=text]:hover {
	background-color: #f4511e;
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
	background-color: #f4511e;
	color: white;
    width: 200px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=date]:hover {
	background-color: #f4511e;
	color: white;
    width: 200px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=number]:hover {
	background-color: #f4511e;
	color: white;
    width: 200px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=email]:hover {
	background-color: #f4511e;
	color: white;
    width: 200px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
select:hover {
	background-color: #f4511e;
	color: white;
    width: 200px;
    padding: 8px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	-webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
select:focus {
	background-color: white;
	color: black;
    width: 395px;
    padding: 8px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.div {
 width: 700px;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
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
$nameErr = $surnameErr = $dobErr = $genderErr = $phoneErr = $emailErr = $login_idErr = $password1Err = $password2Err = $security_answerErr ="";
$name = $surname = $dob = $gender = $phone = $email = $login_id = $password1 = $password2 = $password = $security_answer = "";
$space = $login_id_in_server = "";$status=0;
ob_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["surname"])) {
    $surnameErr = "Surname is required";
  } else {
    $surname = test_input($_POST["surname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
      $surnameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["dob"])) {
    $dobErr = "DOB is required";
  } else{
   $dob="dob";
   $dob=$_POST[$dob];
   $pdate= date("Y");
   $age=$pdate-$dob;
   if ($age<18){
    $dobErr="You must be aged more than 18 to create an ID";
   }
   if ($age>100){
    $dobErr="Invalid DOB";
   }
  }
  
 if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  if (empty($_POST["phone"])) {
     $phoneErr= "Phone number is required";
  $phone = $_POST["phone"];
   } else if(!preg_match("/^[0-9 ]*$/", $_POST["phone"]))
   {
       $phoneErr="Invalid Phone number";
   }else {
       if (strlen($_POST["phone"])!=10){
     $phoneErr="Invalid Phone number";
    }
  $phone = $_POST["phone"];
   }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if (empty($_POST["login_id"])) {
    $login_idErr = "Login ID is required";
  } else {
    $login_id= test_input($_POST["login_id"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$login_id)) {
      $login_idErr = "Only letters ,numbers and white space allowed"; 
    }
 $con=mysqli_connect("localhost","9std","");
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
 $array=mysqli_query($con,"SELECT * FROM login_id WHERE login_id ='$login_id'");
 while($rowval = mysqli_fetch_array($array))
 {
  $login_id_in_server=$rowval['login_id'];
  $password=$rowval['password'];
 }
 if ($login_id_in_server!=$space)
 {
  $login_idErr="Login ID exsist already";
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
if (empty($_POST["security_answer"])) {
    $security_answerErr = "Security answer is required";
  } else {
    $security_answer= test_input($_POST["security_answer"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$security_answer)) {
      $security_answerErr = "Only letters ,numbers and white space allowed"; 
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
<center><h1><div class="w3-container w3-center w3-animate-zoom  w3-text-green w3-xxxlarge">Create your own ID</div></h1></center>
<p align="justify"><span class="error"></span><div class="div">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
Name                        : <input type="text" name="name"  value="<?php echo $name;?>" placeholder="Name" required> <span class="error"><?php echo $nameErr;?></span><br>
Surname                   : <input type="text" name="surname" value="<?php echo $surname;?>" placeholder="Surname" required> <span class="error" ><?php echo $surnameErr;?></span><br>
DOB                         : <input type="date" name="dob" value="<?php echo $dob;?>" required> <span class="error"><?php echo $dobErr;?></span><br>
Gender                     : <input class="w3-radio" type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"required><label class="w3-validate">      Male         </label>
<input class="w3-radio" type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female" required><label class="w3-validate">      Female  </label>
<span class="error">                  <?php echo $genderErr;?></span><br>
Phone Number          : <input type="number" name="phone" value="<?php echo $phone;?>" placeholder="Phone Number" required> <span class="error" ><?php echo $phoneErr;?></span><br>
E-mail                      : <input type="email" name="email" value="<?php echo $email;?>" placeholder="E-mail" required> <span class="error" ><?php echo $emailErr;?></span><br>
Login ID                   : <input type="text" name="login_id"  value="<?php echo $login_id;?>" placeholder="Login ID" required> <span class="error"><?php echo $login_idErr;?></span><br>
Type the Password    : <input type="password" name="password1"  value="<?php echo $password1;?>" placeholder="Type the Password" required> <span class="error"><?php echo $password1Err;?></span><br>
Retype the Password :<input type="password" name="password2"  value="<?php echo $password2;?>" placeholder="Retype the Password" required> <span class="error"><?php echo $password2Err;?></span><br>
Security question      :<select name="security_question">
     <option value="What was your childhood nickname?">What was your childhood nickname?</option>
     <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
     <option value="Who is your childhood sports hero?">Who is your childhood sports hero?</option>
	 <option value="What is your favorite team?">What is your favorite team?</option>
	 <option value="What is your favorite movie?">What is your favorite movie?</option>
	 <option value="What was your favorite sport in high school?">What was your favorite sport in high school?</option>
	 <option value="What was your favorite food as a child?">What was your favorite food as a child?</option>
	 <option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
	 <option value="What was the name of the company where you had your first job?">What was the name of the company where you had your first job?</option>
</select><br>
Security answer        :<input type="password" name="security_answer"  value="<?php echo $security_answer;?>" placeholder="Security answer" required> <span class="error"><?php echo $security_answerErr;?></span><br>
<center><button type="submit" name="submit" value="Submit"class="button" style="vertical-align:middle"><span>Submit</span></button>      </center> 
</form></div></p>
<?php
if ($nameErr!=$space||$surnameErr!=$space||$dobErr!=$space||$genderErr!=$space||$phoneErr!=$space||$emailErr!=$space||$email==$space||$login_idErr!=$space||$password1Err!=$space||$password2Err!=$space){die();}
else{
	ob_clean();
$security_question = "";
$security_question=$_POST["security_question"];
 $insert="INSERT INTO login_id(login_id,password,name,surname,dob,gender,phone,email,security_question,security_answer) VALUES ('$login_id','$password2','$name','$surname','$dob','$gender','$phone','$email','$security_question','$security_answer')";
mysqli_query($con,$insert);
$array=mysqli_query($con,"SELECT * FROM login_id WHERE login_id ='$login_id'");
while($rowval = mysqli_fetch_array($array))
 {
  $login_id_in_server=$rowval['login_id'];
 }
 if ($login_id_in_server==$space){
	 print "There is a problem createing your ID.Please try again";
	 die();
}
}
mysqli_close($con);
?>
<div class="w3-container w3-center w3-animate-zoom w3-text-orange w3-jumbo">
ID created successfully</div>
</body>
</html>