<?php
require 'core.inc.php';
require 'connection.inc.php';

if(isset($_POST['username'])&&isset($_POST['password']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];
$password_hash=md5($password);
 
//echo $password_hash;
 
if(!empty($username)&&!empty($password))
{
    $sql = "INSERT INTO `User_Id` (`username`, `password`, `firstname`, `lastname`) VALUES ('$username', '$password_hash', '$fname', '$lname')";

    $retval = mysql_query($sql) or die(mysql_error());
    
    if ($retval)
    {
        header("Location: store.html");
        exit();
    }
    else{
    	header("Location: newUser.php");
    	exit();
    }
}
}

?>