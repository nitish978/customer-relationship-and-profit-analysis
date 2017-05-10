<?php
$sql="SELECT * FROM  itm_name where no_items<100";
$result=$con->query($sql);
$row=$result->fetch_assoc();
if(!empty($row["brand_name"]))
{
	echo '<script>alert("HELLO SIR,there are some item/items you may want to update")</script>';
}
?>
<?php
$s1="SELECT * FROM itm_name";
  $r1=$con->query($s1);
while($rw7=$r1->fetch_assoc())
{
	$itmname3=$rw7['brand_id'];
$s="SELECT * FROM feedback WHERE brand_id='$itmname3'";
$r=$con->query($s);
$a=0;
$b=0;
$c=0;
while($rw9=$r->fetch_assoc())
{
	if($rw9['comment']=='very poor')
	{
	   	$a=$a+1;
	}
	if($rw9['comment']==='poor')
	{
	  	$b=$b+1;
	}
	if($rw9['tstar']==1)
	{
		$c=$c+1;
	}
	
}
if($a>=1)
	{
			echo '<script>alert("ALERT!!! SOME ITEMS GOT VERY BAD REVIEWS ='.$itmname3.'")</script>';
			
	}
	if($b>=1)
	{
			echo '<script>alert("please check item with itm id  ='.$itmname3.'")</script>';
			
	}
	if($c>=7)
	{
			echo '<script>alert("please check item with itm id  ='.$itmname3.'")</script>';
			
	}
}
?>
