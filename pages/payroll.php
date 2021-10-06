
	<!--CSS Source-->
	<link rel="stylesheet" type="text/css" href="styles/payroll.css?v=<?php echo time(); ?>">



<!--PHP Codes Starts Here-->
<?php
	if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username'])  &&  isset($_GET['emp_id'])){
	    $user_id = $_SESSION['user_id']; // get passed user_id
	    $emp_id = $_GET['emp_id']; // get passed user_id
	} 
	else{echo "<script>window.location.replace('accounts/login.php');</script>";
	}


	if (isset($_GET['user_id'])) {
		$emp_id = $_GET['emp_id'];
		$con = mysql_connect();
		$query = 'SELECT * FROM `employee`';
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);

		if ($count > 0 ) {
			while($row = mysqli_fetch_array($result)){
				if (password_verify($row['employee_id'],$emp_id)) {
				
					//employee information
					$profile_picture = $row['picpath'];
					$first_name = $row['fname'];
					$middle_name = $row['mname'];
					$last_name = $row['lname'];
					$civil_status = $row['civil_status'];
					$designation = $row['designation'];
					$qualified_dependent_status = $row['qualified_dependent_status'];
					$paydate = date("Y-m-d",strtotime($row['pay_date']));
					$employee_status = $row['employee_status'];
					$employee_number = $row['employee_no'];
					$department = $row['department'];

					//Basic Income
					$basic_income_rate = "";
					$basic_income_hour = "";

					//Honoranium Income
					$honoranium_income_rate = "";
					$honoranium_income_hour = "";

					//Other income
					$other_income_rate = "";
					$other_income_hour = "";

					//Contributions
					$sss_contribution = 0;
					$philhealth_contribution = 0;
					$pagibig_contribution = 100; //fix value of 100
					$income_tax_contribution = 0;

					//Loans
					$sss_loan = "";
					$pagibig_loan = "";
					$faculty_savings_deposit = "";
					$faculty_savings_loan = "";
					$salary_loan = "";
					$other_loan = "";

					//Outputs
					$basic_income_output = 0;
					$honoranium_income_output = 0;
					$other_income_output = 0;
					$gross_income_output = 0;
					$net_income_output = 0;
					$total_deduction_output = 0;
				}
			}
		}
	}
	/*------Initialization-------*/

	

	

	//SSS Contribution Function
	function sss_contribution($gross_income_output){
		//condition
	 	if($gross_income_output >= 1000 && $gross_income_output <= 1249){
			$sss_contribution = 73.70;
		}
		else if($gross_income_output >= 1250 &&  $gross_income_output <= 1749){
			$sss_contribution = 110.50;
		}
		else if($gross_income_output >= 1750 && $gross_income_output <= 2249){
			$sss_contribution = 147.30;
		}
		else if($gross_income_output >= 2250 && $gross_income_output <= 2749.99){
			$sss_contribution = 184.20;
		}
		else if($gross_income_output >= 2750 &&  $gross_income_output <= 3249.99){
			$sss_contribution = 221.00;
		}
		else if($gross_income_output >= 3250 && $gross_income_output <= 3749.99){
			$sss_contribution = 257.80;
		}
		else if($gross_income_output >= 3750 && $gross_income_output <= 4249.99){
			$sss_contribution = 294.70;
		}
		else if($gross_income_output >= 4250 && $gross_income_output <= 4749.99){
			$sss_contribution = 331.50;
		}
		else if($gross_income_output >= 4750 && $gross_income_output <= 5249.99){
			$sss_contribution = 368.30;
		}
		else if($gross_income_output >= 5250 && $gross_income_output <= 5749.99){
			$sss_contribution = 405.20;
		}
		else if($gross_income_output >= 5750 && $gross_income_output <=  6249.99){
			$sss_contribution = 442.00;
		}
		else if($gross_income_output >= 6250 && $gross_income_output <= 6749.99){
			$sss_contribution = 478.80;
		}
		else if($gross_income_output >= 6750 && $gross_income_output <= 7249.99){
			$sss_contribution = 515.70;
		}
		else if($gross_income_output >= 7250 && $gross_income_output <= 7749.99){
			$sss_contribution = 552.50;
		}
		else if($gross_income_output >= 7750 && $gross_income_output <= 8249.99){
			$sss_contribution = 589.30;
		}
		else if($gross_income_output >= 8250 && $gross_income_output <= 8749.99){
			$sss_contribution = 626.20;
		}
		else if($gross_income_output >= 8750 && $gross_income_output <= 9249.99){
			$sss_contribution = 663.00;
		}
		else if($gross_income_output >= 9250 && $gross_income_output <= 9749.99){
			$sss_contribution = 699.80;
		}
		else if($gross_income_output >= 9750 && $gross_income_output <= 10249.99){
			$sss_contribution = 736.70;
		}
		else if($gross_income_output >= 10250 && $gross_income_output <= 10749.99){
			$sss_contribution = 773.50;
		}
		else if($gross_income_output >= 10750 && $gross_income_output <= 11249.99){
			$sss_contribution = 810.30;
		}
		else if($gross_income_output >= 11250 && $gross_income_output <= 11749.99){
			$sss_contribution = 847.20;
		}
		else if($gross_income_output >= 11750 && $gross_income_output <= 12249.99){
			$sss_contribution = 884.00;
		}
		else if($gross_income_output >= 12250 && $gross_income_output <= 12749.99){
			$sss_contribution = 920.80;
		}
		else if($gross_income_output >= 12750 && $gross_income_output <= 13249.99){
			$sss_contribution = 957.70;
		}
		else if($gross_income_output >= 13250 && $gross_income_output <= 13749.99){
			$sss_contribution = 994.50;
		}
		elseif($gross_income_output >= 13750 && $gross_income_output <= 14249.99){
			$sss_contribution = 1031.30;
				}
		else if($gross_income_output >= 14250 && $gross_income_output <= 14749.99){
			$sss_contribution = 1068.20;
		}
		else if($gross_income_output >= 14750 && $gross_income_output <= 15249.99){
			$sss_contribution = 1105.00;
		}
		else if($gross_income_output >= 15250 && $gross_income_output <= 15749.99){
			$sss_contribution = 1141.80;
		}
		else if($gross_income_output >= 15750){
			$sss_contribution = 1178.70;
		}
		else{
			$sss_contribution = 0; 
		}
		return $sss_contribution; // return sss contri value
	}//end of sss contri function

	//Philhealth Contri Function
	function philhealth_contribution($gross_income_output){
		//condition
		if($gross_income_output <= 8999.99 && $gross_income_output >= 0){
			$philhealth_contribution = 100.00;
		}
		else if($gross_income_output >= 9000 && $gross_income_output <= 9999.99){
			$philhealth_contribution = 112.50;
		}
		else if($gross_income_output >= 10000 && $gross_income_output <= 10999.99){
			$philhealth_contribution = 125.00;
		}
		else if($gross_income_output >= 11000 && $gross_income_output <= 11999.99){
			$philhealth_contribution = 137.50;
		}
		else if($gross_income_output >= 12000 && $gross_income_output <= 12999.99){
			$philhealth_contribution = 150.00;
		}
		else if($gross_income_output >= 13000 && $gross_income_output <= 13999.99){
			$philhealth_contribution = 162.50;
		}
		else if($gross_income_output >= 14000 && $gross_income_output <= 14999.99){
			$philhealth_contribution = 175.00;
		}
		else if($gross_income_output >= 15000 && $gross_income_output <= 15999.99){
			$philhealth_contribution = 187.50;
		}
		else if($gross_income_output >= 16000 && $gross_income_output <= 16999.99){
			$philhealth_contribution = 200.00;
		}
		else if($gross_income_output >= 17000 && $gross_income_output <= 17999.99){
			$philhealth_contribution = 212.50;
		}
		else if($gross_income_output >= 18000 && $gross_income_output <= 18999.99){
			$philhealth_contribution = 225.00;
		}
		else if($gross_income_output >= 19000 && $gross_income_output <= 19999.99){
			$philhealth_contribution = 237.50;
		}
		else if($gross_income_output >= 20000 && $gross_income_output <= 20999.99){
			$philhealth_contribution = 250.00;
		}
		else if($gross_income_output >= 21000 && $gross_income_output <= 21999.99){
			$philhealth_contribution = 262.50;
		}
		else if($gross_income_output >= 22000 && $gross_income_output <= 22999.99){
			$philhealth_contribution = 275.00;
		}
		else if($gross_income_output >= 23000 && $gross_income_output <= 23999.99){
			$philhealth_contribution = 287.50;
		}
		else if($gross_income_output >= 24000 && $gross_income_output <= 24999.99){
			$philhealth_contribution = 300.00;
		}
		else if($gross_income_output >= 25000 && $gross_income_output <= 25999.99){
			$philhealth_contribution = 312.50;
		}
		else if($gross_income_output >= 26000 && $gross_income_output <= 26999.99){
			$philhealth_contribution = 325.00;
		}
		else if($gross_income_output >= 27000 && $gross_income_output <= 27999.99){
			$philhealth_contribution = 337.50;
		}
		else if($gross_income_output >= 28000 && $gross_income_output <= 28999.99){
			$philhealth_contribution = 350.00;
		}
		else if($gross_income_output >= 29000 && $gross_income_output <= 29999.99){
			$philhealth_contribution = 362.50;
		}
		else if($gross_income_output >= 30000 && $gross_income_output <= 30999.99){
			$philhealth_contribution = 375.00;
		}
		else if($gross_income_output >= 31000 && $gross_income_output <= 31999.99){
			$philhealth_contribution = 387.50;
		}
		else if($gross_income_output >= 32000 && $gross_income_output <= 32000.99){
			$philhealth_contribution = 400.00;
		}
		else if($gross_income_output >= 33000 && $gross_income_output <= 33999.99){
			$philhealth_contribution = 412.50;
		}
		else if($gross_income_output >= 34000 && $gross_income_output <= 34999.99){
			$philhealth_contribution = 425.00;
		}
		else{
			$philhealth_contribution = 437.50;
		}	
		return $philhealth_contribution; // return philhealth contri value	
	}//end of philhealth contri function

	function income_tax($qualified_dependents,$gross_income){

		// switch (options)
		switch(strtolower($qualified_dependents)){

			 //for zero exemption
			 case "z":
			 	 if($gross_income<=833 && $gross_income>=0){
				 	$tax_contri=((($gross_income-0)*.05) + 0);
				 } else if($gross_income>=834 && $gross_income<=2500){
				 	$tax_contri=((($gross_income-833)*.10) + 41.67);
				 } else if($gross_income>=2501 && $gross_income<=5833){
				 	$tax_contri=((($gross_income-2500)*.15) + 208.33);
				 } else if($gross_income>=5834 && $gross_income<=11667){
				 	$tax_contri=((($gross_income-5833)*.20) + 708.33);
				 } else if($gross_income>=11668 && $gross_income<=20833){
				 	$tax_contri=((($gross_income-11667)*.25) + 1875);
				 } else if($gross_income>=20834 && $gross_income<=41667){
				 	$tax_contri=((($gross_income-20834)*.30) + 4166.67);
				 } else{
				 	$tax_contri=((($gross_income-41667)*.32) + 10416.67);
				 }
				 break;

			 //for single or married with one qualified dependents
			 case "s":
				 if($gross_income<=50 && $gross_income>=0){
				 	$tax_contri=(($gross_income-0) + 0);
				 } else if($gross_income>=4167 && $gross_income<=5000){
				 	$tax_contri=((($gross_income-0)*.05) + 0);
				 } else if($gross_income>=5001 && $gross_income<=6667){
				 	$tax_contri=((($gross_income-5000)*.10) + 41.67);
				 } else if($gross_income>=6668 && $gross_income<=10000){
				 	$tax_contri=((($gross_income-6667)*.15) + 208.33);
				 } else if($gross_income>=10001 && $gross_income<=15833){
				 	$tax_contri=((($gross_income-10000)*.20) + 708.33);
				 } else if($gross_income>=15834 && $gross_income<=25000){
				 	$tax_contri=((($gross_income-15833)*.25) + 1875);
				 } else if($gross_income>=25001 && $gross_income<=45833){
				 	$tax_contri=((($gross_income-25000)*.30) + 4166.67);
				 } else{
				 	$tax_contri=((($gross_income-45833)*.32) + 10416.67);
				 }
				 //$tax_contri=100;
				 break;

			 //for single or married (1) with qualified dependents
			 case "s1":
				 if($gross_income>=0 && $gross_income<=74){
				 	 $tax_contri= 0;
				 } else if($gross_income>=75 && $gross_income<=6250){
				 	$tax_contri=(($gross_income-0) + 0);
				 } else if($gross_income>=6251 && $gross_income<=7083){
				 	$tax_contri=((($gross_income-6250)*.05) + 0);
				 } else if($gross_income>=7084 && $gross_income<=8750){
				 	$tax_contri=((($gross_income-7083)*.10) + 41.67);
				 } else if($gross_income>=8751 && $gross_income<=12083){
				 	$tax_contri=((($gross_income-8750)*.15) + 208.33);
				 } else if($gross_income>=12084 && $gross_income<=17917){
				 	$tax_contri=((($gross_income-12083)*.20) + 708.33);
				 } else if($gross_income>=17918 && $gross_income<=27083){
				 	$tax_contri=((($gross_income-17917)*.25) + 1875);
				 } else if($gross_income>=27084 && $gross_income<=47917){
				 	$tax_contri=((($gross_income-27083)*.30) + 4166.67);
				 } else{
				 	$tax_contri=((($gross_income-47917)*.32) + 10416.67);
				 }
				 //$tax_contri=100;
				 break;

			 //for single or married (2) with qualified dependents
			 case "s2":
				 if($gross_income>=0 && $gross_income<=99){
				 	 $tax_contri= 0;
				 } else if($gross_income>=100 && $gross_income<=8333){
				 	$tax_contri=(($gross_income-0) + 0);
				 } else if($gross_income>=8334 && $gross_income<=9167){
				 	$tax_contri=((($gross_income-8333)*.05) + 0);
				 } else if($gross_income>=9168 && $gross_income<=10833){
				 	$tax_contri=((($gross_income-9167)*.10) + 41.67);
				 } else if($gross_income>=10834 && $gross_income<=14167){
				 	$tax_contri=((($gross_income-10833)*.15) + 208.33);
				 } else if($gross_income>=14168 && $gross_income<=20000){
				 	$tax_contri=((($gross_income-14167)*.20) + 708.33);
				 } else if($gross_income>=20001 && $gross_income<=29167){
				 	$tax_contri=((($gross_income-20000)*.25) + 1875);
				 } else if($gross_income>=29168 && $gross_income<=50000){
				 	$tax_contri=((($gross_income-29167)*.30) + 4166.67);
				 } else{
				 	$tax_contri=((($gross_income-50000)*.32) + 10416.67);
				 }
				 //$tax_contri=100;
				 break;

			 //for single or married (3) with qualified dependents
			 case "s3":
				 if($gross_income>=0 && $gross_income<= 124){
				 	 $tax_contri= 0;
				 } else if($gross_income>=125 && $gross_income<=10417){
				 	$tax_contri=(($gross_income-0) + 0);
				 } else if($gross_income>=10418 && $gross_income<=11250){
				 	$tax_contri=((($gross_income-10417)*.05) + 0);
				 } else if($gross_income>=11251 && $gross_income<=12917){
				 	$tax_contri=((($gross_income-11250)*.10) + 41.67);
				 } else if($gross_income>=12918 && $gross_income<=16250){
				 	$tax_contri=((($gross_income-12917)*.15) + 208.33);
				 } else if($gross_income>=16251 && $gross_income<=22083){
				 	$tax_contri=((($gross_income-16250)*.20) + 708.33);
				 } else if($gross_income>=22084 && $gross_income<=31250){
				 	$tax_contri=((($gross_income-22084)*.25) + 1875);
				 } else if($gross_income>=31251 && $gross_income<=52083){
				 	$tax_contri=((($gross_income-31250)*.30) + 4166.67);
				 } else{
				 	$tax_contri=((($gross_income-52083)*.32) + 10416.67);
				 }
				 //$tax_contri=100;
				 break;

			 //for single or married (3) with qualified dependents
			 case "s4":
				 if($gross_income>=0 && $gross_income<= 149){
				 	 $tax_contri= 0;
				 } else if($gross_income>=150 && $gross_income<=12500){
				 	$tax_contri=(($gross_income-0) + 0);
				 } else if($gross_income>=12501 && $gross_income<=13333){
				 	$tax_contri=((($gross_income-12500)*.05) + 0);
				 } else if($gross_income>=13334 && $gross_income<=15000){
				 	$tax_contri=((($gross_income-13333)*.10) + 41.67);
				 } else if($gross_income>=15001 && $gross_income<=18333){
				 	$tax_contri=((($gross_income-15001)*.15) + 208.33);
				 } else if($gross_income>=18334 && $gross_income<=24167){
				 	$tax_contri=((($gross_income-18333)*.20) + 708.33);
				 } else if($gross_income>=24168 && $gross_income<=33333){
				 	$tax_contri=((($gross_income-24167)*.25) + 1875);
				 } else if($gross_income>=33334 && $gross_income<=54167){
				 	$tax_contri=((($gross_income-33333)*.30) + 4166.67);
				 } else{
				 	$tax_contri=((($gross_income-54167)*.32) + 10416.67);
				 }
				 //$tax_contri=100;
				 break;
			 default:
			 	$tax_contri=0;
			 }
		return $tax_contri; // return tax contri value
	}

		//method post
		if($_SERVER["REQUEST_METHOD"] == "POST"){

			//Button Calculate Gross Income
			if(isset($_POST['gross_income_button'])){
				//get all data via post method
				$basic_income_rate = $_POST['basic_income_rate'];
				$basic_income_hour = $_POST['basic_income_hour'];
				$honoranium_income_rate = $_POST['honoranium_income_rate'];
				$honoranium_income_hour = $_POST['honoranium_income_hour'];
				$other_income_rate = $_POST['other_income_rate'];
				$other_income_hour = $_POST['other_income_hour'];
				$sss_loan = $_POST['sss_loan'];
				$pagibig_loan = $_POST['pagibig_loan'];
				$faculty_savings_deposit = $_POST['faculty_savings_deposit'];
				$faculty_savings_loan = $_POST['faculty_savings_loan'];
				$salary_loan = $_POST['salary_loan'];
				$other_loan = $_POST['other_loan'];
				$qualified_dependent_status = $_POST['qualified_dependent_status'];
				//Calculate BI-HI-OI Outputs
				$basic_income_output = (float)$basic_income_rate * (float)$basic_income_hour;
				$honoranium_income_output = (float)$honoranium_income_rate * (float)$honoranium_income_hour;
				$other_income_output = (float)$other_income_rate * (float)$other_income_hour;
				//calculate Gross Income
				$gross_income_output =(float)$basic_income_output + (float)$honoranium_income_output + (float)$other_income_output;
				//Calculate SSS Contribution
				$sss_contribution=sss_contribution($gross_income_output);
				//Philhealth Contribution
				$philhealth_contribution=philhealth_contribution($gross_income_output);
				//Calculate income tax
				$income_tax_contribution=income_tax($qualified_dependent_status,$gross_income_output);
			}// end of nutton calculate
			//Button Calculate Net Income
			else if(isset($_POST['net_income_button'])){
				//get values
				$basic_income_rate = $_POST['basic_income_rate'];
				$basic_income_hour = $_POST['basic_income_hour'];
				$honoranium_income_rate = $_POST['honoranium_income_rate'];
				$honoranium_income_hour = $_POST['honoranium_income_hour'];
				$other_income_rate = $_POST['other_income_rate'];
				$other_income_hour = $_POST['other_income_hour'];
				$sss_loan = $_POST['sss_loan'];
				$pagibig_loan = $_POST['pagibig_loan'];
				$faculty_savings_deposit = $_POST['faculty_savings_deposit'];
				$faculty_savings_loan = $_POST['faculty_savings_loan'];
				$salary_loan = $_POST['salary_loan'];
				$other_loan = $_POST['other_loan'];
				$qualified_dependent_status = $_POST['qualified_dependent_status'];
				//Computation of BI Cut Off / HI Cut Off / OI Cut Off
				$basic_income_output = (float)$basic_income_rate * (float)$basic_income_hour;
				$honoranium_income_output = (float)$honoranium_income_rate * (float)$honoranium_income_hour;
				$other_income_output = (float)$other_income_rate * (float)$other_income_hour;
				//Gross Income
				$gross_income_output =(float)$basic_income_output + (float)$honoranium_income_output + (float)$other_income_output;
				//SSS Contribution
				$sss_contribution=sss_contribution($gross_income_output);
				//Philhealth Contribution
				$philhealth_contribution=sss_contribution($gross_income_output);
				//income tax
				$income_tax_contribution=income_tax($qualified_dependent_status,$gross_income_output);
				//Total Deductions
				 $total_deduction_output = (float)$sss_contribution + (float)$philhealth_contribution + (float)$pagibig_contribution + (float)$income_tax_contribution + (float)$sss_loan + (float)$pagibig_loan + (float)$faculty_savings_deposit + (float)$faculty_savings_loan + (float)$salary_loan + (float)$other_loan;
				//Net Income 
				$net_income_output = (float)$gross_income_output - (float)$total_deduction_output;
			}// end of Net Income Button

			//Buttton NEW
			else if(isset($_POST["new_button"])){
				//Basic Income
				$basic_income_rate = "";
				$basic_income_hour = "";
				//Honoranium Income
				$honoranium_income_rate = "";
				$honoranium_income_hour = "";
				//Other income
				$other_income_rate = "";
				$other_income_hour = "";
				//Contributions
				$sss_contribution = 0;
				$philhealth_contribution = 0;
				$pagibig_contribution = 100; //fix value of 100
				$income_tax_contribution = 0;
				//Loans
				$sss_loan = "";
				$pagibig_loan = "";
				$faculty_savings_deposit = "";
				$faculty_savings_loan = "";
				$salary_loan = "";
				$other_loan = "";
				//Outputs
				$basic_income_output = 0;
				$honoranium_income_output = 0;
				$other_income_output = 0;
				$gross_income_output = 0;
				$net_income_output = 0;
				$total_deduction_output = 0;

			} // end of Button NEW

			else if (isset($_POST["save_payroll"])) {
				//get values
				$employee_no = $_POST['employee_number'];
				$dependents = $_POST['qualified_dependent_status'];
				$paydate = $_POST['paydate'];
				//payroll 
				$basic_income_rate = $_POST['basic_income_rate'];
				$basic_income_hour = $_POST['basic_income_hour'];
				$honoranium_income_rate = $_POST['honoranium_income_rate'];
				$honoranium_income_hour = $_POST['honoranium_income_hour'];
				$other_income_rate = $_POST['other_income_rate'];
				$other_income_hour = $_POST['other_income_hour'];
				$sss_loan = $_POST['sss_loan'];
				$pagibig_loan = $_POST['pagibig_loan'];
				$faculty_savings_deposit = $_POST['faculty_savings_deposit'];
				$faculty_savings_loan = $_POST['faculty_savings_loan'];
				$salary_loan = $_POST['salary_loan'];
				$other_loan = $_POST['other_loan'];
				$qualified_dependent_status = $_POST['qualified_dependent_status'];
				//Computation of BI Cut Off / HI Cut Off / OI Cut Off
				$basic_income_output = (float)$basic_income_rate * (float)$basic_income_hour;
				$honoranium_income_output = (float)$honoranium_income_rate * (float)$honoranium_income_hour;
				$other_income_output = (float)$other_income_rate * (float)$other_income_hour;
				//Gross Income
				$gross_income_output =(float)$basic_income_output + (float)$honoranium_income_output + (float)$other_income_output;
				//SSS Contribution
				$sss_contribution=sss_contribution($gross_income_output);
				//Philhealth Contribution
				$philhealth_contribution=sss_contribution($gross_income_output);
				//income tax
				$income_tax_contribution=income_tax($qualified_dependent_status,$gross_income_output);
				//Total Deductions
				 $total_deduction_output = (float)$sss_contribution + (float)$philhealth_contribution + (float)$pagibig_contribution + (float)$income_tax_contribution + (float)$sss_loan + (float)$pagibig_loan + (float)$faculty_savings_deposit + (float)$faculty_savings_loan + (float)$salary_loan + (float)$other_loan;
				//Net Income 
				$net_income_output = (float)$gross_income_output - (float)$total_deduction_output;
				//
				//
				$query = "INSERT INTO payroll (employee_no,b_rate_hour,b_num_hour,b_income,h_rate_hour,h_num_hour,h_income,o_rate_hour,o_num_hour,o_income,gross_income,net_income,sss_contrib,philhealth_contrib,pagibig_contrib,tax_contrib,sss_loan,pagibig_loan,fs_deposit,fs_loan,salary_loan,other_loan,total_deduction,dependents,payroll_date) VALUES ('$employee_no',$basic_income_rate,$basic_income_hour,$basic_income_output,$honoranium_income_rate,$honoranium_income_hour,$honoranium_income_output,$other_income_rate,$other_income_hour,$other_income_output,$gross_income_output,$net_income_output,$sss_contribution,$philhealth_contribution,$pagibig_contribution,$income_tax_contribution,$sss_loan,$pagibig_loan,$faculty_savings_deposit,$faculty_savings_loan,$salary_loan,$other_loan,$total_deduction_output,'$dependents','$paydate')";
				$con = mysql_connect();
				if (mysqli_query($con,$query)) {
					echo "<script>alert('Payroll Saved Successful');window.location.replace('index.php?page=payroll&user_id=".$user_id."');</script>";
				}
				else{
					echo "<script>alert('Invalid Input Try Again');</script>";
				}
			}

			// to press Cancel button
			else if(isset($_POST["cancel_button"])){
				echo "<script>window.location.replace('index.php?page=payroll&user_id=".$user_id."');</script>";
			} // end of Button Cancel

	

		} // end of Method POST
?>
<!--PHP Codes Ends Here-->



<!---------Form------------>
<form  method="POST">

	<!---------Title------------>
	<h1 id="title">Syra Tech Payroll Application ™</h1>
	<!---------End of Title------------>

	<!---------Main Wrapper------------>
	<div class="main_wrapper">
		<!-------------Employee Information------------------>
		<fieldset class="employee_wrapper">
			<legend style="width: 500px;">Employee Basic Information</legend>

			<!---------Employee Content Left------------>
			<div id="employee_left">
				<center>
					<img src="pages/uploads/<?php echo $profile_picture; ?>" id="profile_picture"><br><br>
				</center>
			</div>

			<!---------Employee Content Right------------>
			<div class="employee_right">
				<p>Civil Status:<input type="text" name="civil_status"  value = "<?php echo $civil_status;?>" class='readonly' readonly></p>
				<p>Designation:<input type="text" name="designation"  value = "<?php echo $designation;?>" class='readonly' readonly></p>
				<p>Qualified Dependents:<input type="text" name="qualified_dependent_status" class='readonly' value = "<?php echo $qualified_dependent_status;?>" class='readonly' readonly></p>
				<p>Paydate:<input type="text" name="paydate"  value = "<?php echo $paydate;?>" class='readonly' readonly></p>
				<p>Employee Status:<input type="text" name="employee_status" value = "<?php echo $employee_status;?>" class='readonly' readonly></p>
			</div>
			<!---------Employee Content Middle------------>
			<div class="employee_middle">
				<p>Employee Number :<input type="text" name="employee_number" value = "<?php echo $employee_number;?>" class='readonly'  readonly></p>
				<p>First Name:
				<input type="text" name="First_Name" id="first_name"  value = "<?php echo $first_name;?>" class='readonly' readonly></p>
				<p>Middle Name:<input type="text" name="middle_name"   value = "<?php echo $middle_name;?>" class='readonly' readonly></p>
				<p>Last Name:<input type="text" name="last_name" value = "<?php echo $last_name;?>" class='readonly' readonly></p>
				<p>Department:<input type="text" name="department"  value = "<?php echo $department;?>" class='readonly' readonly><p>
			</div>

		</fieldset>
		<!---------End of Employee Information------------>	

		<!--------------Salary Information---------------->	

		<!---------Regular Deductions------------>	
		<fieldset class="regular_wrapper">
			<legend>Regular Deductions</legend>
			<div id="regular_content">
				<p>SSS Contribution:<input type="text" name="sss_contribution" value = "<?php echo $sss_contribution; ?>" class='readonly' readonly></p>
				<p>PhilHealth Contribution:<input type="text" name="philhealth_contribution" value = "<?php echo $philhealth_contribution; ?>" class='readonly' readonly></p>
				<p>Pagibig Contribution:<input type="text" name="pagibig_contribution"  value = "<?php echo $pagibig_contribution;?>" class='readonly' readonly></p>
				<p>Income Tax Contribution:<input type="text" name="income_tax_contribution" placeholder="0" value = "<?php echo $income_tax_contribution ?>" class='readonly' readonly></p>
			</div>
		</fieldset>

		<!---------Basic Income------------>
		<fieldset class="basic_income_wrapper">
			<legend>Basic Income</legend>
			<div id="basic_income_content">
				<p>Rate / Hour:<input type="text" name="basic_income_rate"   value = "<?php echo $basic_income_rate;?>" required></p>
				<p>No. of Hours / Cut Off:<input type="text" name="basic_income_hour"  value = "<?php echo $basic_income_hour;?>" required></p>
				<p>Income / Cut Off:<input type="text" name="basic_income_output" value = "<?php echo $basic_income_output;?>" class='readonly' readonly></p>
			</div>
		</fieldset>

		<!---------Honoranium Income------------>
		<fieldset class="honoranium_income_wrapper">
			<legend>Honoranium Income</legend>
			<div id="honoranium_income_content">
				<p>Rate / Hour:<input type="text" name="honoranium_income_rate"  value = "<?php echo $honoranium_income_rate;?>" required></p>
				<p>No. of Hours / Cut Off:<input type="text" name="honoranium_income_hour"  value = "<?php echo $honoranium_income_hour;?>" required></p>
				<p>Income / Cut Off:<input type="text" name="honoranium_income_output"  value = "<?php echo $honoranium_income_output; ?>" class='readonly' readonly></p>
			</div>
		</fieldset>

		<!---------Other Deductions------------>
		<fieldset class="other_deductions_wrapper">
			<legend>Other Deduction</legend>
			<div id="other_deductions_content">
				<p>SSS Loan:<input type="text" name="sss_loan" value = "<?php echo $sss_loan;?>" required></p>
				<p>Pagibig Loan:<input type="text" name="pagibig_loan" value = "<?php echo $pagibig_loan;?>" required></p>
				<p>Faculty Savings Deposit:<input type="text" name="faculty_savings_deposit"  value = "<?php echo $faculty_savings_deposit;?>" required></p>
				<p>Faculty Savings Loan:<input type="text" name="faculty_savings_loan" value = "<?php echo $faculty_savings_loan;?>" required></p>
				<p>Salary Loan:<input type="text" name="salary_loan" value = "<?php echo $salary_loan;?>" required> </p>
				<p>Other Loans:<input type="text" name="other_loan"  value = "<?php echo $other_loan;?>" required></p>
			</div>
		</fieldset>

		<!---------Other Income------------>
		<fieldset class="other_income_wrapper">
			<legend>Other Income</legend>
			<div id="other_income_content">
				<p>Rate / Hour:<input type="text" name="other_income_rate"  value = "<?php echo $other_income_rate;?>" required></p>
				<p>No. of Hours / Cut Off:<input type="text" name="other_income_hour"  value = "<?php echo $other_income_hour;?>" required></p>
				<p>Income / Cut Off:<input type="text" name="other_income_output"  value = "<?php echo $other_income_output; ?>" class='readonly' readonly></p>
			</div>
		</fieldset>

		<!---------Deduction Summary------------>
		<fieldset class="deduction_summary_wrapper">
			<legend>Deduction Summary</legend>
			<div id="deduction_summary_content"><br><br><br>
				<label>Total Deductions:<input type="text" name="total_deduction_output" value = "<?php echo $total_deduction_output; ?>" class='readonly' readonly/></label>
			</div>
		</fieldset>

		<!---------Income Summary------------>
		<fieldset class="summary_income_wrapper">
			<legend>Summary Income</legend>
			<div id="summary_income_content">
				<p>Gross Income:<input type="text" name="gross_income_output" value ="<?php echo $gross_income_output; ?>" class='readonly' readonly></p>
				<p>Net Income:<input type="text" name="net_income_output" value = "<?php echo $net_income_output; ?>" class='readonly' readonly></p>
			</div>
		</fieldset>
		<!---------End of Salary Information------------>	

		<!----------------Buttons----------------------->
		<div class="button_wrapper">
			<button name="gross_income_button" formnovalidate>CALCULATE GROSS INCOME</button>
			<button name="net_income_button" formnovalidate>CALCULATE NET INCOME</button>
			<button name="new_button" formnovalidate>NEW</button>
			<button name="save_payroll" >SAVE TRANSACTION</button>
			<button name="cancel_button" formnovalidate>CANCEL</button>
		</div>
		<!---------------End of Buttons----------------->
</form>
<!---------End of Form------------>
