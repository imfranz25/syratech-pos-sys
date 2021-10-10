<?php 
            $con = mysql_connect(); // connection  
                  $user_type = $_SESSION['user_type'];
                  $original_id = $_SESSION['user_id'];
                  if ($user_type == 'Administrator') {
                    echo "<li class='cd-side__item'><a id='emp_page' href='index.php?page=employee'>Employee</a></li>
                          <li class='cd-side__item'><a id='payroll_page' href='index.php?page=payroll'>Payroll</a></li>
                          <li class='cd-side__item'><a id='pos1_page' href='index.php?page=pos1'>Point of Sale A</a></li>
                          <li class='cd-side__item'><a id='pos2_page' href='index.php?page=pos2'>Point of Sale B</a></li>
                          <li class='cd-side__label'><span>Reports</span></li>
                          <li class='cd-side__item'><a id='payroll_report' href='index.php?page=payroll_report'>Payroll Report</a></li>
                          <li class='cd-side__item'><a id='pos1_report' href='index.php?page=pos1_sales'>Sales of Point of Sale A</a></li>
                          <li class='cd-side__item'><a id='pos2_report' href='index.php?page=pos2_sales'>Sales of Point of Sale B</a></li>
                          <li class='cd-side__label'><span>Account</span></li>
                          <li class='cd-side__item'><a id='account_page' href='index.php?page=user'>User Account</a></li>";
                  }
                  else if ($user_type == 'Accountant') {
                    echo "<li class='cd-side__item'><a id='payroll_page' href='index.php?user_id=$original_id&page=payroll'>Payroll</a></li><li class='cd-side__label'><span>Reports</span></li><li class='cd-side__item'><a id='payroll_report' href='index.php?user_id=$original_id&page=payroll_report'>Payroll Report</a></li>";
                  }
                  else if ($user_type == 'Cashier (1)') {
                    echo "<li class='cd-side__item'><a id='pos1_page'  href='index.php?user_id=$original_id&page=pos1'>Point of Sale A</a></li>";
                  }
                  else{
                    echo "<li class='cd-side__item'><a id='pos2_page'  href='index.php?user_id=$original_id&page=pos2'>Point of Sale B</a></li>";
                  }
                  echo "<li class='cd-side__item'><a href='index.php?user_id=$original_id&page=logout'>Logout</a></li>";
            close_connection($con); // close connection
        ?>