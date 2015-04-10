<!--http://www.w3schools.com/php/php_mysql_connect.asp -->

<?php


$servername = "engr-cpanel-mysql.engr.illinois.edu";
$username = "receiptr_user";
$password = "bamboo1234";
$dbname = "receiptr_backend";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//sql query
$sql = "SELECT * FROM product";
$result = mysqli_query($conn,$sql);

//html table
echo "<table>";
echo "<tr><th>ProductID</th><th>Name</th><th>Brand</th></tr>";

//loop through result of sql query
while($row = mysqli_fetch_array($result)) {
	$ProductID = $row['ProductID'];
    $name = $row['name'];
    $brand = $row['brand'];
    echo "<tr><td style='width: 200px;'>".$ProductID."</td><td style='width: 200px;'>".$name."</td><td>".$brand."</td></tr>";} 

//close html table
echo "</table>";

$conn->close();
?>


