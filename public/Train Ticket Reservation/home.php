<html>
<head>
<title>Book Your Ticket</title>
</head>
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
select {
    width: 200px;
    padding: 8px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
}
select:focus {
	background-color: white;
	color: black;
    width: 200px;
    padding: 8px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.div {
 width:100%;
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
a, a:visited {
	width:100%;
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
body {
	background-image:url("1.jpg");
}
</style>
<body>
<?php
$dojErr = $toErr = "";
$doj = $from = $to = "";
$space = $status = "";
ob_start();
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$from=$_POST["from"];
	$to=$_POST["to"];
	if ($from==$space||$to==$space){
		$toErr="Enter your destination";
	}
	elseif($_POST["from"]==$_POST["to"]){
		$toErr="Enter proper destination";
	}
   if (empty($_POST["doj"])) {
    $dojErr = "D.O.J is required";
  } else{
   $doj=$_POST["doj"];
   $pdate= date("Y-m-d");
   if ($doj<$pdate){
    $dojErr="Enter vaid date";
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
<center><h1><div class="w3-container w3-center w3-animate-zoom  w3-text-green w3-xxxlarge">Book Your Ticket</div></h1><br></center>
<div class="div"><form method ="post" action ="<?php $_PHP_SELF?>" >
From : <select name="from" value="<?php echo $from;?>" required>
	 <option value="<?php echo $from;?>"><?php echo $from;?></option>
     <option value="Coimbatore(CBE)">Coimbatore(CBE)</option>
     <option value="Chennai(MAS)">Chennai(MAS)</option>
</select>                    
To :<select name="to" value="<?php echo $to;?>" required>
	 <option value="<?php echo $to;?>"><?php echo $to;?></option>
     <option value="Coimbatore(CBE)">Coimbatore(CBE)</option>
     <option value="Chennai(MAS)">Chennai(MAS)</option>
</select>                    
D.O.J:<input type="date" name="doj" value="<?php echo $doj;?>" required> 
<span class="error"><?php if($toErr!=$space){echo"<br>";echo $toErr;} ?></span>
<span class="error"><?php if($dojErr!=$space&&$toErr==$space){echo"<br>";echo $dojErr;} ?></span><br>
<center><button type="submit" name="submit" value="Submit"class="button" style="vertical-align:middle"><span>Search</span></button>      </center> </div>
<?php
if ($toErr==$space&&$dojErr==$space&&$to!=$space){
 
 $_SESSION['from'] = $from;
 $_SESSION['to'] = $to;
 $_SESSION['doj'] = $doj;
} else {goto end;}
$_SESSION['train_no']=0;
 ?>
 <a>Train No.                                    Train Name                                Departure Time                      Arrival Time                             Trip Time</a>
 <a href="booking.php" >12244                                  Shatabdi Express                                 15:20                                  22:15                                  6h 55m</a>
 <a href="booking1.php" >12676                                    Kovai Express                                    14:20                                  21:45                                  7h 25m</a>
 <a href="booking2.php" >12680                                  Chennai Express                                  06:15                                  13:50                                  7h 35m</a>
 <?php
 end:
 ?>
</body>
</html>
