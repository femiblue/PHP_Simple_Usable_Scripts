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

if($_POST)

{
//collect form data
$title = $_POST['title'];
$story = $_POST['story'];


//use dbconn.php to establish a link to database
require_once('dbconn.php');


//create new record
$create_record = mysql_query("INSERT INTO tbl_news (title,story) VALUES('$title','$story') ");

//check for error in query and show - for development purpose
if(!$create_record){echo mysql_error(); exit();}


//close database connection link after using it to free up resources
mysql_close($dbconn);


//
session_start();
$_SESSION['msg'] = "News was created";
}




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Record from MySQL Database</title>
</head>

<body>


<div style="color: #333; font-size:14px">
<h1>Add a News</h1>
<?php
if($_SESSION['msg']){
	echo'<div style="color:red">';
	echo $_SESSION['msg'];
	echo'</div><br/>';
}

?>
<form action="" method="post" name="form1">
<label>Title:</label><br>
<input name="title" type="text"><br>
<br>

<label>Story:</label><br>
<textarea name="story" cols="30" rows="4"></textarea><br>
<br>
<input name="" type="submit">

</form>

</div>


</body>
</html>
