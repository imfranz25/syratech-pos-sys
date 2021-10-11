<?php
    session_start();
	include_once 'connection.php';
	$con = mysql_connect(); // connection
    if(isset($_POST['pass'])){
        $output=1;
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$query = "SELECT * FROM account WHERE username = '$user'";
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$dbpass = $row['user_password'];
				if (password_verify($pass,$dbpass)) {
					$user_id = password_hash($row['employee_no'],PASSWORD_DEFAULT);
					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['authenticated'] = 'true';
					$_SESSION['user_id'] = $user_id;
					$_SESSION['username'] = $user;	
					$_SESSION['timeout'] = time();
					$output=0;
				}
			}
		}
        echo json_encode($output);
    }
	//End of Login Form 
?>