<?php
require 'core.inc.php';
require 'connection.inc.php';

if(isset($_POST['storeID'])
{
$storeID = $_POST['storeID'];
$username = $_POST['username'];
 
if(!empty($storeID))
{
    $sql = "UPDATE `User_Id` SET `storeID` = '$storeID' WHERE `username` = '$username'";

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
}

?>