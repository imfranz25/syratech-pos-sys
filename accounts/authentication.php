<?php
  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username'])){
    $user_id = $_SESSION['user_id']; // get passed user_id
    require 'includes/timeout.php'; // session timeout @ 3 minutes
  } 
  else{echo "<script>window.location.replace('accounts/login.php');</script>";}
?>