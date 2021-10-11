<?php 
    // Function MySQL Connect
    function mysql_connect(){
        // Initialization
        $dbhost = 'localhost'; // database host
        $dbuser = 'root'; // database user (root by default)
        $dbpass = ''; // database password (blank by default)
        $dbname = 'syra'; // database name
        // return connection
        return new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    }// End
    // Close Connection
    function close_connection($con){
        $con -> close();
    }
?>