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
//start a session so you can store session variables
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Simple PHP/MySQL Login</title>
</head>

<body>
<h1>Simple PHP/MySQL Login</h1>

<?php 
/*Check if there is an error message and display for user*/

if($_REQUEST['mode'] == 'error'){ ?>

	<div  class="error_msg">
    <?php echo $_SESSION['error_msg']; ?>
    </div><br />
			
<?php } ?>


<?php  
/*Check if there is a confirmation message and display for user*/

if($_REQUEST['mode'] == 'done'){?>

	<div  class="confirm_msg">
    <?php echo $_SESSION['confirm_msg']; ?>
    </div><br />

			
<?php } ?>

<form action="login_process.php" method="post">

<label>Username:</label>
<input name="username" type="text" value="<?php 
/* Safe user's time. Display  previous value if there was an error so user wont have to type all over again.  */
  if($_REQUEST['mode'] == 'error'){echo $_SESSION['username'];} ?>"><br><br>

<label>Password:</label>
<input name="password" type="password"><br><br>
<input name="" type="submit" value="Login">

</form>
</body>
</html>