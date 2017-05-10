<?php
session_start();
$con=new mysqli('localhost','root','','college');
if($con->connect_error)
{
	die("connection error");
}

  if(isset($_GET['brandid2'])&&isset($_GET['sprice2']))
  {
	  if(!empty($_GET['brandid2'])&&!empty($_GET['sprice2']))
	  {
		  $sql33="SELECT * FROM prifitanalysis WHERE brand_id='$_GET[brandid2]'";
		  $result33=$con->query($sql33);
		  $x33=0;
		  $y33=0;
		   $x444=0;
		  while($row33=$result33->fetch_assoc())
		  {
			    $x444=1;
			    $x33=$row33['itm_sold_in_curprice'];
				$y33=$row33['cdiscount'];			   
		  }
		  $date=date('y-m-d');
            
            if($x444==1)
			{
				$sql44="INSERT INTO profitdetail(brand_id,discount,dis_date,total_sold)
		                       VALUES('$_GET[brandid2]','$y33','$date','$x33')"; 
                         $result44=$con->query($sql44);
				$sql4="UPDATE prifitanalysis SET cdiscount=$_GET[sprice2],itm_sold_in_curprice=0 WHERE  brand_id='$_GET[brandid2]'";			   
                        if($con->query($sql4)===TRUE)
						{
							
						  header("location:manager.php");
						}
			}
            else
            {
				$sq="INSERT INTO prifitanalysis(brand_id,cdiscount,itm_sold_in_curprice,
				                                total_sold,curr_profit)
												VALUES('$_GET[brandid2]','$_GET[sprice2]','0','0','0)";
				       $re=$con->query($sq);
					   header("location:manager.php");
			}				
						 
      }
   
  }
?>
<?php

  if(isset($_GET['brandid1'])&&isset($_GET['noofitms']))
  {
	  $_SESSION['bb']=0;
	  if(!empty($_GET['brandid1'])&&!empty($_GET['noofitms']))
	  {
		  $_SESSION['aa']=0;
		  $_SESSION['bb']=1;
			        $sq2="SELECT * FROM itm_name WHERE brand_id='$_GET[brandid1]' AND no_items+$_GET[noofitms]<=100";
			        $res=$con->query($sq2);
                   $rw1=$res->fetch_assoc();
                 if(!empty($rw1['brand_id']))
				 {					 
			        $sql3="UPDATE itm_name SET no_items=no_items+$_GET[noofitms] WHERE brand_id='$_GET[brandid1]'";
                        if($con->query($sql3)===TRUE)
						{
							    
								$_SESSION['aa']=1;
							    header("location:manager.php");
						}
				 }
				 else
				 {
					    header("location:manager.php");
				 }
      }
	  else
	  {
		  
		  header("location:manager.php");
	  }
   
  }
 
?>
<?php
  if(isset($_GET['brandid6'])&&isset($_GET['brandid7']))
  {
	  if(!empty($_GET['brandid6'])&&!empty($_GET['brandid7']))
	  {
		$n="UPDATE itm_name SET brand_id='$_GET[brandid7]' WHERE brand_id='$_GET[brandid6]'";
        $n1=$con->query($n);
        if($con->query($n)===TRUE)

		{
			header("location:manager.php");
		}			
	  }
  }
   $con->close();
?>	