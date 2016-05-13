<?php
require 'connection.inc.php';
session_start();

$storeID = "<script>document.write(localStorage.getItem('storeID'));</script>";

//$storeID = $_POST['storeID'];
$id = $_SESSION['user_id'];
$username = $_SESSION['username'];
//echo $id '<br>';

 
if(!empty($storeID)&&!empty($id))
{
    $sql = "UPDATE `User_Id` SET `storeID` = '$storeID' WHERE `username` = '$username' ";

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