<?php
include('functions.php'); 
$correo=$_GET['correo'];
if ($resultset = getSQLResultSet("CALL SP_S_USUARIOS('$correo')")) {
	
    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
    	echo json_encode($row);
		
    	
    	}
    	
   }
   
?>
