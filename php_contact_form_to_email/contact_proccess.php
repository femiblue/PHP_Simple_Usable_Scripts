<?php 
/*
Author: Femi Bello
Email: femibel@gmail.com
Mobile: +2348068212113
Website: www.femiblue.com
*/

//start a session so you can store session variables
session_start(); ?>

<?php 
//check to see that there was a form post
 if($_POST){
	 
	 //collect form parameters
	 $fullname = $_POST['full_name'];
	 $email = $_POST['email'];
	 $subject = $_POST['subject'];
	 $msg = $_POST['msg'];
	 
	 
	 //sanitize your form to avoid being hijacked by Spam Master
	 $full_name = trim(preg_replace("/\r|\n/", "",  $fullname));
	 $email = trim(preg_replace("/\r|\n/", "",  $email));
	 $subject = trim(preg_replace("/\r|\n/", "",  $subject));
	 $msg = trim(preg_replace("/\r|\n/", "",  $msg));
	 
	 
	 
	 //store session variable
	$_SESSION['full_name'] = $full_name;
	$_SESSION['email'] = $email;
	$_SESSION['subject'] = $subject;
	$_SESSION['msg'] = $msg;
	
	//validate inputs
	if($full_name == ''){
$_SESSION['error_msg'] = 'Enter Full Name';
 header("Location:contact.php?mode=error"); 
exit(); }

if($email == ''){
$_SESSION['error_msg'] = 'Enter Email Address';
 header("Location:contact.php?mode=error"); 
exit(); }

//validate email
if(!preg_match('/.{3,}@.{3,}\..{3,}/', $email)){
$_SESSION['error_msg'] = 'Enter a Valid Email Address';
 header("Location:contact.php?mode=error"); exit();}

if($subject == ''){
$_SESSION['error_msg'] = 'Enter a Subject';
 header("Location:contact.php?mode=error"); 
exit(); }


if($msg == ''){
$_SESSION['error_msg'] = 'Write a Message';
 header("Location:contact.php?mode=error"); 
exit(); }
	
//all things being equal, send message
 $email_to = 'mymail@mysite.com';//replace with your email

 $body = 'Name: ' . $full_name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $msg;

$success = mail($email_to, $subject, $body, 'From: <'.$email.'>');	


//if message sending is succeful, display confirmation message
if($success == 1){
$_SESSION['confirm_msg'] = 'Your message was sent!. We will get back to you';
//unset session error message
unset($_SESSION['error_msg']);
 header("Location:contact.php?mode=done"); 
exit(); }

else{
	//if mail sending was not successful, display error message
	$_SESSION['error_msg'] = 'Message was not sent. Please try again later';
 header("Location:contact.php?mode=error"); 
}



 }
 //if there was no post, user is redirected back to contact.php. You dont just want people to come here for security reasons
 else{
	 
	 header("Location: contact.php"); 
 }
?>