<?php 
/*

Author: Femi Bello
Email: femibel@gmail.com
Mobile: +2348068212113
Website: www.femiblue.com
Date: Dec 2014
Location: Lagos Nigeria

*/
?>
<?php 

if($_POST){
	
//use dbconn.php to establish a link to database
require_once('dbconn.php');	

//start a session so you can store session variables
session_start();

	
//collect login form parameter
$username = trim($_POST['username']);	
$password = trim($_POST['password']);


//store session variable
$_SESSION['username'] = $username;	


	
//validate inputs
if($username == ''){
$_SESSION['error_msg'] = 'Please provide username';
 header("Location:login.php?mode=error"); 
exit(); }



if($password == ''){
$_SESSION['error_msg'] = 'Please provide password';
 header("Location:login.php?mode=error"); 
exit(); }	
	


//check if user exist on database
$check_user = mysqli_prepare($dbconn, "SELECT username, password FROM tbl_user WHERE username = '$username' AND password = '$password' ");

		//execute query
		mysqli_stmt_execute($check_user);
   		/* store result */
		mysqli_stmt_store_result($check_user);
		//is there any user with this credentials
		$is_exist =  mysqli_stmt_num_rows($check_user); 
	
//if there is any?
if($is_exist > 0){
	
$_SESSION['confirm_msg'] = 'Welcome!. You are logged in';
//unset session error message
unset($_SESSION['error_msg']);
 header("Location:login.php?mode=done"); 
exit(); 	
}

//if there is no one
else
{
	$_SESSION['error_msg'] = 'Your account does not exist';
 header("Location:login.php?mode=error"); 
exit();
}
	
	
	
//Close database connection link
  mysqli_close($dbconn);	
	
}





?>