<?php
require 'connection.inc.php';
session_start();

$storeID = $_POST['submit'];

//$storeID = 'store1';

$id = $_SESSION['user_id'];
$username = $_SESSION['username'];

 
if(!empty($username)&&!empty($id)&&!empty($storeID))
{
    $sql = "UPDATE `User_Id` SET `storeID`='$storeID' WHERE `username`='$username' ";

    $retval = mysql_query($sql) or die(mysql_error());
    
    if ($retval)
    {
        header("Location: store.html");
        exit();
    }
    else{
    	header("Location: map.php");
    	exit();
    }
}

?>