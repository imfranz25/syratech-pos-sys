<!DOCTYPE html>
<html>
<head>

	<title>Add Employee</title>
	<!--CSS Source-->
	<link rel="stylesheet" type="text/css" href="styles/employee.css?v=<?php echo time(); ?>">
	<!--JQUERY Library-->
	<script src="js/jquery.js"></script>
	<!--JS Source-->
	<script src="js/employee.js?v=<?php echo time(); ?>"></script>

</head>
<body>

<!--------------------------------PHP Codes Starts Here----------------------------->
<?php
	ob_start();
	if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_GET['user_id'])){
	    $user_id = $_GET['user_id']; // get passed user_id
	} 
	else{;
		echo "<script>window.location.replace('accounts/login.php');</script>";
	}


	//INITIALIZATION
	$employee_number = "";
	$first_name = "";
	$middle_name = "";
	$last_name = "";
	$suffix = "";
	$date_of_birth = date("Y-m-d");
	$gender = "";
	$nationality = "Filipino";
	$civil_status = "";
	$department = "";
	$designation = "";
	$qualified_dependent_status = "";
	$employee_status = "";
	$paydate = date("Y-m-d");
	$contact_number = "";
	$email = "";
	$other_social_media = "";
	$social_id = "";
	$address_1 = "";
	$address_2 = "";
	$city = "";
	$state = "";
	$country = "Philippines";
	$zip_code = "";
	$pic_path = "admin.png";

	//modal & modal button
	$btn_modal = 'false';
	$save_success = false;
	$save_failed = false;
	$invalid_emp_no = false;

	if($_SERVER["REQUEST_METHOD"] == "POST"){

	
		if (isset($_POST['save'])) {
			// IF TRUE (READY TO PUSH)
			if ($_POST['save'] === 'true') {
				//get values
				get_values();

			//move uploaded picture
			if(file_exists('pages/'.$pic_path)){
				$pic_filename = explode('temp/', $pic_path)[1];
				rename('pages/'.$pic_path, "pages/uploads/$pic_filename");
				$pic_path = $pic_filename;
			}


			//save employee record to database
			$con = mysql_connect();
			$check_emp_no = "SELECT * FROM employee WHERE employee_no = '$employee_number' ";
			$result = mysqli_query($con,$check_emp_no);
			$count = mysqli_num_rows($result);
			// Insert Employee Query
			$query = "INSERT INTO employee (employee_no, fname, mname, lname, suffix, birth_date, gender, nationality, civil_status, department, designation, qualified_dependent_status, employee_status, pay_date, contact_no, email_address, other_social_media_account, social_media_account_id, address_line1, address_line2, municipality, state_province, country, zip_code, picpath) VALUES ('$employee_number', '$first_name', '$middle_name', '$last_name', '$suffix', '$date_of_birth', '$gender', '$nationality', '$civil_status', '$department', '$designation', '$qualified_dependent_status', '$employee_status', '$paydate', '$contact_number', '$email', '$other_social_media', '$social_id', '$address_1', '$address_2', '$city', '$state', '$country', $zip_code, '$pic_path')";
			// Insert Account Query
			$query1 = "INSERT INTO account (employee_no) VALUES ('$employee_number')";

			// TEST IF EMPLOYEE NUMBER IS EXISTING
			if($count == 0){
				if(($con -> query($query) === TRUE) && ($con -> query($query1) === TRUE)){	
					$save_success = true;
					$btn_modal = 'true';
				}
				else{
				    echo "<script>alert('Invalid Zip Code !')</script>";
					$save_failed = true;
				}
			}
			else{
				//show modal invalid employee number
				$invalid_emp_no = true;
			}
			
			// close database connection
			$con->close();
			}
		}
		else if(isset($_POST['cancel'])){
			echo "<script>window.location.replace('index.php?page=employee&user_id=".$user_id."');</script>";
		}

		if (isset($_POST['btn_ok'])) {
			//get values to display existing inputs
			get_values();
			if ($_POST['btn_ok'] === 'true') {
				echo "<script>window.location.replace('index.php?page=employee&user_id=".$user_id."');</script>";
			}
		}
	}

	function get_values(){
		global $employee_number,$first_name,$middle_name,$last_name,$suffix,$date_of_birth,$gender,$nationality,$civil_status,$department,$designation,$qualified_dependent_status,$employee_status,$paydate,$contact_number,$other_social_media,$email,$other_social_media,$social_id,$address_1,$address_2,$city,$state,$country,$zip_code,$pic_path;
			
			//get values
			$employee_number = $_POST["employee_number"];
			$first_name = $_POST["first_name"];
			$middle_name = $_POST["middle_name"];
			$last_name = $_POST["last_name"];
			$suffix = $_POST["suffix"];
			$date_of_birth = $_POST["date_of_birth"];
			$gender = $_POST["gender"];
			$nationality = $_POST["nationality"];
			$civil_status = $_POST["civil_status"];
			$department = $_POST["department"];
			$designation = $_POST["designation"];
			$qualified_dependent_status = $_POST["qualified_dependent_status"];
			$employee_status = $_POST["employee_status"];
			$paydate = $_POST["pay_date"];
			$contact_number = $_POST["contact_number"];
			$email = $_POST["email"];
			$other_social_media = $_POST["social_media"];
			$social_id = $_POST["social_id"];
			$address_1 = $_POST["address_1"];
			$address_2 = $_POST["address_2"];
			$city = $_POST["city"];
			$state = $_POST["state"];
			$country = $_POST["country"];
			$zip_code = $_POST["zip_code"];
			$pic_path = $_POST["pic_path"];
	}

	// SET SELECTED OPTION COMBO BOX
	function selected($value,$option){
		if ($value === $option) {
			echo 'selected = "selected"';
		}
	}
?>
<!--------------------------------PHP Codes Ends Here----------------------------->
<div class="main-wrapper">
	<div class="wrapper">
	<!---------Personal Information ------------>
	<h2 align="center">Add Employee</h2>	
	<fieldset class="personal_wrapper">
			<table width="1000"">
				<tr>
					<th align="center">
						<h1>Personal Information</h1>
					</th>
				</tr>
			</table>
			<!--Employee Content Left-->
			<div id="employee_left">
				<!--Form Upload-->
				<form id="choose_profile" method="POST" enctype="multipart/form-data">
						<img src="pages/uploads/<?php echo $pic_path ?>" id="profile_picture">
						<input type="file" id="upload_file" name="upload_file" required />
				</form>
				<!--End of Form-->
			</div>
	<!--Form-->
	<form method="POST">

			<!--Employee Content Right-->
			<div id="employee_right">
				<!--Employee Table Right-->
				<table>
					<input type="hidden" name="pic_path" id="pic_path" value="<?php echo $pic_path ?>" required>
					<tr>
						<td>First Name<br>
							<input type="text" name="first_name" placeholder="First Name" value="<?php echo $first_name ?>" required>
						</td>
						<td>Middle Name<br>
							<input type="text" name="middle_name" placeholder="Middle Name" value="<?php echo $middle_name ?>" required>
						</td>
						<td>Last Name<br>
							<input type="text" name="last_name" placeholder="Last Name" value="<?php echo $last_name ?>" required>
						</td>
						<td>Suffix<br>
							<input type="text" name="suffix" placeholder="Suffix" value="<?php echo $suffix ?>" required>
						</td>
					</tr>
					<tr>
						<td>Date of Birth<br>
						<input type="date" name="date_of_birth" required value="<?php echo date("Y-m-d",strtotime($date_of_birth)); ?>">
						</td>
						<td>Gender<br>
							<select name="gender" id="gender" required >
								<option value="">Select One</option>
				    			<option <?php selected($gender,"Male"); ?> value="Male">Male</option>
				    			<option <?php selected($gender,"Female"); ?> value="Female">Female</option>
						 	</select>
						</td>
						<td>Nationality<br>
							<select name="nationality" id="nationality" required>
			    				<option value ="">Select One</option>
			    				<script>option_nationality('<?php echo $nationality; ?>');</script>
						 	</select>
						</td>
						<td>Civil Status<br>
							<select name="civil_status" id="civil_status"  required>
								<option value ="">Select One</option>
				    			<option <?php selected($civil_status,"Single"); ?> value="Single">Single</option>
				    			<option <?php selected($civil_status,"Married"); ?> value="Married">Married</option>
				    			<option <?php selected($civil_status,"Seperated"); ?> value="Seperated">Seperated</option>
				    			<option <?php selected($civil_status,"Widowed"); ?> value="Widowed">Widowed</option>
						 	</select>
						</td>
					</tr>
					<tr>
						<td>Department<br>
							<input type="text" name="department" placeholder="Department" value="<?php echo $department ?>" required>
						</td>
						<td>Designation<br>
							<input type="text" name="designation" placeholder="Designation" value="<?php echo $designation ?>" required>
						</td>
						<td colspan="2">Qualified Dependent Status<br>
							<select name="qualified_dependent_status" required >
			    				<option value="">Select One</option>
			    				<option <?php selected($qualified_dependent_status,"Z"); ?> value="Z">Z or Single</option>
								<option <?php selected($qualified_dependent_status,"S"); ?> value="S">S or ME</option>
								<option <?php selected($qualified_dependent_status,"S1"); ?> value="S1">S1 or ME1</option>
								<option <?php selected($qualified_dependent_status,"S2"); ?> value="S2">S2 or ME2</option>
								<option <?php selected($qualified_dependent_status,"S3"); ?> value="S3">S3 or ME3</option>
								<option <?php selected($qualified_dependent_status,"S4"); ?> value="S4">S4 or ME4</option>
						 	</select>
						</td>
					</tr>
					<tr>
						<td>Employee Status<br>
							<input type="text" name="employee_status" placeholder="Employee Status" value="<?php echo $employee_status ?>" required>
						</td>
						<td>Paydate<br>
							<input type="date" name="pay_date" value="<?php echo date("Y-m-d",strtotime($paydate)); ?>" required>
						</td>
						<td colspan="2">Employee Number<br>
							<input type="text" oninput="setCustomValidity('');" id="emp_no" name="employee_number" placeholder="Employee Number" value="<?php echo $employee_number ?>" required>
						</td>
					</tr>
				</table>
				<!--End of Employee Table Right-->
			</div>
			<!--End of Employee Content Right-->
	
	<!--Contact Information-->
	<div class="contact_wrapper">
		<div id="contact">
			<!--Contact (Table)-->
			<table id="contact_table">
				<tr>
					<th colspan="2" align="center">
						<h1>Contact Information</h1>
					</th>
				</tr>
				<tr>
					<td>Contact Number<br>
						<input type="text" name="contact_number" placeholder="Contact No" value="<?php echo $contact_number ?>" required>
					</td>
				</tr>
				<tr>
					<td>E-mail<br>
						<input type="email" name="email" placeholder="E-mail" value="<?php echo $email ?>" required>
					</td>
				</tr>
				<tr>
					<td>Other(Social Media)<br>
						<select name="social_media" id="social_media" required ">
		    				<option value="">Select One</option>
		    				<option <?php selected($other_social_media,"facebook"); ?> value="facebook">Facebook Messenger</option>
							<option <?php selected($other_social_media,"whatsapp"); ?> value="whatsapp">WhatsApp Messenger</option>
							<option <?php selected($other_social_media,"wechat"); ?> value="wechat">WeChat</option>
							<option <?php selected($other_social_media,"telegram"); ?> value="telegram">Telegram</option>
							<option <?php selected($other_social_media,"snapchat"); ?> value="snapchat">Snapchat</option>
							<option <?php selected($other_social_media,"other"); ?> value="other">Other</option>
					 	</select>
					</td>
				</tr>
				<tr>
					<td>Social Media Account ID/No.<br>
						<input type="text" id="social_id" oninput="setCustomValidity('');" name="social_id" placeholder="Social Media Account ID" value="<?php echo $social_id ?>" required>
					</td>
				</tr>
			</table>
			<!--End of Contact (Table)-->
		</div>
	</div>
	<!--End of Contact Information-->
	
	<!--Address Information-->
	<div class="address_wrapper">
		<div id="address">
			<!--Address (Table)-->
			<table id="address_table">
				<tr>
					<th colspan="2" align="center">
						<h1>Address</h1>
					</th>
				</tr>
				<tr>
					<td colspan="2" class="long">Address Line 1<br>
						<input type="text" name="address_1" placeholder="Address Line 1" value="<?php echo $address_1 ?>" required>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="long">Address Line 2<br>
						<input type="text"  name="address_2" placeholder="Address Line 2" value="<?php echo $address_2 ?>" required>
					</td>
				</tr>
				<tr>
					<td>City/Municipality<br>
						<input type="text" name="city" placeholder="City/Municipality" value="<?php echo $city ?>" required>
					</td>
					<td>State/Province<br>
						<input type="text" name="state" placeholder="State/Province" value="<?php echo $state ?>" required>
					</td>
				</tr>
				<tr>
					<td>Country<br>
						<select name="country" id="country" required >
		    				<option>Select One</option>
		    				<script>option_nations('<?php echo $country; ?>');</script>
					 	</select>
					</td>
					<td>Zip code<br>
						<input type="text" id="zip" oninput="setCustomValidity('');" name="zip_code" placeholder="Zip Code" value="<?php echo $zip_code ?>" required>
					</td>
				</tr>
			</table>
		<!--End of Address (Table)-->
		</div>
		<!--Buttons-->
		<div class="button" id="button-create" >
			<center>
				<button id="save" name="save" value="true" onclick="pass_validation()">Save</button>
				<button formnovalidate name="cancel">Cancel</button>
			</center>
		</div>
		<!--End of Buttons-->
	</div>
	<!--End of Address Information-->
	
	</fieldset>
	<!--End of Personal Information-->

	<!-----------Modal Message-------------->
	<div id="modal_message" class="modal_message">
		<div class="modal_message_content">
		  	<div class="modal_message_header">
		    	<h3>*Message Dialog*</h3>
		  	</div>
			 <div class="modal_message_body">
			  	<center><label id="msg"></label></center>
			 </div>
			<div class="modal_message_footer">
			  	<center>
			  		<button id="btn_ok" name="btn_ok" value = "<?php echo $btn_modal ?>">Ok</button>
			  	</center>
		 	 </div>
		</div>
	</div>
	<!-----------End of Modal Message-------------->

	</div>
	</form>
</div>


<script>
	function pass_validation(){
		// initialization
		var zip = document.getElementById('zip');
		var emp_no = document.getElementById('emp_no');
		var social_id = document.getElementById('social_id');

		// Validate Input
		if (!(emp_no.value.match(/\d/)) && emp_no.value != '') {
			emp_no.setCustomValidity("Invalid Employee Number");
		}
		else if (!(social_id.value.match(/\d/)) && social_id.value != '') {
			social_id.setCustomValidity("Invalid Social ID");
		}
		else if (!(zip.value.match(/\d/)) && zip.value != '') {
			zip.setCustomValidity("Invalid Zip Code");
		}
		
	}//end

	$(document).ready(function(){
		$('#upload_file').change(function(e){
		var formData = new FormData($('#choose_profile')[0]);
		$.ajax({
			type: 'POST',
			url: 'pages/upload_pic.php',
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(result){
				if(result.ok){
					document.getElementById('profile_picture').src = "pages/" + result.temp_path;
					$('#pic_path').val(result.temp_path);
				}
				else{
					alert('Error encountered while trying to upload the picture!');
				}
			}

		});
		
		return false;
	});
	});
</script>

<!-----------Modal Message Section (PHP)-------------->
	<?php
		if ($save_success === true) {
			echo "<script> show_modal('Saved Successfully !!!');</script>";
			$save_success = false;
		}
		else if ($save_failed === true) {
			echo "<script> show_modal('Server Error !!!');</script>";
			$save_failed = false;
		}
		else if ($invalid_emp_no === true) {
			echo "<script> show_modal('Employee Number Already Exist !!!');</script>";
			$invalid_emp_no = false;
		}
	?>
	<!-----------End of Modal Message Section (PHP)-------------->



