<?php
require 'connection.inc.php';
require 'core.inc.php';

if(isset($_POST['username'])&&isset($_POST['password']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];
$password_hash=md5($password);
$_SESSION['username'] = $username;
 
//echo $password_hash;
 
if(!empty($username)&&!empty($password))
{
    $sql = "INSERT INTO `User_Id` (`username`, `password`, `firstname`, `lastname`) VALUES ('$username', '$password_hash', '$fname', '$lname')";

    $retval = mysql_query($sql) or die(mysql_error());

    
    if ($retval)
    {
    	$query = mysql_query("SELECT * FROM User_Id WHERE username ='$username' AND password = '$password_hash'") or die(mysql_error()); 
 
		$data = mysql_fetch_array($query);

		$query_run=$query;
		$query_num_rows = mysql_num_rows($query_run);

		if($query_num_rows==1)
		{
		echo 'ok';
		$user_id= mysql_result($query_run,0,'id');
		$user_id=$data['id'];
		$_SESSION['user_id'] = $user_id;
        header("Location: map.php");
        exit();
    	}	
    }
    else{
    	header("Location: newUser.php");
    	exit();
    }
}
}

?>