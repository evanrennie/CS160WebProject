

<?php
$servername = "localhost";
$username = "root";
$password = "rootpassword";
$dbname = "test_db";

session_start();


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = mysqli_query($conn,'SELECT * FROM `store_1`');
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
while ($row = mysqli_fetch_assoc($result)) {
    // Use the data in $row

	 echo "[";
	foreach ($row as $name => $value) {
    echo " $value";
}
	 echo "]|";
}

$conn->close();
?>
