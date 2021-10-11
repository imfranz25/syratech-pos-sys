<?php
  if ((time() - $_SESSION['timeout']) > 180){
  	// session expired @ 3 minutes of inactivity :) 
  	session_destroy();
  	echo "<script>
  	alert('Session Expired');
  	window.location.replace('index.php');
  	</script>";
    exit;
  }else {
    $_SESSION['timeout'] = time();
  }
?>