<!DOCTYPE html>
<html>
<head>
</head>
<body>
<button type="button" onclick="document.getElementById('123').style.display='none'">close</button>
<button type="button" onclick="document.getElementById('123').style.display='block'">display</button>
<div id="123" style="text-align:center;margin-left:30%;margin-top:50px;margin-buttom:50px;padding-top:10%;height:500px;width:600px;display:none;background-color:lightgrey;">
<h1 style="color:#4d3e8d;">BIG BAZAR</h1>
<script>
function goback()
{
	window.history.back()
}
</script>
<form method="GET" action="1.php">
     ITEMS NAME     :<input type="text" name="itm_name" style="margin-right:0px;"required>
	<br>
     BRAND ID       :<input type="text" name="brand_id"style="margin-right:0px;"required>
	<br>
	 BRAND NAME     :<input type="text" name="brand_name"style="margin-right:0px;"required>
	<br>
	 PRODUCT SIZE   :<input type="text" name="pnwsize"style="margin-right:0px;"required>
	<br>
     SELLING PRICE  :<input type="text" name="sprice"style="margin-right:0px;"required>
	<br>
     COST PRICE     :<input type="text" name="cprice"style="margin-right:0px;"required>
	<br>
	 No Of Items    :<input type="text" name="no_items"style="margin-right:0px;"required>
	<br>

	<input type="submit" name="Submit">

</form>
	<input type="submit" value="Back" onclick="goback()">
</div>
</body>
</html>
