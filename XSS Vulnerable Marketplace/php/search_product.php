<?php
  include 'login_info.php';
?>
<!-- search_product.php -->


<html>


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
        cursor: pointer;}
	table {
  margin: 0 auto;
  width: 60%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
}

th {
  background-color: #f2f2f2;
}
</style>
<h1>Search product</h1>
<form action="search_product.php" method="get">
  <input type="text" name="q">
  <input type="submit" value="Search">
            
</form>


<?php
// Connect to the database
$servername = "db"; // replace with your hostname
$username = "root"; // replace with your username
$password = "password"; // replace with your password
$dbname = "xss_e_commerce"; // replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if a search query was submitted
if (isset($_GET['q'])) {
    $q = $_GET['q'];

    //$q = mysqli_real_escape_string($conn, $q); this prevents reflected XSS and SQL Injection
    echo "<p> You searched for <b>" . $q . "</b></p>";
    
    // Create the SELECT query
    $query = "SELECT product_id, product_name, product_description, price FROM products WHERE product_name LIKE '%$q%'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any records were found
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>";
        // Loop through the result set and display the data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['product_id'] . "</td>
                    <td>" . $row['product_name'] . "</td>
                    <td>" . $row['product_description'] . "</td>
                    <td>" . $row['price'] . "</td>
                </tr>";
        }
        echo "</table>";
}

// Close the connection
mysqli_close($conn);
?>

</body></html>
