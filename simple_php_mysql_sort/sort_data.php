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
//use dbconn.php to link mysql
require('dbconn.php');

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Simple Php/MySQL Sort functionality</title>
</head>

<body>
	   
	        <h1>Students Record</h1>
        <hr />
        
       

		<?php 
		//initialise $sort to empty string
        $sort = "";
		
		//check if there is a sort request
        if(isset($_GET['sort'])) {
            switch ($_GET['sort'] ) {
				
			//if case is 0, sort in ascending order of id
            case 0: 
                        $sort = " ORDER BY id ASC"; 
                        break;
			//if case is 1, sort in ascending order of name
            case 1:
                        $sort = " ORDER BY name ASC";
                        break;
			//if case is 2, sort in ascending order of matric_no
            case 2:
                        $sort = " ORDER BY matric_no ASC";
                        break;
			//if case is 3, sort in ascending order of department
            case 3:
                        $sort = " ORDER BY department ASC"; 
                        break;
			//if case is 4, sort in ascending order of age
            case 4: 
                        $sort = " ORDER BY age ASC";
                        break;
			//if case is 5, sort in ascending order of last_update
            case 5:
                        $sort = " ORDER BY last_update ASC";
                        break;
                    
            }
        }
		
		//prepare sql statement
        $result = mysqli_prepare($dbconn, "SELECT * FROM tbl_students" . $sort);
		
		//execute query
		mysqli_stmt_execute($result);
   		/* store result */
		mysqli_stmt_store_result($result);

		$no_of_results =  mysqli_stmt_num_rows($result); 
        
		//check if there is any record
		if($no_of_results > 0){
			
			?>
            
             <table border='1'>
            <tr>
                <th><a href="sort_data.php?sort=0">S/N</a></th>
                <th><a href="sort_data.php?sort=1">Name</a></th>
                <th><a href="sort_data.php?sort=2">Matric No</a></th>
                <th><a href="sort_data.php?sort=3">Department</a></th>
                <th><a href="sort_data.php?sort=4">Age</a></th>
                <th><a href="sort_data.php?sort=5">Last Update</a></th>
            </tr>

            
            <?php

		mysqli_stmt_bind_result($result, $id, $name, $matric_no, $department, $age, $last_update);
		
		//loop through record list
       while(mysqli_stmt_fetch($result)){
			
			?>
			
             <tr>
             
             <td><?php echo $id ?></td>
             <td><?php echo $name ?></td>
             <td><?php echo $matric_no ?></td>
             <td><?php echo $department ?></td>
             <td><?php echo $age ?></td>
             <td><?php echo $last_update ?></td>
            
            </tr>
            
        <?php
        
        }
		?>
        
       </table> 
       
		<?php
		}//if($no_of_results > 0){
		else{
			
		?>
        There are no records
        
        <?php
		
		} //end else
		
			//Close database connection link
   			 mysqli_close($dbconn);

		?>
</body>
</html>