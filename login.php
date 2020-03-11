
<?php


 //Start the Session

require_once 'connections.php'; 


//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$user = $_POST['username'];
$pass = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `login_table` WHERE username='$user' and password='$pass'";
 
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $user;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
	$user = $_SESSION['username'];
	header('Location: index.php');
 
}else{

	if (!empty($user)) {

		echo "<h3>Error</h3>";

	}
	// echo "Error to login";
}

?>





<!doctype html>
 	<html>
 	    <head>
 	        <meta charset="utf-8">
 	        <title></title>
 	        <link rel="stylesheet" href="css/style.css">
 	        <!-- <script src="js/main.js"></script> -->
 	    </head>
 	    <body>
 	<div class="login-container">

	      <form class="login-form" method="POST">
	        
			<div class="inko-img">
				<img src="img/logo_inko-versand_login.svg" alt="">
			</div>

			<h2 class="form-signin-heading">Inko-versand login for Idealo</h2>

	        <div class="input-login login-width">
		  		<label class="input-group-addon" id="basic-addon1">
		  			<p>username</p>
		  		</label>

		  		<input id="userID" type="text" name="username" class="form-control" placeholder="Username" required>
			</div>

			<div class="input-login login-width">
	        	<label for="inputPassword" class="sr-only">
	        		<p>Password</p>
	        	</label>

	        	<input id="passID" type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
	        </div>

	        <button class="" type="submit">Login</button>
	      </form>
	</div>
 	    </body>
 	</html>
 	 	


<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

