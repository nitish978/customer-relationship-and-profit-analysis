<!DOCTYPE html>
<html>
<head>
<script>
	function validateForm() {
    var x = document.forms["name2"]["phno"].value;
	var y = document.forms["name2"]["cname"].value;
    if ((x != null && x != "")&& (y == null || y== "")){
        alert("name must be filled out");
        return false;
    }
	else if ((x == null || x == "")&& (y == null || y== "")){
        alert("Name and phone no not correct");
        return false;
    }
	if ((x == null || x == "")&& (y!= null && y!= "")){
        alert("phone no must be filled out");
        return false;
    }
}

</script>
<style>
body {
	margin:0;
	background-image: url("paper.jpeg");
	 }
	 div.container{
	          
			  weight:78%;
			  height:700px;
			  margin-top:10px;
			  margin-left:11%;
			  margin-right:11%;
			  
}
div.con1{
	    text-align:center;
		margin-top:20%;		
}
div.con3{
	margin-top:40px;
	text-align:center;
	margin-left:60%;
	   width:250px;
	   height:300px;
	 
	  
	   
}
div.con4{
	
	 text-align:center;
	border:1px solid black;
	   width:100px;
	   height:30px;
	   background-color:#lightgray;
	   
}
</style>
</head>
<body>
<div class="container">
    <div class="con1">   
         <h1>login/Register</h1>
		  <div class="con2">
		       <form name="name2" action="customerfeedback.php" onsubmit="return validateForm()" method="GET" class="form1">
			      <strong>Customer Name:</strong><input type="text" name="cname" style="width:200px; height:30px;"></input>
				   <strong>Phone no:</strong><input type="password" name="phno" style="width:200px; height:30px;"></input>
				   <br>
				   <input type="submit" style=" margin-top:10px; width:100px; height:40px; margin-left:8%; background-color:#3399cc;" value="submit">
			  </form>
		  </div>
    </div>
</div>
</body>
</html>


