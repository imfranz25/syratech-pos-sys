<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>

	<!--Title-->
	<title>Log-in</title>
	<!--CSS Source-->
	<link rel="stylesheet" type="text/css" href="../styles/account.css?v=<?php echo time(); ?>">
	<!--JQuery Library-->
	<script src="../js/jquery.js"></script>
	<!--JS Source-->
	<script src="../js/actions.js"></script>
	<?php  include '../includes/connection.php'; ?>
	
</head>
<body>
	

	<!-----------Login Box-------------->
	<div class="login_container">
	<fieldset class="loginBox">
		<legend id="login_label" ><img src="../images/syra.png" width="60" height="50">SyraTech</legend>
			<!-----------Form-------------->
			<h1 id="alert" style="display: none;">Login Failed</h1>
	        <form  method="post">
			        <div id="login_input">
			        	<label class="label_pointer" for="user">Username</label>
			        	<input type="text" name ="user" id="user" placeholder="Enter your username" required>
			        	<label class="label_pointer" for="pass">Password</label>
				    	<input type="password" name="pass" id="pass" placeholder="Enter your password" required>
			        </div>
				    <button id="submit_login" name="submit_login">Log in</button>
	        </form>
	        <!-----------End of Form-------------->  
	</fieldset>
	</div>
	<!-----------End of Login Box-------------->

<?php
	$con = mysql_connect(); // connection
	if (isset($_POST['submit_login'])) {
		//get values
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$query = "SELECT * FROM account WHERE username = '$user'";
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		$invalid = False;
		if ($count > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$dbpass = $row['user_password'];
				if (password_verify($pass,$dbpass)) {
					$user_id = password_hash($row['employee_no'],PASSWORD_DEFAULT);
					$_SESSION['authenticated'] = 'true';
					$_SESSION['user_id'] = $user_id;
					$_SESSION['username'] = $user;
					echo "<script>window.location.replace('../index.php?page=home&user_id=".$user_id."');</script>";
				}
				else{
					$invalid = True;
				}
			}
		}
		if ($count < 1 | $invalid == True) {
			echo "<script>document.getElementById('alert').style = 'display:block;';</script>";
		} 
	}
	close_connection($con); // close connection
?>
	
<style>
#alert{
	color: white;
    font-size: 24px;
    background: rgb(255,0,0,.3);
    border-radius: 5px;
    margin-left: 12.5%;
    margin-bottom: -5%;
    text-shadow:3px 2px black;
    border: solid 1px red;
    padding-top: 10px;
    padding-bottom: 10px;
    width: 265px;
    text-align: center;
}
</style>

</body>  
</html>

