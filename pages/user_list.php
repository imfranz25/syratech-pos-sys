
	<link rel="stylesheet" type="text/css" href="styles/employee.css?v=<?php echo time(); ?>">
	<!-- jQuery library -->
	<script src="js/jquery.js?v=<?php echo time(); ?>"></script>
	<?php 
	  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_GET['user_id'])){
	    $user_id = $_GET['user_id']; // get passed user_id
	  } 
	  else{echo "<script>window.location.replace('accounts/login.php');</script>";}
	?>

	<!--CSS Starts Here-->
	<style>
		body{
			background-color: rgb(0,40,40,.8);
		}
		.container{
			margin: 0% 5% 0% 0%;
			width: 1000px
		}
		table thead{
			background-color: rgb(23,183,183,.4);
			font-size: 16px;
		}
		table thead tr th{
			color: #fff;
			text-shadow: 3px 2px black;
			padding: 10px;
			border:2px solid skyblue;
			border-left: 1px solid cyan;
			border-right: 1px solid cyan;
		}
		table td{
			font-size: 14px;
			color: white;
			text-shadow: 2px 1px black;
			width: 100px;
			height: 60px;
			text-align: center;
		}
		table{
			background-color: rgb(0,20,20,.9);
			border:1px solid skyblue;
		}
		h2{
			margin-top: 30px;
			margin-bottom: 20px;  
			font-size: 34px;
			border:cyan 2px solid;
			padding: 30px;
			background-color: rgb(0,40,40,.8);
			text-shadow: 3px 2px maroon;
			color: white;
			border-radius: 30px 30px 10px 10px;
			text-decoration:underline solid white;
			cursor: pointer;
		}
		h2:hover{
			transition: .6s;
			color: cyan;
			text-decoration-color: cyan;
		}
		h2 label{cursor: pointer;}
		h2{text-align: left;text-decoration: none;font-size: 16px;}
		table tbody tr td{
			border-radius: 2px;
			border-bottom:cyan 1px solid;
			border-top:cyan 1px solid;
		}

		.tr-data:hover{
			font-weight: bolder;
			cursor: pointer;
			background-color: rgb(150,150,150,.4);
			text-decoration:underline solid white;
		}
		.table_emp{
			height: 360px;
			overflow-y: scroll;
			background-color: rgb(0,0,0,.6);
		}
		.table-wrapper{
			border:cyan 1px solid;
			border-radius: 5px;
		}
		#create,#search,#btnsearch{
			padding: 0;
			padding: 10px 20px 10px 20px;
			float:none;
			border:1px solid cyan;
			border-radius: 10px;
			box-shadow: 3px 2px cyan;
		}
		#btnsearch,#create{
			font-weight: bold;
			cursor: pointer;
			color: white;
			background-color: rgba(0,0,90,.2);
		}
		#search{
			border-radius: 5px;
			margin-left: 8%;
			width: 280px;
			margin-right: 1%;
			height: 35px;
			font-size: 12px;
		}
		#create{
			margin-left: 3%;
			margin-right: 0;
			float: right;
		}
		#home{font-size: 25px;margin-right: 25%;}
	</style>
	<!--CSS Ends Here-->

	<!--JS Starts Here-->
	<script>

		// FILTER ACTIVITY LOG BY SEARCH
		function filter_search(){
			var input = document.getElementById('search');
			var filter = input.value.toUpperCase();
			var table = document.getElementById('table_emp');
			var table_row = document.getElementsByTagName('tr');
			var count = 0;

			for (var i = 0; i < table_row.length; i++) {
				var table_data = table_row[i].getElementsByTagName('td')[1];
				if (table_data) {
					var data_value = table_data.textContent || table_data.innerText;
					if (data_value.toUpperCase().indexOf(filter) > -1) {
						table_row[i].style.display = "";
						count = count + 1;
					}
					else{
						table_row[i].style.display = "none";
					}
				}
			}
			if (count < 1 && input != "") {alert("No Employee Found !");}
		}//END

		$(document).ready(function(){
			$('.table_emp table tbody tr').click(function(){
				var  id = $(this).attr('row_id');
				var  user_id= $(this).attr('user_id');
				window.location.replace("index.php?page=update_user&emp_id=" +id+"&user_id="+user_id);
			});
			$('#home').click(function(){
				window.location.replace("index.php?page=user&user_id=<?php echo $user_id; ?>");
			});
		});
		
	</script>
	<!--JS Ends Here-->


	<div class="container">
		<h2 align="center"><label id="home">Syra Tech User List</label>
			<input type="search" id="search"  placeholder="Search By Employee Name" />
			<button id="btnsearch" onclick="filter_search()">Search</button>
		</h2>	
		<div class="table-wrapper">
			<div class="table_header">
				<div class="table_emp">
				<table border="0" style="width:100%;">
					<thead>
						<tr>
							<th width="100">Employee Number</th>
							<th width="290">Employee Name</th>
							<th width="200">Username</th>
							<th width="100">User Type</th>
							<th width="100">User Status</th>
							<th width="100">Department</th>
							<th width="100">Designation</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$con =  mysql_connect();
							$query = 'SELECT * FROM account';
							$result = $con-> query($query);
							//$output = array();

							if($result-> num_rows > 0){
							//output  data of each row
								while ($row = $result-> fetch_assoc()) {
									$query2 = 'SELECT * FROM employee WHERE employee_no = "'.$row["employee_no"].'"';
									$res = mysqli_query($con,$query2);

									while($row_emp = mysqli_fetch_assoc($res)){
										if ($row_emp["suffix"] == "N/A") {
											$suffix = "";
										}
										else{
											$suffix = $row_emp["suffix"];
										}
										$emp_no = password_hash($row_emp["employee_id"],PASSWORD_DEFAULT);
										echo "<tr row_id='" .$emp_no. "' user_id='".$user_id."' class = 'tr-data'>
											<td id='ye' style = 'width:98px;color:cyan;text-decoration:underline;'>" . $row["employee_no"] . "</td>
											<td style = 'width:237px'>" .$row_emp["fname"] . " " .$row_emp["mname"] . "
											" . $row_emp["lname"] . " ". $suffix . "</td>
											<td style = 'width:173px'>" . $row["username"] . "</td>
											<td style = 'width:96px'>" . $row["user_type"] . "</td>
											<td style = 'width:97px'>" . $row["user_status"] . "</td>
											<td style = 'width:98px'>" . $row_emp["department"] . "</td>
											<td style = 'width:84px'>" . $row_emp["designation"] . "</td>
											
										</tr>";
									}
									

								}
								echo "</table>";	
							}
							$con-> close();
						?>	
					</tbody>	
				</table>
			</div>	
		</div>
	</div>

