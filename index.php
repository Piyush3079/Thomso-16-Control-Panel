<?php 
	
		 session_start();
		 include('db.php')
		if(isset($_SESSION['user_name'])){
			header('location:1.php');
		}
		 if(isset($_POST['submit']))
		 {
		  $username = $_POST['username'];
		  $password = $_POST['password'];
		  $query = "SELECT * FROM controls WHERE username='$username' AND password='$password' ";
		  $result = $conn->query($query);
		  /* $num_row = $result->num_rows; */
		   $row = $result->fetch_assoc(); 
		  if($result->num_rows > 0 )
		  {
		   $_SESSION['user_name']=$username;
		   $url = $row["token"];
		   redirect($url);
		   exit;
		  }
		  else
				 {
		   echo 'false';
		  }
		 }
		 function redirect($url) {
			ob_start();
			header('Location: '.$url);
			ob_end_flush();
			die();
		}
		

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
  
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
  
	
	<script>

	</script>
    <!-- Login Form-->
	<div class="container">
		<form method="post" action="">
		  <legend class="legend">Log In</legend>
		  <fieldset>
		  <div class="form-group">
			<label for="email">Email Address * :</label>
			<input type="email" name="username" class="form-control" id="username" maxlength="256" placeholder="Email Address"></input>
		  </div>
		  <div class="form-group">
			<label for="password">Password * :</label>
			<input type="password" name="password" class="form-control" id="password" maxlength="50" placeholder="Password"></input>
		  </div>
		  <button type="submit" class="btn btn-default" name="submit">Submit</button>
		   </fieldset>
		  <p><small>Fields marked with * are mandatory.</small></p>
		</form>
	</div>
  </body>
</html>