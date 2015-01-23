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


if($_REQUEST){
$id = $_REQUEST['id'];

$del_news = mysql_query("DELETE FROM tbl_news WHERE id='$id' ");


//close database connection link after using it to free up resources
mysql_close($dbconn);

header ("Location:retrieve_record.php");
}
