<!--

Author: Femi Bello
Email: femibel@gmail.com
Mobile: +2348068212113
Website: www.femiblue.com

-->
<?php 
//start a session so you can store session variables
session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Simple Contact Form</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="content">
<h2>Send us a mail quickly</h2>
<br>
<br>
<?php /*Check if there is an error message and display for user*/if($_REQUEST['mode'] == 'error'){?>
				<div  class="error_msg">
                <?php echo $_SESSION['error_msg']; ?>
                </div><br />

				
				<?php } ?>

<?php  /*Check if there is a confirmation message and display for user*/if($_REQUEST['mode'] == 'done'){?>
				<div  class="confirm_msg">
                <?php echo $_SESSION['confirm_msg']; ?>
                </div><br />

				
				<?php } ?>

<!-- When content is submitted to form, it goes to contact_proccess.php to handle it   -->
<form action="contact_proccess.php" method="post" name="form1">

  <label for="full_name">Full Name</label><br>
  <input type="text" name="full_name" id="full_name" 
  value="<?php /* Safe user's time. Display  previous value if there was an error so user wont have to type all over again.  */
  if($_REQUEST['mode'] == 'error'){echo $_SESSION['full_name'];} ?>"><br><br>

  <label for="email">Email</label><br>
   <input type="text" name="email" id="email" 
   value="<?php /* Safe user's time. Display  previous value if there was an error so user wont have to type all over again.  */
   if($_REQUEST['mode'] == 'error'){echo $_SESSION['email'];} ?>"><br><br>
   
   <label for="subject">Subject</label><br>
   <input type="text" name="subject" id="subject" 
   value="<?php /* Safe user's time. Display  previous value if there was an error so user wont have to type all over again.  */
   if($_REQUEST['mode'] == 'error'){echo $_SESSION['subject'];} ?>"><br><br>
   
    <label for="subject">Message Body</label><br>
   <textarea name="msg" cols="30" rows="8"><?php /* Safe user's time. Display  previous value if there was an error so user wont have to type all over again.  */if($_REQUEST['mode'] == 'error'){echo $_SESSION['msg'];} ?></textarea><br>
   
<input name="submit" type="submit" value="Send Mail" class="button">

  
</form>
</div>
</body>
</html>