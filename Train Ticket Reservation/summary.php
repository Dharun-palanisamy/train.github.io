<html>
<head>
<title>Ticket Summary</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<style>
body {
	background-image:url("1.jpg");
}
.div {
 width: 360px;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
</head>
<body>
<?php
$status = $train_name = $departure_time = $arrival_time = "";
session_start();
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
 $train_no=$_SESSION['train_no'];
 $array=mysqli_query($con,"SELECT * FROM train WHERE train_no ='$train_no'");
 if (!$array)
 {
  $status=2;
 }
 while($rowval = mysqli_fetch_array($array))
 {
  $train_name=$rowval['train_name'];
  $departure_time=$rowval['departure_time'];
  $arrival_time=$rowval['arrival_time'];
  $trip_time=$rowval['trip_time'];  
 }
if ($status>1) {
	print "There is a Problem in connecting Please try again ";
	die();
}
?>
<center><h1><div class="w3-container w3-center w3-animate-zoom  w3-text-green w3-xxxlarge">Ticket Summary</div></h1></center><div class=div>
<?php
print "Train Name:".$train_name."<br>";
print "Depature  :".$_SESSION['from']."(".$departure_time.")<br>";
print "Arrival   :".$_SESSION['to']."(".$arrival_time.")<br>";
print "D.O.J     :".$_SESSION['doj']."<br>";
print "Coach     :".$_SESSION['coach']."<br>";
print "Adults    :".$_SESSION['adults']."<br>";
print "Infants   :".$_SESSION['infants']."<br>";
 ?>
<button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-green w3-large">Book</button></div>
<div id="id01" class="w3-modal">
<div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px"><div class="w3-center"><br>
<span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">×</span>
<?php 
$coach=$_SESSION['coach'];
$adults=$_SESSION['adults'];
$infants=$_SESSION['infants'];
$login_id=$_SESSION['login_id'];
$sql1="UPDATE login_id SET train_no='$train_no' coach='$coach' adults='$adults' infants='$infants' WHERE login_id='$login_id'";
mysqli_query($con,$sql1);
$seat=$_SESSION['seat']-$_SESSION['tickets'];
$train_name1=str_replace(" Express","",$train_name);
$sql="UPDATE $train_name1 SET seat ='$seat' WHERE coach='$coach'";
mysqli_query($con, $sql);
?>
<div class="w3-container w3-center   w3-text-green w3-xxxlarge">Ticket Booked Successfully</div></div></div></div>
</body>
</html>