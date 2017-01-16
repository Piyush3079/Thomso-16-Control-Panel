<?php
session_start();
include('db.php');
error_reporting(0);
@ini_set('display_errors', 0); 
if(isset($_SESSION['user_name'])) {
if(isset($_POST['submit1'])){
	$thomso_id = $_SESSION["thomso_id"];
	if(!empty($_POST['bhawan'])){
	$bhawan = $_POST['bhawan'];
	echo 'Bhawan : '.$bhawan.'<br>';}
	else{
		$qr = "SELECT bhawan FROM participants WHERE thomso_id='$thomso_id'";
		$re = mysqli_query($mysqli,$qr);
		$data = mysqli_fetch_assoc($re);
		if($re){
		$bhawan = $data["bhawan"];}
	}
	if(!empty($_POST['room'])){
		$room = $_POST['room'];
		echo 'Room No : '.$room.'<br>';
	}
	else{
		$qr = "SELECT room FROM participants WHERE thomso_id='$thomso_id'";
		$re = mysqli_query($mysqli,$qr);
		$data = mysqli_fetch_assoc($re);
		if($re){
		$room = $data["room"];}
	}
	if(!empty($_POST['tshirt'])){
	$tshirt = $_POST['tshirt'];
	echo 'T-shirt : '.$tshirt.'<br>';
	}
	else{
		$qr = "SELECT tshirt FROM participants WHERE thomso_id='$thomso_id'";
		$re = mysqli_query($mysqli,$qr);
		$data = mysqli_fetch_assoc($re);
		if($re){
		$tshirt = $data["tshirt"];}
	}
	$query = "UPDATE participants SET bhawan='$bhawan', room='$room', tshirt='$tshirt' WHERE thomso_id='$thomso_id'";
	$qr2 = mysqli_query($mysqli,$query) OR die("ERROR:" .mysqli_error($mysqli));
	if($qr2){
		echo "<br><br>Accomodation details updated successful.<br><br>Thank you...<br><br>";
		echo '<a href="1.php" style="font-size:20px;">Click to register another thomso id</a>';
	}
	else{
		echo "Error updating the records";
	}
}
}
else{
	header("location:index.php");
}

?>