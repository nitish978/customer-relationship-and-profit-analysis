<?php
session_start();
 if(!isset($_SESSION['name'])||$_SESSION['name']=='')
 {
	 header("location:index1.php");
 }
?>
<!DOCTYPE html>
<html>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<div style="background-color:lightgrey;height:400px:width:100%;text-align:center;margin-top:0px;">
  
  <h1>BIG BAZAR</h1>
    
</div>

<div><a href="logout.php">logout</a><div>
<div style="width:100%;height:50%;border:1px solid green;text-align:center;padding-top:20px;">
 <form action="tran1.php" method="GET" id="1">
  <strong> brand id:</strong><input type="text" name="brandid">
   <strong>items name:</strong><input type="text" name="itmname">
   <strong>no of items:</strong><input type="text" name="q">
   
       <input type="submit" value="add" style="background-color:#749ac9;">
    	<a href="tran2.php">done<a>
 </form>
 

<?php
$con=new mysqli('localhost','root','','college');
if($con->connect_error)
{
	die("connection error");
}
if(isset($_GET['brandid'])&&isset($_GET['itmname'])&&isset($_GET['q']))
{

if(!empty($_GET['brandid'])&&!empty($_GET['itmname'])&&!empty($_GET['q']))
{	
$sql="SELECT brand_id,itm_name,sprice FROM itm_name
             WHERE brand_id='$_GET[brandid]' AND itm_name='$_GET[itmname]'";
$sql11="SELECT cdiscount FROM prifitanalysis WHERE brand_id='$_GET[brandid]'";
		 $result11=$con->query($sql11);
          $x11=0;		 
         while( $row11=$result11->fetch_assoc())
		 {
			 $x11=$row11['cdiscount'];
		 }			 
$sql4="UPDATE itm_name SET no_items=no_items-$_GET[q] WHERE brand_id='$_GET[brandid]'";
     $result3=$con->query($sql4);	
	 $result=$con->query($sql);
	$sql66="SELECT * FROM itm_name WHERE brand_id='$_GET[brandid]'";
		 $result66=$con->query($sql66);
	     $row66=$result66->fetch_assoc();
          $x66=$row66['sprice'];
		  $y66=$row66['cprice'];
		  $z66=$x66-$y66;
		  $sql8="SELECT * FROM prifitanalysis WHERE brand_id='$_GET[brandid]'";
		 $result8=$con->query($sql8);
	     $row8=$result8->fetch_assoc();
	     
	if(!empty($row8['brand_id']))
	{    
              $x8=$row8['itm_sold_in_curprice'];
			 $sql7="UPDATE prifitanalysis
					 SET total_sold=total_sold+$_GET[q],
					 itm_sold_in_curprice=itm_sold_in_curprice+$_GET[q],
					 curr_profit=$z66*($x8+$_GET[q])
					 WHERE brand_id='$_GET[brandid]'";
			         $result7=$con->query($sql7);
		 
	 }
	 else
	 {
		 $x6=0;
		 $y6=$z66*$_GET['q'];
		  $sql6="INSERT INTO prifitanalysis(brand_id,cdiscount,itm_sold_in_curprice,total_sold,curr_profit)
                              VALUES('$_GET[brandid]','$x6','$_GET[q]','$_GET[q]','$y6')";
		       if($con->query($sql6)===TRUE)
			   {
				  echo "<script>alert('SUCCESSFULLY INSERTED')</script>";  
			   }
			   else
			   {
				 echo "<script>alert('not successfull')</script>";  
			   }
			   
	 }
	
	
	 while($row=$result->fetch_assoc())
	 {
		 $brandid1=$row['brand_id'];
		 $itemname1=$row['itm_name'];
		 $sprice1=$row['sprice'];
		 $tprice=($row['sprice']*(100-$x11)*$_GET['q'])/100;
		 $sql1="INSERT INTO xxx(brand_id,item_name,sprice,tprice)
                VALUES('$_GET[brandid]','$_GET[itmname]','$sprice1','$tprice')";
			 }
			if($con->query($sql1)===TRUE)
			 {
			 }
}
else
{
	header("location:tran1.php");
}
}		
$sql2="SELECT * FROM xxx";
echo "<div style='border:1px solid black;height:30%;width:100%';text-align:center;margin-left:20%;>";		
		$result1=$con->query($sql2);
		$sum=0;
		echo "<table border='1' style='margin-left:35%;'>
				<tr>
				<th>brand id</th>
				<th>item name</th>
				<th>selling price</th>
				<th>total price</th>
				</tr>";
	 while($row1=$result1->fetch_assoc())
	 {
		 echo "<tr>";
				echo "<td>" . $row1['brand_id'] . "</td>";
				echo "<td>" . $row1['item_name'] . "</td>";
				echo "<td>" . $row1['sprice'] . "</td>";
					echo "<td>".$row1['tprice']."</td>";
		 echo "</tr>";
		$sum=$sum+$row1['tprice'];
	 }
	 if($sum!=0)
	 {
		 echo "<tr>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td><strong>Total Price</strong></td>";
					echo "<td>".$sum."</td>";
		 echo "</tr>";
	 
	 }
	 echo "</table>";
	 echo "</div><br/>";

?>
</div>
<div style="border:1px solid black;width:100%;height:50px; margin-top:10px;text-align:center;padding-bottom:10px;">
              <form name="name1" action="tran1.php"method="GET">
			       <strong >Customer Name:</strong><input type="text" name="cname" style="width:200px; height:30px" required></input>
				   <strong>Phone Number:</strong><input type="text" name="phno" style="width:200px; height:30px" required></input>
				   <input type="submit" style=" margin-top:10px; width:100px; height:40px; margin-left:8%; background-color:#3399cc;" value="submit">
			  </form>  
</div>
<?php
if(isset($_GET['cname'])&&isset($_GET['phno']))
{
	 if(!empty($_GET['cname'])&&!empty($_GET['phno']))
	 {
$sql5="INSERT INTO customer(cname,phoneno)
                      VALUES('$_GET[cname]','$_GET[phno]')";
					  if($con->query($sql5)===TRUE)
			 {
			 }
					  
}
}

?>
<br><br/>
<script>
$(document).ready(function(){
    $("#ram1").click(function(){
        $("#ram").slideToggle("slow");
    });
});
</script>
<div style="padding:5px;text-align:center;background-color: #e5eecc;
    border: solid 1px #c3c3c3;" id="ram1">
  <form method="GET" action="tran1.php" >
<input type="text" name="q" placeholder="Search Items">
<input type="submit" value="search">
</form>
</div>
<div id="ram" style="padding:100px;background-color:#bad9df;test-align:center;">
<?php
if(isset($_GET['q']))
{
$sql="SELECT brand_id,brand_name,itm_name,sprice FROM itm_name 
       WHERE brand_name like '%$_GET[q]%' OR itm_name LIKE '%$_GET[q]%'";
	 $result=$con->query($sql); 
echo "<table border='1' style='margin-left:25%;'>
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
}	 
?>
</div>

<script>
$(document).ready(function(){
    $("#12").click(function(){
        $("#1212").slideToggle("slow");
    });
});
</script>

<div id="12" style="padding:5px;text-align:center;background-color: #e5eecc;
    border: solid 1px #c3c3c3;" >Click To Show All Items</div>
<div id="1212" style="padding:100px;background-color:lightgrey;test-align:center;display:none;">
<?php
 $sql9 = "SELECT s.brand_id,s.brand_name,
         s.itm_name,s.sprice,s.cprice,s.pnwsize,s.no_items,
       	 a.cdiscount FROM itm_name as s
		 LEFT JOIN prifitanalysis as a
		 ON s.brand_id=a.brand_id";
$result9=$con->query($sql9);
echo "<table border='1' style='margin-left:25%;'>
<tr>
<th>brand id</th>
<th>brand</th>
<th>item name</th>
<th>selling price</th>
<th>cost price</th>
<th>size</th>
<th>no of items</th>
<th>current discount</th>
</tr>";
$z99=0;
while($row9 = $result9->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row9['brand_id'] . "</td>";
echo "<td>" . $row9['brand_name'] . "</td>";
echo "<td>" . $row9['itm_name'] . "</td>";
echo "<td>" . $row9['sprice'] . "</td>";
echo "<td>" . $row9['cprice'] . "</td>";
echo "<td>" . $row9['pnwsize'] . "</td>";
echo "<td>" . $row9['no_items'] . "</td>";
if(!empty($row9['cdiscount']))
{
echo "<td>" . $row9['cdiscount'] . "</td>";
}
else
{
	echo "<td>" .$z99. "</td>";
}
echo "</tr>";
}
echo "</table>";
$con->close();
 
?>
</div>

</body>
</html>
