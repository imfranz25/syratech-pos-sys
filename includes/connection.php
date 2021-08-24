<?php 

// Function MySQL Connect
    function mysql_connect(){

        // Initialization
        $dbhost = 'localhost'; // database host
        $dbuser = 'id17061632_syratech'; // database user (root by default)
        $dbpass = 'MK95@Bq&idQ]LJ4T'; // database password (blank by default)
        $dbname = 'id17061632_syra'; // database name


        // return connection
        return mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    }// End

    // Close Connection
    function close_connection($con){
        $con -> close();
    }

?>