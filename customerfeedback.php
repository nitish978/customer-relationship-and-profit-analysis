<?php
session_start();
$con=new mysqli("localhost","root","","college");
if ($con->connect_error)
{
   echo "<script>windows.alert('connection failed')";
}
if(isset($_GET['cname'])&&isset($_GET['phno']))
{	
if(!empty($_GET['cname'])&&!empty($_GET['phno']))
{	
$sql = "SELECT * FROM customer";
$result=$con->query($sql);
$i=0;
while($row = $result->fetch_assoc())	
{
if($row['cname']===$_GET[cname]&&$row['phoneno']===$_GET[phno])
{
	 $i=1;
	 $_SESSION['cid']=$row['cid'];
	 header("location:customerfeedback.php");
   }
}

if($i==0)
{
 	header("location:customerlogin.php");
}
}
else
{
    header("location:customerlogin.php");
}
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body background="image2.png">
<div style="padding:5px;text-align:center;background-color: #e5eecc;border: solid 1px #c3c3c3;height:50px;">
<strong><h2>CUSTOMER FEEDBACK</h2></strong></div>
</div>
<div style="margin-left:90%;width:100px;height:20px;border:1px solid black;background-color:darkgrey;"><a href="customerlogin.php" style="padding-left:0px;" style="color:red;">logout</a></div>
<div style="width:30%;height:300px;background-color:lightgrey;margin-left:35%;margin-top:150px;text-align:center;">
<h2>FEEDBACK FORM</h2>
<br>
<form method="GET" action="customerfeedback.php" id="feedback">
<br>
<input placeholder="Enter Brand Id" name="bid" type="text" style="margin-top:1px;">
<br>
<input placeholder="Enter Items Name" name="itmname" type="text">
<br>
<input placeholder="Star Rating" name="tstar" type="number" min="0" max="5"style="width:100px"></input>
<br>
<select name="comment" form="feedback">
     <option value="Very Poor">Very Poor</option>
     <option value="Poor">Poor</option>
     <option value="Very Good">Very Good</option>
	 <option value="Excellent" selected>Excellent</option>
</select>
<br>
<input type="submit" >
<br>
</form>

</div>
</body>
</html>
<?php
$i1=0;
if(isset($_GET['bid'])&&isset($_GET['itmname'])&&isset($_GET['tstar'])&&isset($_GET['comment'])&&isset($_SESSION['cid']))
{	
if(!empty($_GET['bid'])&&!empty($_GET['itmname'])&&!empty($_GET['tstar'])&&!empty($_GET['comment']))
{
	
$sql1="INSERT INTO feedback(c_id,brand_id,tstar,comment)
                    VALUES('$_SESSION[cid]','$_GET[bid]','$_GET[tstar]','$_GET[comment]')";
					if($con->query($sql1)==TRUE)
					{
					$i1=1;	
					}
}
}
if($i1==1)
{
	header("location:customerfeedback.php");
}
$con->close();
?>