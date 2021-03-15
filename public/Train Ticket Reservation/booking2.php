<html>
<head>
<title>Avalablity of Ticket</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<style>
body {
	background-image:url("1.jpg");
}
.div {
 width: 500px;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
pre {
    font-style: italic;
	font-size: 25px;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
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
select {
    width: 250px;
    padding: 5px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
select:hover {
	background-color: #f4511e;
	color: white;
    width: 250px;
    padding: 5px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
select:focus {
	background-color: white;
	color: black;
    width: 250px;
    padding: 5px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=number] {
    width: 250px;
    padding: 5px 20px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	-webkit-transition-duration: 0.2s;
    transition-duration: 0.2s;
}
input[type=number]:hover {
	background-color: #f4511e;
	color: white;
    width: 250px;
    padding: 5px 20px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
a, a:visited {
	width:150;
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}


a:hover, a:active {
    background-color: red;
}
</style>
</head>
<body>
<?php
$adults = $infants =  $space = $status = $coach  = $seat = "";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $coach=$_POST['coach'];
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
 $array=mysqli_query($con,"SELECT * FROM Chennai WHERE coach ='$coach'");
 if (!$array)
 {
  $status=2;
 }
 while($rowval = mysqli_fetch_array($array))
 {
  $seat=$rowval['seat'];
  
 }
if ($status>1) {
	print "There is a Problem in connecting Please try again ";
	die();
}
 ob_start();
 $adults=$_POST['adults'];
 $infants=$_POST['infants'];
 ob_clean();
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center><h1><div class="w3-container w3-center w3-animate-zoom  w3-text-orange w3-xxxlarge">Avalablity of Ticket</div></h1></center>
<div class="div"><form method ="post" action ="<?php $_PHP_SELF?>"><pre>
Train Name    :Chennai Express
Depature Time :06:15
Arrival Time  :13:50
Trip Time     :7h 35m
Coach         :<select name="coach" value="<?php echo $coach;?>" required>
	 <option value="<?php echo $coach;?>"><?php echo $coach;?></option>
     <option value="Sleeper class">Sleeper class</option>
     <option value="First class AC">First class AC</option>
	 <option value="AC-Two tier">AC-Two tier</option>
	 <option value="AC three tier">AC three tier</option>
	 <option value="Seater class">Seater class</option>
</select> 
<?php 
if($coach==$space){goto end;}
print "Seat Avalable :".$seat."<br>";
?>
No. Of Adults :<input type="number" name="adults" value="<?php echo $adults;?>" placeholder="No. Of Adults" min="1" max="5" required>
No. Of Infants:<input type="number" name="infants" value="<?php echo $infants;?>" placeholder="No. Of Infants" min="0" max="3">
</pre> <?php 
if ($adults!=0){
	$tickets=$adults+$infants;
	$_SESSION['seat']=$seat;
	$_SESSION['train_no']=12680;
	$_SESSION['adults']=$adults;
	$_SESSION['infants']=$infants;
	$_SESSION['tickets']= $tickets;
	$_SESSION['coach']=$coach;
	header("Location: summary.php");
}
end:?>
<center><button type="submit" name="submit" value="Submit"class="button" style="vertical-align:middle"><span>GO</span></button>      </div>
<center><a href="home.php">Back To Home</a></center>
</form>
</body>
</html>