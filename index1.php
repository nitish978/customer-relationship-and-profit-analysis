<!DOCTYPE html>
<html>
<head>
<script>
	function validateForm() {
    var x = document.forms["name1"]["pass"].value;
	var y = document.forms["name1"]["name"].value;
    if ((x != null && x != "")&& (y == null || y== "")){
        alert("name must be filled out");
        return false;
    }
	else if ((x == null || x == "")&& (y == null || y== "")){
        alert("Name and password not correct");
        return false;
    }
	if ((x == null || x == "")&& (y!= null && y!= "")){
        alert("password must be filled out");
        return false;
    }
}

</script>
<style>
body {
	margin:0;
	background-image: url("paper.jpeg");
	 }
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

<ul class="topnav" id="myTopnav">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
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
<div class="container">
    <div class="con1">   
         <h1>login/Register</h1>
		  <div class="con2">
		       <form name="name1" action="login1.php" onsubmit="return validateForm()" method="POST" class="form1">
			      <strong>Username:</strong><input type="text" name="name" style="width:200px; height:30px"></input>
				   <strong>Password:</strong><input type="password" name="pass" style="width:200px; height:30px"></input>
				   <br>
				   <input type="submit" style=" margin-top:10px; width:100px; height:40px; margin-left:8%; background-color:#3399cc;" value="submit">
			  </form>
		  </div>
		  <div class="con3">
		     <h1>For New User<br><h3>click here:</h3></h1>
		        <div class="con4" style=" margin-left:140px;">
		        <a href="signup.php"><strong>signup</strong></a>
				</div>
		  </div>
    </div>
</div>
</body>
</html>

