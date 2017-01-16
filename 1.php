<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  
  <!--jquery ui css-->
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />
  
  <!--Jquery google api -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
  <!--jquery ui-->
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
  <script src="js/jquery.min.js" type="text/javascript"></script>
  
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
	<div class="container">
		<form method="post" action="">
		  
		  <fieldset>
		  <div class="form-group">
			<label for="email">Enter the thomso id * :</label><br>
			<div class="row">
				<div class="col-lg-1" style="width: 5%;margin-top: 0.3vw;font-size: 19px;">TH16</div>
			<div class="col-lg-11"><input type="name" name="thomsoid" class="form-control" id="thomsid" maxlength="256" placeholder="Enter the thomso id"></input></div>
		    </div>
		  </div>
		  <!-- <div class="form-group">
			<label for="password">Password * :</label>
			<input type="password" name="password" class="form-control" id="password" maxlength="50" placeholder="Password"></input>
		  </div> -->
		  <button type="submit" class="btn btn-default" name="submit">Submit</button>
		   </fieldset>
		  <p><small>Fields marked with * are mandatory.</small></p>
		</form>
	</div>
<?php
include('db.php');
error_reporting(0);
@ini_set('display_errors', 0); 
if(isset($_SESSION['user_name']))
{
	if(isset($_POST['submit']))
	{
		  $thomsoid = "TH16".$_POST['thomsoid'];
		  $query = "SELECT * FROM registration_form WHERE thomso_id='$thomsoid'";
		  $result = $conn->query($query);
		  /* $num_row = $result->num_rows; */
		   $row = $result->fetch_assoc(); 
		   
		  if($result->num_rows > 0 )
		  {
			  $thomso_id = $row["thomso_id"];
			  $_SESSION["thomso_id"] = $thomso_id;
			  $name = $row["name"];
			  $email = $row["email"];
			  $mobile = $row["mobile"];
			  $college = $row["college"];
			  $gender = $row["gender"];
			  $accomodation = $row["accomodation"];
			  $tshirt = $row["tshirt"];
			  $event = $row["event"];
			  $event1 = $row["event1"];
			  $payment = $row["payment"];
			  $ticket = $row["ticket"];
			  echo '<div class="container-fluid"><div class="row"><div class="col-lg-7"><div class="row"><div class="col-lg-3 col-lg-offset-1">Thomso ID : </div><div class="col-lg-7" style="float:left;">'.$thomso_id.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Name : </div><div class="col-lg-8" style="float:left;">'.$name.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Email ID : </div><div class="col-lg-8" style="float:left;">'.$email.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Mobile No. : </div><div class="col-lg-8" style="float:left;">'.$mobile.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">College : </div><div class="col-lg-8" style="float:left;">'.$college.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Gender : </div><div class="col-lg-8" style="float:left;">'.$gender.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Accomodation : </div><div class="col-lg-8" style="float:left;">'.$accomodation.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">T-shirt : </div><div class="col-lg-8" style="float:left;">'.$tshirt.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Primary Event : </div><div class="col-lg-8" style="float:left;">'.$event.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Secondary Event : </div><div class="col-lg-8" style="float:left;">'.$event1.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Payment status : </div><div class="col-lg-8" style="float:left;">'.$payment.'</div></div><br>';
			  echo '<div class="row"><div class="col-lg-3 col-lg-offset-1">Ticket : </div><div class="col-lg-8" style="float:left;">'.$ticket.'</div></div></div>';
			  $qr1 = mysqli_query($mysqli,"SELECT email, payment, bhawan, tshirt, room FROM participants WHERE email = '$email'") or die("MySQL Error.");
			  $data = mysqli_fetch_assoc($qr1);
			  if(mysqli_num_rows($qr1)){
				  
				  
					echo '<div class="col-lg-5">
						<div class="row"><div class="col-lg-3 col-lg-offset-1">Payment : </div><div class="col-lg-8" style="float:left;">'.$data['payment'].'</div></div>
						<div class="row"><div class="col-lg-3 col-lg-offset-1">Bhawan : </div><div class="col-lg-8" style="float:left;">'.$data['bhawan'].'</div></div>
						<div class="row"><div class="col-lg-3 col-lg-offset-1">Room No. : </div><div class="col-lg-8" style="float:left;">'.$data['room'].'</div></div>
						<div class="row"><div class="col-lg-3 col-lg-offset-1">T-shirt : </div><div class="col-lg-8" style="float:left;">'.$data['tshirt'].'</div></div>
						<br><br>
						<form method="post" action="submit1.php">
							<label>Accomodation : </label>
								<select id="bhawan" name="bhawan">
								   <option value="">Select Bhawan for Accomodation</option>
								   <option value="Azad Bhawan">Azad Bhawan</option>
								   <option value="Cautley Bhawan">Cautley Bhawan</option>
								   <option value="Ganga Bhawan">Ganga Bhawan</option>
								   <option value="Govind Bhawan">Govind Bhawan</option>
								   <option value="Jawahar Bhawan">Jawahar Bhawan</option>
								   <option value="Radhakrishnan Bhawan">Radhakrishnan Bhawan</option>
								   <option value="Rajendra Bhawan">Rajendra Bhawan</option>
								   <option value="Rajiv Bhawan">Rajiv Bhawan</option>
								   <option value="Ravindra Bhawan">Ravindra Bhawan</option>
								   <option value="Malviya Bhawan">Malviya Bhawan</option>
								   <option value="Sarojini Bhawan">Sarojini Bhawan</option>
								   <option value="Kasturba Bhawan">Kasturba Bhawan</option>
								   <option value="Indira Bhawan">Indira Bhawan</option>
								</select>
							<br><br><label>Room No.(Optional) : </label>
							<input type="text" name="room" placeholder="Room No.(Optional)"><br><br>
							<label>T-shirt : </label>
							<input type="radio" name="tshirt" value="yes" >yes
						   <input type="radio" name="tshirt" value="no">no<br><br>
						  <input type="submit" name="submit1" value="Submit" class="btn btn-lg">
						</form>
					</div></div></div>';
				}
			else{ 
			 /* $query = "INSERT INTO participants(thomso_id, name, email, mobile, college, gender, accomodation, tshirt, event, event1) 
			VALUES ('$thomso_id', '$name', '$email', '$mobile', '$college', '$gender', '$accomodation', '$tshirt', '$event', '$event1')";
			$qr2 = mysqli_query($mysqli,$query) OR die("ERROR:" .mysqli_error($mysqli));
			if($qr2){ */
				echo '<div class="col-lg-5">
						<div class="row"><div class="col-lg-3 col-lg-offset-1">Payment : </div><div class="col-lg-8" style="float:left;">'.$data['payment'].'</div></div>
						<div class="row"><div class="col-lg-3 col-lg-offset-1">Bhawan : </div><div class="col-lg-8" style="float:left;">'.$data['bhawan'].'</div></div>
						<div class="row"><div class="col-lg-3 col-lg-offset-1">Room No. : </div><div class="col-lg-8" style="float:left;">'.$data['room'].'</div></div>
						<div class="row"><div class="col-lg-3 col-lg-offset-1">T-shirt : </div><div class="col-lg-8" style="float:left;">'.$data['tshirt'].'</div></div>
						<br>
				<form method="post" action="submit.php">  
						<label>Payment : </label>
						<input type="radio" name="payment" value="yes" >yes
						   <input type="radio" name="payment" value="no">no
						   <input type="radio" name="payment" value="CA">CA
						   <br>
						   <div style="border:1px solid black;width:90%">IF PAYMENT STATUS NO BUT STILL PAID, THEN FILL THIS TOO:<br>
						   <label>Payment Mode</label>
							   <select id="paymentmode" name="paymentmode">
									<option value="">Payment mode</option>
									<option value="townscript">Townscript</option>
									<option value="cheque">Cheque</option>
									<option value="dd">DD</option>
							   </select>
							<label>Number</label>
								<input type="text" name="number" placeholder="Number" autocomplete="off"><br>
							<label>Amount</label>
								<input type="text" name="amount_new" placeholder="Amount"></div><br><br>
						   <label>Accomodation : </label>
								<select id="bhawan" name="bhawan">
								   <option value="">Select Bhawan for Accomodation</option>
								   <option value="Azad Bhawan">Azad Bhawan</option>
								   <option value="Cautley Bhawan">Cautley Bhawan</option>
								   <option value="Ganga Bhawan">Ganga Bhawan</option>
								   <option value="Govind Bhawan">Govind Bhawan</option>
								   <option value="Jawahar Bhawan">Jawahar Bhawan</option>
								   <option value="Radhakrishnan Bhawan">Radhakrishnan Bhawan</option>
								   <option value="Rajendra Bhawan">Rajendra Bhawan</option>
								   <option value="Rajiv Bhawan">Rajiv Bhawan</option>
								   <option value="Ravindra Bhawan">Ravindra Bhawan</option>
								   <option value="Malviya Bhawan">Malviya Bhawan</option>
								   <option value="Sarojini Bhawan">Sarojini Bhawan</option>
								   <option value="Kasturba Bhawan">Kasturba Bhawan</option>
								   <option value="Indira Bhawan">Indira Bhawan</option>
								</select>
							<br><br><label>Room No.(Optional) : </label>
							<input type="text" name="room" placeholder="Room No.(Optional)" autocomplete="off"><br><br>
							<label>T-shirt : </label>
							<input type="radio" name="tshirt" value="yes" >yes
						   <input type="radio" name="tshirt" value="no">no<br><br>
						  <input type="submit" name="submit" value="Submit" class="btn btn-lg">
						</form>
						</div>
						</div></div>';
			/* }
			 else{
				echo "There was some error entering the participant";
			} */ 
		   /* $_SESSION['user_name']=$username;
		   $url = $row["token"];
		   redirect($url);
		   exit; */
		  }
		  }
		  else
				 {
		   echo 'false';
		  }
	}
}
else{
	echo '<script>location.replace("index.php")</script>';
}

?>
  </body>

</html>