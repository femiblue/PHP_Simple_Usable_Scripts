<?php 
/*

Author: Femi Bello
Email: femibel@gmail.com
Mobile: +2348068212113
Website: www.femiblue.com

*/
?>
<?php
//include class DatabaseStuffs
include('DataBaseStuffs.php'); 
//set database parameters
$hostname = "localhost";
$database = "DATABASE_NAME";
$username = "DATABASE_USER";
$password = "USER_PASSWORD";

// Connecting to DataBase

   $dbconn = new DataBaseStuffs($username, $password, $hostname, $database, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	 
	//checking if database is connected
	
        if($dbconn->isConnected){
        echo "<h2>You are connected to the database</h2>";
        }else{
        echo "<h2>Database Connection Failed</h2>";
        }
		
	
	
?>