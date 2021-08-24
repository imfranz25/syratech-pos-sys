
	<title>Update User Details</title>
	<!--CSS Source-->
	<link rel="stylesheet" type="text/css" href="styles/employee.css?v=<?php echo time(); ?>">
	<!--JQUERY Library-->
	<script src="js/jquery.js"></script>
	<!--JS Source-->
	<script src="js/employee.js?v=<?php echo time(); ?>"></script>

<!--------------------------------PHP Codes Starts Here----------------------------->
<?php
	
	if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_GET['user_id']) &&  isset($_GET['emp_id'])){
	    $user_id = $_GET['user_id']; // get passed user_id
	    $emp_id = $_GET['emp_id']; // get passed user_id
	} 
	else{echo "<script>window.location.replace('accounts/login.php');</script>";}
	
	$employee_no = 0;

	// FUNCTION SELECT OPTION
	function selected($value,$option){
		if ($value === $option) {
			echo 'selected = "selected"';
		}
	}

	// DISPLAY EMPLOYEE INFO BASED FROM PASSED ID (WINDOW.OPEN)
	if (isset($_GET['emp_id'])) {
		$emp_id = $_GET['emp_id'];
		$con = mysql_connect();
		$query = 'SELECT * FROM `employee`';
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		if ($count > 0 ) {
			while($row_emp = mysqli_fetch_array($result)){
				if (password_verify($row_emp['employee_id'],$emp_id)) {
					//fetch values
					$employee_no = $row_emp['employee_no'];
					$fname = $row_emp['fname'];
					$mname = $row_emp['mname'];
					$lname = $row_emp['lname'];
					$suffix = $row_emp['suffix'];
					$department = $row_emp['department'];
					$designation = $row_emp['designation'];
					$picpath = $row_emp['picpath'];
				}
			}
		}

		$query2 = 'SELECT * FROM `account` WHERE `employee_no` = "'.$employee_no.'" ';
		$res = mysqli_query($con,$query2);

		while($row_acc = mysqli_fetch_array($res)){
			$username = $row_acc['username'];
			$user_type = $row_acc['user_type'];
			$user_status = $row_acc['user_status'];
			$user_password = $row_acc['user_password'];
		}

	}// END

	# Update
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if (isset($_POST['update'])) {
			//get values
			$emp_id = $_GET['emp_id'];
			$username = $_POST["username"];
			$password = password_hash($_POST["password"],PASSWORD_DEFAULT);
			$user_type = $_POST["type"];
			$user_status = $_POST["status"];
			$employee_no = $_POST["employee_no"];

			// Validate if username already exist except with current username
			$con = mysql_connect();
			$query1 = 'SELECT * FROM `account` WHERE username = "'.$username.'" ';
			$res1 = mysqli_query($con,$query1);
			$invalid_user = false;
			while ($row_user = mysqli_fetch_assoc($res1)) {
				if ($row_user['employee_no'] != $employee_no) {
					$invalid_user = true;
				}
			}
			//validate if the user changed the password
			$query_pass = "SELECT * FROM `account` WHERE employee_no = '".$employee_no."' AND  user_password = '".$_POST["password"]."' ";
			$res_pass = mysqli_query($con,$query_pass);
			if (mysqli_num_rows($res_pass) > 0) {
				$and = "";
			}
			else{
				$and = "user_password = '$password',";
			}
			
			//
			if ($invalid_user == false) {

				//update account 
				$query = "UPDATE account SET username = '$username', $and user_type = '$user_type', user_status = '$user_status' WHERE employee_no = '$employee_no';";
				if($con -> query($query) === TRUE){
					echo "<script>alert('Account Updated Successful');window.location.replace('index.php?page=user&user_id=".$user_id."');</script>";
				}
				else{
					echo "<script>alert('Error ".$query."  ".$con->error."')</script>";
				}	
			}
			else{
				$_SESSION['invalid'] = 'true';

			}
			$con->close();
		}
		else if(isset($_POST['cancel'])){
		    echo "<script>window.location.replace('index.php?page=user&user_id=".$user_id."');</script>";
		}
		else if (isset($_POST['btn_ok'])) {
			//delete emp
			$con = mysql_connect();
			$query = "DELETE FROM employee WHERE employee_no = '$employee_no' ";
			$query2 = "DELETE FROM account WHERE employee_no = '$employee_no' ";
			if (mysqli_query($con,$query) && mysqli_query($con,$query2)) {
			    echo "<script>window.location.replace('index.php?page=user&user_id=".$user_id."');</script>";
			}
		}
	}

?>
<!---------------------PHP Codes Ends Here--------------------->

<div class="main-wrapper">
	<div class="wrapper">
		<!---------Personal Information ------------>
		<h2 align="center">Update User Information</h2>
		<fieldset class="personal_wrapper">

			<table width="990"">
				<tr>
					<th align="center">
						<h1>User Account Information</h1>
					</th>
				</tr>
			</table>

			<!--Employee Content Left-->
			<div id="employee_left">
				<img src="pages/uploads/<?php echo $picpath ?>" id="profile_picture">
			</div>

		<!--Form-->
		<form method="POST">
				<!--Employee Content Right-->
				<div id="employee_right">
					<!--Employee Table Right-->
					<table>
						<tr>
							<td>First Name<br>
								<input type="text" name="first_name" placeholder="First Name" value="<?php echo $fname ?>" readonly>
							</td>
							<td>Middle Name<br>
								<input type="text" name="middle_name" placeholder="Middle Name" value="<?php echo $mname ?>" readonly>
							</td>
							<td>Last Name<br>
								<input type="text" name="last_name" placeholder="Last Name" value="<?php echo $lname ?>" readonly>
							</td>
							<td>Suffix<br>
								<input type="text" name="suffix" placeholder="Suffix" value="<?php echo $suffix ?>" readonly>
							</td>
						</tr>

						<tr>
							<td>Department<br>
								<input type="text" name="department" placeholder="Department" value="<?php echo $department ?>" readonly>
							</td>
							<td>Designation<br>
								<input type="text" name="designation" placeholder="Designation" value="<?php echo $designation ?>" readonly>
							</td>
							<td>User Type<br>
								<select name="type" required >
									<option <?php selected($user_type,""); ?> value="">Select One</option>
									<option <?php selected($user_type,"Administrator"); ?> value="Administrator">Administrator</option>
									<option <?php selected($user_type,"Cashier (1)"); ?> value="Cashier (1)">Cashier (1)</option>
									<option <?php selected($user_type,"Cashier (2)"); ?> value="Cashier (2)">Cashier (2)</option>
									<option <?php selected($user_type,"Accountant"); ?> value="Accountant">Accountant</option>
								</select>
							</td>
							<td>User Status<br>
								<select name="status" required >
									<option <?php selected($user_status,""); ?> value="">Select One</option>
									<option <?php selected($user_status,"Active"); ?>  value="Active">Active</option>
									<option <?php selected($user_status,"Inactive"); ?>  value="Inactive">Inactive</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Employee Number<br>
								<input type="text" name="employee_no" placeholder="Employee Number" value="<?php echo $employee_no ?>" readonly>
							</td>
							<td>Username<br>
								<input type="text" name="username" id="username" placeholder="Username" oninput="setCustomValidity('')" value="<?php echo $username ?>" required>
							</td>
							<td>Password<br>
								<input type="password" name="password" placeholder="Password" id="pass" oninput="setCustomValidity('')" value="<?php echo $user_password ?>" required>
							</td>
							<td>Confirm Password<br>
								<input type="password" name="confirm_password" placeholder="Confirm Password" oninput="setCustomValidity('')" id="confirm" value="<?php echo $user_password ?>" required>
							</td>
						</tr>

					</table>
					<!--End of Employee Table Right-->

					<!--Buttons-->
					<div class="button" style="margin-top: -3%;margin-bottom: 20%;">
						<center>
							<button name="update" onclick="pass_validation()">Update</button>
							</form> <!-- End of Form-->
							<form method="POST">
								<button name="cancel">Cancel</button>
							</form>
							<button id="delete" type="button" style="float: left;margin-left: 3%;">Delete</button>
						</center>
					</div>
					<!--End of Buttons-->
				</div>
				<!--End of Employee Content Right-->

				<!-----------Modal Message Delete-------------->
				<div id="modal_message" class="modal_message">
					<div class="modal_message_content">
			  			<div class="modal_message_header">
			    			<h3>*Confirm Dialog*</h3>
			  			</div>
				 		<div class="modal_message_body">
				  			<center><label id="msg">Are You Sure You Want To Delete?</label></center>
				 		</div>
						<div class="modal_message_footer">
							<div id="delete_option">
								<center>
					  				<form method="POST">
					  					<button id="delete_ok" name="btn_ok" >Ok</button>
					  					<button id="delete_cancel">Cancel</button>
					  				</form>
				  				</center>
							</div>
			 	 		</div>
					</div>
				</div>
				<!-----------End of Modal Message-------------->

				<!-----------Modal Message-------------->
				<div id="message" class="modal_message">
					<div class="modal_message_content">
					  	<div class="modal_message_header">
					    	<h3>*Message Dialog*</h3>
					  	</div>
						 <div class="modal_message_body">
						  	<center>
						  		<label id="msg">Username Already Exist</label>
						  	</center>
						 </div>
						<div class="modal_message_footer">
						  	<center>
						  		<button id="btn_ok" onclick="document.getElementById('message').style = 'display:none;';">Ok</button>
						  	</center>
					 	 </div>
					</div>
				</div>
				<!-----------End of Modal Message-------------->
		</fieldset>
		<!--End of Personal Information-->
	</div>
</div>

<!---------------------------JS SCRIPT Starts Here---------------------->
<script>
	function pass_validation(){
		// initialization
		var user = document.getElementById('username');
		var pass = document.getElementById('pass');
		var cpass = document.getElementById('confirm');
		// Regular Expressions
		var special_characters = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
		var upper = new RegExp("[A-Z]");
		var lower = new RegExp("[a-z]");
		// Validate Password
		if (user.value.match(special_characters) && user.value != '') {
			user.setCustomValidity("Special Characters Not Allowed");
		}
		if (user.value.length < 4 && user.value != '') {
			user.setCustomValidity("Username must be 4 Characters");
		}
		if (pass.value.length < 8 && pass.value != '') {
			pass.setCustomValidity("Password must be 8 Characters");
		}
		else if ((!(pass.value.match(special_characters)) | !(pass.value.match(/\d/)) | !(pass.value.match(upper)) | !(pass.value.match(lower)))  &&  pass.value != '') {
			pass.setCustomValidity("Password must contain atleast one special characters, number, upper, and lower case");
		}
		else if (pass.value != cpass.value) {
			cpass.setCustomValidity("Password and Confirm Password does not match.");
		}
	}//end
</script>
<!---------------------------JS SCRIPT Ends Here---------------------->

<!---------------------------PHP Codes Starts Here---------------------->
<?php
	if (isset($_SESSION['invalid']) && $_SESSION['invalid'] == 'true') {
		echo "<script>document.getElementById('message').style = 'display:block;'</script>";
		$_SESSION['invalid'] = 'false';
	}
?>
<!---------------------------PHP Codes Ends Here---------------------->

