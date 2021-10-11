<!DOCTYPE html>
<html lang="en-us">
<?php session_start(); include 'head_login.php'; ?>
<body onload="loader()">
	<div class="lds-hourglass" id="loader"></div>
	<!-----------Login Box-------------->
	<div class="login_container container">
	<fieldset class="loginBox" >
	
			<h1 id="login_label"><img src="../images/syra.png" width="60" height="50" />SyraTech</h1>
			<!-----------Form-------------->
			<h1 id="alert-failed"  style="display: none;"><i class="fas fa-times-circle mx-3"></i>Login Failed</h1>
			<h1 id="alert-success"  style="display: none;"><i class="fas fa-check-circle mx-3"></i>Login Success</h1>
	        <form id="login" method="post">
			        <div id="login_input">
			        	<label class="label_pointer" for="user">Username</label>
			        	<input type="text" name ="user" id="user" placeholder="Enter your username" required autocomplete="off">
			        	<label class="label_pointer" for="pass">Password</label>
				    	<input type="password" name="pass" id="pass" placeholder="Enter your password" required>
			        </div>
			        
			        <button type="submit" id="submit_login" name="submit">
			        	<span>Log in  <i id="login_loader" class="fa fa-spinner fa-spin" style="display: none;"></i></span>
			        </button>
	        </form>
	        <!-----------End of Form-------------->  
	</fieldset>
	</div>
	<!-----------End of Login Box-------------->

</body>  
</html>

