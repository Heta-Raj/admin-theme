<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cork";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
/*if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE DATABASE cork";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$sql_table ="CREATE TABLE auth_register (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_table) === TRUE) {
  echo "Table auth_register created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
*/
/*$sql_table = "CREATE TABLE user_reg (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
dob date VARCHAR(50),
city VARCHAR(30),
state VARCHAR(30),
country VARCHAR(30),
pincode VARCHAR(30),
gender VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql_table) === TRUE) {
  echo "Table auth_register created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}*/

/*$conn->close();
*/
?>