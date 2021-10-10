<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en-us">
<?php 
  require 'head.php'; 
  include 'includes/connection.php';
  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username'])){
    $user_id = $_SESSION['user_id']; // get passed user_id
    require 'includes/timeout.php';
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
        <li class="cd-side__item" ><a id="homepage" href="index.php"><i class='fas fa-home mx-1'></i>Home</a>
        <?php require 'pages/sidebar.php' ?>
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
        <?php require 'pages/content.php' ?>
      </div>
    </div>
    <!--=====End of Content Area=====-->
  </main> 
  </div>
</body>
</html>