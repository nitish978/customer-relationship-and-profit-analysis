<?php
session_start();
$con=new mysqli("localhost","root","","college");
// Check connection
if ($con->connect_error)
{
   echo "<script>windows.alert('connection failed')";
}
if(isset($_SESSION['name'])&&$_SESSION['name']!="")
{
	$_SESSION['name']=$row['fname'];
	header("location:manager.php");
	exit;
}
if(isset($_POST['name'])&&isset($_POST['pass']))
{	
$pass=$_POST['pass'];
$username=$_POST['name'];
$pass_hash=md5($pass);
if(!empty($_POST['pass'])&&!empty($_POST['name']))
{	
$sql = "SELECT * FROM signup";
$result=$con->query($sql);
$i=0;
while($row = $result->fetch_assoc())	
{
if($row['fname']===$username&&$row['password']===$pass_hash)
{
	 $i=1;
	if(($username==='nitish'&&$pass==='nitish')||($username==='manish'&&$pass==='manish'))
	{
		header("location:manager.php");
	}
   else
   {
	 header("location:tran1.php");
   }
   $_SESSION['name']=$row['fname'];
}
}
if($i==0)
{
 	header("location:index1.php");
}
}
else
{
    header("location:index1.php");
}
}
$con->close();
?>
