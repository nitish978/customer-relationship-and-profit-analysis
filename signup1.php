<?php
$conn=new mysqli("localhost","root","","college");
if($conn->connect_error)
{
	die("conection is not successfull");
}
if(isset($_POST['password'])&&
   isset($_POST['fname'])&&
   isset($_POST['lname'])&&
   isset($_POST['email']))
   {   
   if(!empty($_POST['password'])&&
   !empty($_POST['fname'])&&
   !empty($_POST['lname'])&&
   !empty($_POST['email']))
   {
$mdpass=md5($_POST[password]);
$sql="INSERT INTO signup(fname,lname,email,password)
                  VALUES('$_POST[fname]','$_POST[lname]','$_POST[email]','$mdpass')";
 if($conn->query($sql)===TRUE)
 {
	 header("location:index1.php");
 }
 else
 {
	 echo "somthing wrong";
 }
   }
   else
   {
	 header("location:index1.php");  
   }
   }
 $conn->close();
?>