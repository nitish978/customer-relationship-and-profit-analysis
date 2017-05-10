<?php
 session_start();
 if(!isset($_SESSION['name'])||$_SESSION['name']=='')
 {
	 header("location:index1.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<style>
body {
	margin:0;
	background-color:lightgrey;}
ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

ul.topnav li {float: left;}
ul.topnav li a {
  display: inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: 0.3s;
  font-size: 17px;
}
ul.topnav li.a {float: right;}
			
ul.topnav li a:hover {background-color: #555;}

ul.topnav li.icon {display: none;}

@media screen and (max-width:680px) {
  ul.topnav li:not(:first-child) {display: none;}
  ul.topnav li.icon {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width:680px) {
  ul.topnav.responsive {position: relative;}
  ul.topnav.responsive li.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  ul.topnav.responsive li {
    float: none;
    display: inline;
  }
  ul.topnav.responsive li a {
    display: block;
    text-align: left;
  }
}
div.container1{
	          
			  width:40%;
			  height:50px;
			  margin-buttom:15px;
			  margin-left:30%;
			  text-align:center;
}
h1.a1{
	margin-top:0px;+
}
</style>
</head>
<body>

<ul class="topnav" id="myTopnav">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li class="a"><a href="logout.php">logout</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
</ul>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<div class="container1">
   <h1 class="a1"><strong>welcome</strong><?php
                         echo "  ".$_SESSION['name'];?></h1>
</div>	
<div  style="margin-top:20px;width:70%;">
<h3 style="padding-left:10px;">record of items</h3>

<h id='x' style="margin-left:10px;margin-top:1%;"onclick="document.getElementById('cdisplay').style.display='block'">display items</h>
<div id="cdisplay" class="container2" style="display:none;">
<button type="button" onclick="document.getElementById('cdisplay').style.display='none' ">close</button>
<?php
$con=new mysqli('localhost','root','','college');
if($con->connect_error)
{
	die("connection error");
}
$sql = "SELECT * FROM itm_name";
$result=$con->query($sql);
echo "<table border='1'>
<tr>
<th>brand Id</th>
<th>item name</th>
<th>selling price</th>
<th>cost price</th>
<th>size</th>
<th>no of items</th>
</tr>";

while($row = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row['brand_id'] . "</td>";
echo "<td>" . $row['itm_name'] . "</td>";
echo "<td>" . $row['sprice'] . "</td>";
echo "<td>" . $row['cprice'] . "</td>";
echo "<td>" . $row['pnwsize'] . "</td>";
echo "<td>" . $row['no_items'] . "</td>";
echo "</tr>";
}
echo "</table>";

?>
</div>
</div>
<div>
<a href="add1.php">ADD ITEMS</a>
</div>
<br><br/>

<script>
$(document).ready(function(){
    $("#x1212").click(function(){
        $("#x12").slideToggle("slow");
    });
});
</script>
<div id="x1212" style="padding:5px;text-align:center;background-color: #e5eecc;
    border: solid 1px #c3c3c3;">Click Here To Display Item With Profit</div>
<div id="x12" style="padding:100px;background-color:#bad9df;test-align:center;display:none;">
<?php
$sql1 = "SELECT s.brand_id,a.itm_name,s.itm_sold_in_curprice,a.pnwsize,
             a.sprice,a.cprice,s.cdiscount 
            FROM prifitanalysis AS s
			INNER JOIN itm_name a
			ON a.brand_id=s.brand_id";
        $result1=$con->query($sql1);
echo "<table border='1' style='margin-left:30%;'>
<tr>
<th>brand</th>
<th>item name</th>
<th>selling price</th>
<th>cost price</th>
<th>size</th>
<th>sold items</th>
<th>current discount</th>
<th>profit</th>
</tr>";

while($row1 = $result1->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row1['brand_id'] . "</td>";
echo "<td>" . $row1['itm_name'] . "</td>";
echo "<td>" . $row1['sprice'] . "</td>";
echo "<td>" . $row1['cprice'] . "</td>";
echo "<td>" . $row1['pnwsize'] . "</td>";
echo "<td>" . $row1['itm_sold_in_curprice']."</td>";
echo "<td>" . $row1['cdiscount']."</td>";
echo "<td>" .$row1['itm_sold_in_curprice']*(($row1['sprice']*(100-$row1['cdiscount'])/100)-$row1['cprice'])."</td>";
echo "</tr>";
}
echo "</table>";

?>
</div>
<script>
$(document).ready(function(){
    $("#s4").click(function(){
        $("#s5").slideToggle("slow");
    });
});
</script>
<script>
$(document).ready(function(){
    $("#s2").click(function(){
        $("#s3").slideToggle("slow");
    });
});
</script>
<div id="s4" style="padding:5px;text-align:center;background-color: #e5eecc;
    border: solid 1px #c3c3c3;"> Click Here To Display total Profit for particular items </div>
<div id="s5" style="padding:20px;text-align:center;background-color:grey;display:none;">
<form method="GET" ACTION="manager.php" id="s2">
  <input type="text" placeholder="ENTER BRAND ID" name="text1">
  <input type="submit" >
</form>
</div>
<div id="s3" style="padding:100px;background-color:#bad9df;test-align:center;display:none;">
<?php
 if(isset($_GET['text1']))
  {
	  if(!empty($_GET['text1']))
	  {
		 
          		  $sq10="SELECT * FROM itm_name WHERE brand_id='$_GET[text1]'";
		  $re=$con->query($sq10);
		  
		
		  $row10=$re->fetch_assoc();
		  echo "<table border='1' style='margin-left:30%;'>
				<tr>
				<th>brand id</th>
				<th>item name</th>
				<th>selling price</th>
				<th>cost price</th>
				<th>size</th>
				<th>sold items</th>
				<th>discount in %</th>
				<th>total profit</th>
				</tr>";
		 
		  


	  }
  }
?>
<?php
if(isset($_GET['text1']))
  {
	  if(!empty($_GET['text1']))
	  {
		  $tprofit3=0;
		   $sql0="SELECT * FROM prifitanalysis WHERE brand_id='$_GET[text1]'";
		    $res0=$con->query($sql0);
			 while($row0=$res0->fetch_assoc())
		   {
			$tprofit3=$row0['itm_sold_in_curprice']*(($row10['sprice']*(100-$row0['cdiscount'])/100)-$row10['cprice']);
            echo "<tr>";
			echo "<td>" . $row10['brand_id'] . "</td>";
			echo "<td>" . $row10['itm_name'] . "</td>";
			echo "<td>" . $row10['sprice'] . "</td>";
			echo "<td>" . $row10['cprice'] . "</td>";
			echo "<td>" . $row10['pnwsize'] . "</td>";
			echo "<td>" . $row0['itm_sold_in_curprice']."</td>";
			echo "<td>" . $row0['cdiscount']."</td>";
			echo "<td>" .$row0['itm_sold_in_curprice']*(($row10['sprice']*(100-$row0['cdiscount'])/100)-$row10['cprice'])."</td>";
			echo "</tr>";
			
		  }
	  }
  }
?>
<?php
if(isset($_GET['text1']))
  {
	  if(!empty($_GET['text1']))
	  {
		  $sql00="SELECT * FROM profitdetail WHERE brand_id='$_GET[text1]'";
		$tprofit2=0;
		  $res00=$con->query($sql00);
			while($row00=$res00->fetch_assoc())
		    {
				
		      $tprofit1=($row00['total_sold']*((($row10['sprice'])*(100-$row00['discount'])/100)-$row10['cprice']));
			    $tprofit2=$tprofit2+$tprofit1;
				echo "<tr>";
				echo "<td>" . $row10['brand_id'] . "</td>";
				echo "<td>" . $row10['itm_name'] . "</td>";
				echo "<td>" . $row10['sprice'] . "</td>";
				echo "<td>" . $row10['cprice'] . "</td>";
				echo "<td>" . $row10['pnwsize'] . "</td>";
				echo "<td>" . $row00['total_sold']."</td>";
				echo "<td>" . $row00['discount']."</td>";
				echo "<td>" .$tprofit1."</td>";
				echo "</tr>";

		    }
			$tprofit4=$tprofit2+$tprofit3;
			   echo "<tr>";
			   echo "<td>"."</td>";
				echo "<td>" ."</td>";
				echo "<td>" . "</td>";
				echo "<td>"  ."</td>";
				echo "<td>" ."</td>";
				echo "<td>" ."</td>";
				echo "<td>TOTAL PROFIT</td>";
			    echo "<td>".$tprofit4."</td>";
			  echo "</tr>";

	  }
  }
  
  echo "</table>";
?>
</div>
<script>
$(document).ready(function(){
    $("#div1").click(function(){
        $("#div2").slideToggle("slow");
    });
});
</script>
<div id="div1"style="padding:5px;text-align:center;background-color: #e5eecc;
    border: solid 1px #c3c3c3;">Update No Of Items</div>
   <div id="div2" style="padding:20px;text-align:center;background-color:grey;display:none;">
      <form method="GET" action="update.php">
	  <input type="text" placeholder="ENTER BRAND ID"name="brandid1">
	  <input type="text" placeholder="ADD NO OF ITEMS"name="noofitms">
	  <input type="submit">
	  </form>
	  </div>


<script>
$(document).ready(function(){
    $("#div3").click(function(){
        $("#div4").slideToggle("slow");
    });
});
</script>
<div id="div3"style="padding:5px;text-align:center;background-color:#e5eecc;
    border: solid 1px #c3c3c3;">update selling price</div>
   <div id="div4" style="padding:20px;text-align:center;background-color:grey;display:none;">
      <form method="GET" action="update.php">
	  <input type="text" placeholder="ENTER BRAND ID"name="brandid2">
	  <input type="text" placeholder="DISCOUNT PERCENTAGE"name="sprice2">
	  <input type="submit">
	  </form>
	  </div>


<?php
if(isset($_SESSION['aa'])&&$_SESSION['aa']!="")
{

if($_SESSION['aa']==0)
{
  echo '<script>alert("This Items Are Not Available")</script>';
   unset($_SESSION['aa']);
   unset($_SESSION['bb']);   
}
if($_SESSION['aa']==1)
{
	echo '<script>alert("successfully updated no of items")</script>';
	unset($_SESSION['aa']);
	unset($_SESSION['bb']);
}
}
if(isset($_SESSION['bb'])&&$_SESSION['bb']!="")
{	

	if($_SESSION['bb']==0)
		{
			echo '<script>alert("ENTER valid Items")</script>';
		}
		   unset($_SESSION['bb']);
		   unset($_SESSION['aa']);
}


?>
<script>
$(document).ready(function(){
    $("#div33").click(function(){
        $("#div44").slideToggle("slow");
    });
});
</script>
<div id="div33"style="padding:5px;text-align:center;background-color:#e5eecc;
    border: solid 1px #c3c3c3;">update BRAND ID</div>
   <div id="div44" style="padding:20px;text-align:center;background-color:grey;display:none;">
      <form method="GET" action="update.php">
	  <input type="text" placeholder="ENTER BRAND ID"name="brandid6">
	  <input type="text" placeholder="enter correct ID"name="brandid7">
	  <input type="submit" value="update">
	  </form>
	  </div>

<?php
require_once"alertmassage.php";
?>	
<?php

$con->close();
?>	 
</body>
</html>
