<?php
$con=new mysqli('localhost','root','','college');
if($con->connect_error)
{
	die("connection error");
}
                      if(
                              !empty($_GET['brand_id'])
                               &&!empty($_GET['itm_name'])
                               &&!empty($_GET['brand_name'])
							   &&!empty($_GET['pnwsize'])
							   &&!empty($_GET['sprice'])
							   &&!empty($_GET['cprice'])
							   &&!empty($_GET['no_items']))
{
$sql="INSERT INTO itm_name(brand_id,itm_name,brand_name,pnwsize,sprice,cprice,no_items)
                       VALUES( '$_GET[brand_id]',
							   '$_GET[itm_name]',
							   '$_GET[brand_name]',
							   '$_GET[pnwsize]',
							   '$_GET[sprice]',
							   '$_GET[cprice]',
							    '$_GET[no_items]')";
$sql2="SELECT * FROM items";
$result=$con->query($sql2);
$i=0;
while($row=$result->fetch_assoc())
{ 
if($row['itm_name']===$_GET['itm_name'])
    {
	   $i=1;	
	}
}
if($i==0)
{
	           $sql1="INSERT INTO items(itm_name)
               VALUES('$_GET[itm_name]')";
			   if($con->query($sql1)===TRUE&&$con->query($sql)===TRUE)
			   {
				   header("location:searchbox.php");
			   }
}
if($con->query($sql)===TRUE)
{
	header("location:searchbox.php");
}
else
{
	echo "somthing wrong";
}
}

else
{
	header("location:searchbox.php");
}	
?>