<?php 
/*

Author: Femi Bello
Email: femibel@gmail.com
Mobile: +2348068212113
Website: www.femiblue.com
Date: Aug 2014
Location: Lagos Nigeria

*/
?>
<?php
//set database parameter
$hostname = "localhost";
$database = "code_library";
$username = "root";
$password = "";

//attempt to connect to mysql database engine

$dbconn =  mysqli_connect($hostname,$username,$password,$database);

 // Check for failed connection
	if (mysqli_connect_errno())
  	{
 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 	 }
?>