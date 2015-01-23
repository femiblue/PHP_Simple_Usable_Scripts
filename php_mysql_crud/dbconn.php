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
$dbconn = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 



//use mysql connection to select your database
$isconnected = mysql_select_db($database, $dbconn);

//check if connection is successful
if($isconnected == 1){
        echo "<h2>You are connected to the database</h2>";
        }else{
        echo "<h2>Database Connection Failed</h2>";
        }

?>