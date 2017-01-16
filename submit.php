<?php
session_start();
include('db.php');
$mysqli = mysqli_connect($servername, $username, $password, "ad977c0f_thomso");
error_reporting(0);
@ini_set('display_errors', 0);
if(isset($_SESSION['user_name'])) {
if(isset($_POST['submit']) && isset($_POST['payment']) && !empty($_POST['payment']))
{
	$thomso_id = $_SESSION["thomso_id"];
		$query1 = "SELECT * FROM registration_form WHERE thomso_id='$thomso_id'";
		$result = $conn->query($query1);
		$row = $result->fetch_assoc(); 
		 if($result->num_rows > 0 )
		  {
			  $thomso_id = $row["thomso_id"];
			  $name = $row["name"];
			  $email = $row["email"];
			  $mobile = $row["mobile"];
			  $college = $row["college"];
			  $gender = $row["gender"];
			  $accomodation = $row["accomodation"];
			  $tshirt = $row["tshirt"];
			  $event = $row["event"];
			  $event1 = $row["event1"];
		  }
		  $qr9 = "SELECT * FROM participants WHERE thomso_id='$thomso_id'";
		  $re9 = mysqli_query($mysqli,$qr9);
		  if(mysqli_num_rows($re9) ==0 ){
$query = "INSERT INTO participants(thomso_id, name, email, mobile, college, gender, accomodation, tshirt, event, event1) 
		VALUES ('$thomso_id', '$name', '$email', '$mobile', '$college', '$gender', '$accomodation', '$tshirt', '$event', '$event1')";
$qr2 = mysqli_query($mysqli,$query) OR die("ERROR:" .mysqli_error($mysqli));
if($qr2){
	echo "The details of participant is registered in the database.Please wait...<br><br>Updating payment...";
}
		  }
echo '<br><br>Thomso ID : '.$thomso_id.'<br>';
$payment = $_POST['payment'];
echo '<br>Payment : '.$payment.'<br>';
if(!empty($_POST['paymentmode'])){
$paymentmode = $_POST['paymentmode'];
echo 'Payment Mode : '.$paymentmode.'<br>';}
else{
	$paymentmode == NULL;
}
if(!empty($_POST['number'])){
$number = $_POST['number'];
echo 'Number : '.$number.'<br>';}
else{
	$number == NULL;
}
if(!empty($_POST['amount_new'])){
$amount_new = $_POST['amount_new'];
echo 'Amount : '.$amount_new.'<br>';}
else{
	$amount_new == NULL;
}
if(!empty($_POST['bhawan'])){
$bhawan = $_POST['bhawan'];
echo 'Bhawan : '.$bhawan.'<br>';}
else{
	$bhawan == NULL;
}
if(!empty($_POST['room'])){
	$room = $_POST['room'];
	echo 'Room No : '.$room.'<br>';
}
else{
	$room == NULL;
}
if(!empty($_POST['tshirt'])){
	$tshirt = $_POST['tshirt'];
	echo 'T-shirt : '.$tshirt.'<br>';
}
else{
	$tshirt == NULL;
}
$query = "UPDATE participants SET payment='$payment', bhawan='$bhawan', room='$room', tshirt='$tshirt',paymentmode='$paymentmode', number='$number', amount_new='$amount_new' WHERE thomso_id='$thomso_id'";
$qr2 = mysqli_query($mysqli,$query) OR die("ERROR:" .mysqli_error($mysqli));
if($qr2){
	echo "<br><br>Payment and accomodation details updated successful.<br><br>Thank you...<br><br>";
	echo '<a href="1.php" style="font-size:20px;">Click to register another thomso id</a>';
}
else{
	echo "Error updating the records";
}
}
else{
	echo "Select payment...";
	echo '<a href="1.php" style="font-size:20px;">Click to go back</a>';
}
}
else{
	header("location:index.php");
}
?>