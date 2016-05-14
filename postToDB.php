

<?php
$servername = "localhost";
$username = "root";
$password = "rootpassword";
$dbname = "test_db";

$allItems ="<script>document.write(localStorage.getItem('keys'));</script>";
$allValues ="<script>document.write(localStorage.getItem('values'));</script>";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 
$sql = "UPDATE store_1 SET stock='10' WHERE item='Apples'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}




$conn->close();

sendEmail();

function sendEmail(){

date_default_timezone_set('America/Los_Angeles');
$date = date('m/d/Y h:i:s a');
$today = date("H:i:s");
$todayTo24 = date("G:i", strtotime($today));
$driverTimes[0] = date("09:00:00");
$driverTimes[1] = date("11:00:00");
$driverTimes[2] = date("13:00:00");
$driverTimes[3] = date("15:00:00");
$driverTimes[4] = date("17:00:00");

for($i = 0; $i < sizeOf($driverTimes); $i++)
{
	if($todayTo24 < $driverTimes[$i])
	{
		$todayTo24 = $driverTimes[$i];
		$today = date('h:i:s a', strtotime($todayTo24));
		$i = sizeOf($driverTimes);
	}
}
if($today > $driverTimes[sizeOf($driverTimes)-1]){
	$today = "tomorrow at 09:00:00";
}

//$queryFirst = "SELECT "
//$queryLast = "SELECT " 
//$queryPrice = "SELECT "
//$queryEmail = "SELECT "

$firstname = "test";//mysql_query($queryFirst);
$lastname =  "test";//mysql_query($queryLast);
$price =  "test";//mysql_query($queryPrice);
$email =  "mphan47@yahoo.com";//mysql_query($queryEmail);

$to      = $email; // Send email to our user
$subject = 'Order Receipt'; // Give the email a subject 

$message = ' 

Dear $firstname $lastname,
Thanks for shopping with us!
The details of your order are below:
 
------------------------

Your order has been placed on $date.
Total price: $price.
The next delivery will be leaving at approximately $today.
You can expect your groceries soon!

------------------------

Thank again and have a nice day!

'; // Our message above including the link
                     
$headers = 'From:noreply@cs160.sjsu.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
}






?>
