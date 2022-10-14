<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$host_name = "127.0.0.1"; // Change your database name
	$username = "root";          // Your database user id 
	$database = "assignment1";
	$password = "Admin@123";          // Your password

	

	$conn =mysqli_connect("$host_name", "$username", "$password", "$database");
 
    // if(mysqli_connect_error())
    //     echo "Connection Error.";
    // else
    //     echo "Database Connection Successfully.";

?>

