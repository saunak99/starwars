<?php
//Define Session
session_start();
//Set Database connection.Mysql use here as Database.
$conn = mysqli_connect("localhost","root","","votingdb")or die("Database connection error");

//Get the machine MAC Address of the user machine
function get_client_ip()
{
	// PHP code to get the MAC address of Client 
$MAC = exec('getmac'); 
// Storing 'getmac' value in $MAC 
$MAC = strtok($MAC, ' '); 
return $MAC;
}

?>