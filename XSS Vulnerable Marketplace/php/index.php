<?php
	include 'login_info.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>XSS vulnerable E-Commerce</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
      margin-top: 50px;
    }
    .navigation {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }
    .navigation a {
      padding: 10px 20px;
      background-color: #f2f2f2;
      border: 1px solid #ccc;
      border-radius: 5px;
      text-decoration: none;
      color: #333;
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <h1>XSS E-Commerce</h1>


<script> //DOM-BASED XSS VULNERABILITY HERE!
	const urlSearchParams = new URLSearchParams(window.location.search); 
	const params = Object.fromEntries(urlSearchParams.entries());
	let region = 'IT';
	if(params.region === undefined)
	{
		document.write("IT");
		urlSearchParams.set('region','IT');
		document.location.search=urlSearchParams;
	}
	else{
		region = params.region;
	}
	document.write('<h3 id="region"  style="text-align: center;">Region: '+region+' </h3>'); //procs xss
	//document.getElementById("region").innerHTML = "Region: "+region //this filters xss attacks but have to initiate region somwhere by HTML or js
</script>

  <div class="navigation">
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <a href="search_product.php">Search product</a>
    <a href="search_user.php">Search user</a>
    <a href="all_users.php">All Users</a>
  </div>
</body>
</html>
