<?php
	include 'login_info.php';
?>

<!-- register.php -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
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

	input[type="submit"]{
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
	  button {
        display: block;
        margin: 0 auto;
        width: 100px;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        cursor: pointer;
      }p {
	  text-align: center;

  font-size: 18px;
  color: #666;
  line-height: 1.5;
  margin-top: 20px;
  margin-bottom: 50px;
}
</style>

<body>
  <h1>Register</h1>
  <form action="register.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="first_name">Nome:</label>
    <input type="text" id="first_name" name="first_name">
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br><br>
    <input type="submit" value="Submit">
              
  </form>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_username = $_POST['username'];
  $user_first_name = $_POST['first_name'];
  $user_password = $_POST['password'];

	$servername = "db"; // replace with your hostname
	$username = "root"; // replace with your username
	$password = "password"; // replace with your password
	$dbname = "xss_e_commerce"; // replace with your database name

	$conn = new mysqli($servername,$username,$password,$dbname);

  // Insert data into customers table
  $query = "INSERT INTO customers (username, first_name,  password) VALUES ('$user_username', '$user_first_name', '$user_password')";
  
if ($conn->query($query) === TRUE) {
  echo "<p>New record created successfully</p>";
} else {
  echo "<p>Error: " . $sql . "<br>" . $conn->error."</p>";
}

  // Close connection
$conn->close();
}
?>

