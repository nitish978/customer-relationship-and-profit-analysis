<?php
session_start();
if(!isset($_SESSION['name']))
{
  header("location:index1.php");  
}
else if(isset($_SESSION['name'])!="")
{
	unset($_SESSION['name']);
	session_unset();
	session_destroy();
	header("location:index1.php");
}
?>