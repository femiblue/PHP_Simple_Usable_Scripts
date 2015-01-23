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
//use dbconn.php to establish a link to database
require_once('dbconn.php');

//check if there is a url request
if($_REQUEST){
$id = $_REQUEST['id'];

//get news from database with given id
$get_news = mysql_query("SELECT * FROM tbl_news WHERE id='$id' ");
}
//check for error in query and show - for development purpose
if(!$get_news){echo mysql_error(); exit();}
$row_news = mysql_fetch_array($get_news);
//
$row_title  = $row_news['title'];
$row_story  = $row_news['story'];

//check if there is a post
if($_POST)

{
//collect form data
$newsid = $_POST['newsid'];
$ntitle = $_POST['ntitle'];
$nstory = $_POST['nstory'];





//update record
$update_record = mysql_query("UPDATE tbl_news  SET title = '$ntitle',story = '$nstory' WHERE id = '$newsid' ");

//check for error in query and show - for development purpose
if(!$update_record){echo mysql_error(); exit();}


//close database connection link after using it to free up resources
mysql_close($dbconn);


//
session_start();
$_SESSION['msg'] = "News was updated";
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
<h1>Update News</h1>
<?php
if($_SESSION['msg']){
	echo'<div style="color:red">';
	echo $_SESSION['msg'];
	echo'</div><br/>';
}

?>
<form action="" method="post" name="form1">
<input name="newsid" type="hidden" value="<?php echo $id; ?>">
<label>Title:</label><br>
<input name="ntitle" type="text" value="<?php echo $row_title; ?>"><br>
<br>

<label>Story:</label><br>
<textarea name="nstory" cols="30" rows="4"><?php echo $row_story; ?></textarea><br>
<br>
<input type="submit" value="Update">

</form>

</div>


</body>
</html>
