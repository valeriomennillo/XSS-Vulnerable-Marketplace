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
	
      table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
      }

      th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: #dddddd;
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
      }
      
    </style>
  </head>
  <body>
    <h1>Customers</h1>
    <table>
      <tr>
        <th>Username</th>
        <th>Name</th>
      </tr>
      <?php
        $servername = "db"; // replace with your hostname
        $username = "root"; // replace with your username
        $password = "password"; // replace with your password
        $dbname = "xss_e_commerce"; // replace with your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve all customers
        $query = "SELECT username,first_name FROM customers";
        $result = $conn->query($query);

        // Display customers
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"]. "</td>";
            echo "<td>" . $row["first_name"]. "</td>";
            echo "</tr>";
          }
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
      ?>
    </table>

  </body>
</html>
