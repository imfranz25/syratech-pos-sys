<!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
            $con = mysql_connect(); // connection  
                  $user_type = $_SESSION['user_type'];
                  $original_id = $_SESSION['user_id'];
                  if ($user_type == 'Administrator') {
                    echo "<li class='cd-side__item'><a id='emp_page' href='index.php?page=employee'><i class='fas fa-user-circle mx-1'></i>Employee</a></li>
                          <li class='cd-side__item'><a id='payroll_page' href='index.php?page=payroll'><i class='fas fa-file-invoice mx-1'></i>Payroll</a></li>
                          <li class='cd-side__item'><a id='pos1_page' href='index.php?page=pos1'><i class='fab fa-usps mx-1'></i>Point of Sale A</a></li>
                          <li class='cd-side__item'><a id='pos2_page' href='index.php?page=pos2'><i class='fab fa-usps mx-1'></i>Point of Sale B</a></li>
                          <li class='cd-side__label'><span>Reports</span></li>
                          <li class='cd-side__item'><a id='payroll_report' href='index.php?page=payroll_report'><i class='fas fa-clipboard mx-1'></i>Payroll Report</a></li>
                          <li class='cd-side__item'><a id='pos1_report' href='index.php?page=pos1_sales'><i class='fas fa-clipboard mx-1'></i>Sales of POS A</a></li>
                          <li class='cd-side__item'><a id='pos2_report' href='index.php?page=pos2_sales'><i class='fas fa-clipboard mx-1'></i>Sales of POS B</a></li>
                          <li class='cd-side__label'><span>Account</span></li>
                          <li class='cd-side__item'><a id='account_page' href='index.php?page=user'><i class='fas fa-users mx-1'></i>User Account</a></li>";
                  }
                  else if ($user_type == 'Accountant') {
                    echo "<li class='cd-side__item'><a id='payroll_page' href='index.php?user_id=$original_id&page=payroll'><i class='fas fa-file-invoice mx-1'></i>Payroll</a></li><li class='cd-side__label'><span>Reports</span></li><li class='cd-side__item'><a id='payroll_report' href='index.php?user_id=$original_id&page=payroll_report'><i class='fas fa-clipboard mx-1'></i>Payroll Report</a></li>";
                  }
                  else if ($user_type == 'Cashier (1)') {
                    echo "<li class='cd-side__item'><a id='pos1_page'  href='index.php?user_id=$original_id&page=pos1'>Point of Sale A</a></li>";
                  }
                  else{
                    echo "<li class='cd-side__item'><a id='pos2_page'  href='index.php?user_id=$original_id&page=pos2'>Point of Sale B</a></li>";
                  }
                  echo "<li class='cd-side__item'><a href='index.php?user_id=$original_id&page=logout'><i class='fas fa-sign-out-alt mx-1'></i>Logout</a></li>";
            close_connection($con); // close connection
        ?>