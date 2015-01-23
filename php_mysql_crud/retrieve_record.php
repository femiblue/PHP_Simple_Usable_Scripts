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


//create mysql query to retrieve news record
$get_record = mysql_query("SELECT * FROM tbl_news ORDER BY id DESC");

//check for error in query and show - for development purpose
if(!$get_record){echo mysql_error(); exit();}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Retrieve Record from MySQL Database</title>
</head>

<body>
<?php 
//if there is any record on table
$any_record = mysql_num_rows($get_record);
if($any_record > 0){


?>
<table width="100%" border="1">
  <tr>
    <td><strong>S/N</strong></td>
    <td><strong>Title</strong></td>
    <td><strong>Story</strong></td>
    <td><strong>Date</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
<?php 
//if there is any reord on table news, loop through them

while($row_news = mysql_fetch_array($get_record)){
?>  
  <tr>
    <td><?php echo $row_news['id']; ?></td>
    <td><?php echo $row_news['title']; ?></td>
    <td><?php echo $row_news['story']; ?></td>
    <td><?php echo $row_news['last_update']; ?></td>
    <td><a href="update_record.php?id=<?php echo $row_news['id']; ?>">Edit</a></td>
    <td><a href="delete_record.php?id=<?php echo $row_news['id']; ?>">Delete</a></td>
  </tr>
<?php
} //end while loop
 ?>  
</table>
<?php 

} else{ //if no records display message to 

?>

<div style="color:#F00; font-size:14px">
There are no news in database

</div>


<?php 

} //end else

?>

</body>
</html>
<?php 
//close database connection link after using it to free up resources
mysql_close($dbconn);
?>