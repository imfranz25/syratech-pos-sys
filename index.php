<html lang="en-us">
<?php 
  session_start(); 
  require 'pages/head.php'; 
  include 'includes/connection.php';
  require 'accounts/authentication.php';
  ?>
<body onload="loader()">
  <!----------------Loading Screen--------------------->
  <div class="lds-hourglass" id="loader" style="left: 50%;display:block;"></div>
  <?php require 'pages/header.php'; ?>
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