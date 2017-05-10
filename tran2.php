<?php
 $con=new mysqli('localhost','root','','college');
if($con->connect_error)
{
	die("connection error");
}
		 $sql3="DELETE FROM `xxx`";
		 if($con->query($sql3)==TRUE)
				 {
					 header("location:tran1.php");
				 } 

?>