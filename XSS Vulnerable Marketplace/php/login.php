<?php
	include 'login_info.php';
?>
<html>
<head>
  	<style>
		body {
			background-color: #F9F9F9;
			font-family: Arial, sans-serif;
		}

	h1 {
		text-align: center;
		margin: 50px 0;
	}

	form {
		background-color: #FFFFFF;
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
		border-radius: 10px;
		padding: 30px;
		margin: 50px auto;
		width: 500px;
	}

	label {
		display: block;
		margin-bottom: 10px;
		font-size: 18px;
		color: #333;
	}

	input[type="text"], input[type="password"] {
		width: 100%;
		padding: 10px;
		margin-bottom: 20px;
		font-size: 16px;
		border: 1px solid #ddd;
		border-radius: 5px;
		outline: none;
	}

	input[type="submit"] {
		width: 100%;
		padding: 10px;
		background-color: #4CAF50;
		color: #FFFFFF;
		font-size: 18px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		margin-top: 20px;
	}
	p {
	  text-align: center;

  font-size: 18px;
  color: #666;
  line-height: 1.5;
  margin-top: 20px;
  margin-bottom: 50px;
}
	button {
        display: block;
        margin: 0 auto;
        width: 100px;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        cursor: pointer;
</style>
</head>
<body>
  <h1>Login</h1>
  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br><br>
    <input type="submit" value="Submit">
          
  </form>


  <?php

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Connect to database
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    $servername = "db"; // replace with your hostname
    $username = "root"; // replace with your username
    $password = "password"; // replace with your password
    $dbname = "xss_e_commerce"; // replace with your database name

    $conn = new mysqli($servername,$username,$password,$dbname);

    // Verify email and password
    $query = "SELECT * FROM customers WHERE username = '$user_username' AND password = '$user_password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = $result->fetch_assoc();
      echo "<p>Login successful! Welcome back " . $row["first_name"] . '<br><a href="index.php">Go to index page</a> </p>';
      // Login successful
      // ...
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $user_username;
  
    } else {
      echo "<p>Login failed</p>";
      // Login failed
      // ...
    }

    // Close connection
    mysqli_close($conn);
  }
  ?>

</body>
</html>
