<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form method="GET" action="searchbox.php">
<input type="text" name="q"></input>
<input type="submit" name="submit">
</form>
</body>
</html>
<?php
$con=new mysqli('localhost','root','','college');
if($con->connect_error)
{
	die("connection error");
}
if(isset($_GET['q']))
{
$sql="SELECT brand_id,brand_name,itm_name,sprice FROM itm_name 
       WHERE brand_name like '%$_GET[q]%' OR itm_name LIKE '%$_GET[q]%'";
	 $result=$con->query($sql); 
echo "<table border='1'>
<tr>
<th>brand id</th>
<th>brand name</th>
<th>items name</th>
<th>cost</th>
</tr>";

while($row = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row['brand_id'] . "</td>";
echo "<td>" . $row['brand_name'] . "</td>";
echo "<td>" . $row['itm_name'] . "</td>";
echo "<td>" . $row['sprice'] . "</td>";
echo "</tr>";
}
echo "</table>";
$con->close();
}	 
?>