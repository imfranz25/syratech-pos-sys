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