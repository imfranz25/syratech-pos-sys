<?php 
session_start();
include 'header.php'; 
?>
<body onload="loader()">
	<div class="lds-hourglass" id="loader"></div>
	<!-----------Login Box-------------->
	<div class="login_container">
	<fieldset class="loginBox">
		<legend id="login_label" ><img src="../images/syra.png" width="60" height="50">SyraTech</legend>
			<!-----------Form-------------->
			<h1 id="alert"  style="display: none;">Login Failed</h1>
	        <form id="login" method="post">
			        <div id="login_input">
			        	<label class="label_pointer" for="user">Username</label>
			        	<input type="text" name ="user" id="user" placeholder="Enter your username" required autocomplete="off">
			        	<label class="label_pointer" for="pass">Password</label>
				    	<input type="password" name="pass" id="pass" placeholder="Enter your password" required>
			        </div>
			        <input type="submit" id="submit_login" name="submit" value="Log in" />
	        </form>
	        <!-----------End of Form-------------->  
	</fieldset>
	</div>
	<!-----------End of Login Box-------------->

</body>  
</html>

