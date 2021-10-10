<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en-us">
<?php 
  require 'head.php'; 
  include 'includes/connection.php';
  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username'])){
    $user_id = $_SESSION['user_id']; // get passed user_id
  } 
  else{echo "<script>window.location.replace('accounts/login.php');</script>";}
  ?>
<body onload="loader()">
  <div class="lds-hourglass" id="loader" style="left: 50%;display:block;"></div>
  <!--------------------------------------Header------------------------------>
  <header class="cd-main-header js-cd-main-header" id="top-header">
    <!-------------------Logo-------------------------->
    <div class="cd-logo-wrapper">
      <a href="index.php" class="cd-logo" id="logo"><img src="images/syra.png" alt="SyraTech Website" height="70" width="100" ></a>

    </div>
    <!-----------------End of Logo--------------------->
    <div id="header">
      <a href="index.php">SyraTech Enterprise Application</a>
    </div>

  </header> 
  <!---------------------------------End of Header------------------------------>

  <main class="cd-main-content">
    <!--=====Side Bar Navigation=====-->
    <nav class="cd-side-nav js-cd-side-nav" id="side_wrapper" >
      <ul class="cd-side__list js-cd-side__list" id="sidebar">
        <li class="cd-side__label"><span>Main</span></li>
        <li class="cd-side__item" ><a id="homepage" href="index.php">Home</a>
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
      </ul>
    </nav>

    <!--=====End of Side Bar Navigation=====-->
    <div id="page">
    <!--=====Content Area=====-->
    <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <center>
          <fieldset id="index">
            <legend>Welcome to SyraTech Enterprises</legend>
            <h1 id="user"><img src="images/syra.png" id="logo_index"><?php echo strtoupper($_SESSION['username']); ?></h1>
          </fieldset>
        </center>
        <?php 
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          if (($page  == 'employee') && ($user_type == 'Administrator')){
            echo "<style>#emp_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/employee_list.php';
          }
          else if (($page  == 'create') && ($user_type == 'Administrator')){
            echo "<style>#emp_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/create.php';
          }
          else if (($page  == 'update') && ($user_type == 'Administrator')){
            echo "<style>#emp_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/update.php';
          }
          else if (($page  == 'payroll') && ($user_type == 'Administrator' | $user_type == 'Accountant')){
            echo "<style>#payroll_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/payroll_list.php';
          }
          else if (($page  == 'payrollform') && ($user_type == 'Administrator' | $user_type == 'Accountant')){
            echo "<style>#payroll_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/payroll.php';
          }
          else if (($page  == 'payroll_report') && ($user_type == 'Administrator' | $user_type == 'Accountant')){
             echo "<style>#payroll_report{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/payroll_report.php';
          }
          else if (($page  == 'pos1') && ($user_type == 'Administrator' | $user_type == 'Cashier (1)')){
             echo "<style>#pos1_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/pos1.php';
          }
          else if (($page  == 'pos2') && ($user_type == 'Administrator' | $user_type == 'Cashier (2)')){
            echo "<style>#pos2_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/pos2.php';
          }
          else if (($page  == 'pos1_sales') && ($user_type == 'Administrator')){
            echo "<style>#pos1_report{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/pos1_sales.php';
          }
          else if (($page  == 'pos2_sales') && ($user_type == 'Administrator')){
            echo "<style>#pos2_report{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/pos2_sales.php';
          }
          else if (($page  == 'user') && ($user_type == 'Administrator')){
            echo "<style>#account_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/user_list.php';
          }
          else if (($page  == 'update_user') && ($user_type == 'Administrator')){
            echo "<style>#account_page{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";
            require 'pages/update_user.php';
          }
          else if ($page  == 'logout'){session_destroy(); echo "<script>window.location.replace('accounts/login.php');</script>";}
          else{echo "<script>document.getElementById('index').style = 'display:block';</script><style>#homepage{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";}
        }// end if
        else{echo "<script>document.getElementById('index').style = 'display:block';</script><style>#homepage{border-left:5px cyan solid;border-bottom:1px solid cyan;background:rgb(0,50,90,.2);}</style>";}
        ?>
      </div>
    </div>
    <!--=====End of Content Area=====-->
  </main> 
  </div>
</body>
</html>