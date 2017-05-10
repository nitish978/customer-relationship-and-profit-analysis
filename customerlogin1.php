<?php
$con=new mysqli("localhost","root","","college");
if ($con->connect_error)
{
   echo "<script>windows.alert('connection failed')";
}
if(isset($_POST['cname'])&&isset($_POST['phno']))
{	
if(!empty($_POST['pass'])&&!empty($_POST['name']))
{	
$sql = "SELECT * FROM customer";
$result=$con->query($sql);
$i=0;
while($row = $result->fetch_assoc())	
{
if($row['fname']===$username&&$row['password']===$pass_hash)
{
	 $i=1;
	 header("location:tran1.php");
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
