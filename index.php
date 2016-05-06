<?php 
require 'core.inc.php';
require 'connection.inc.php';
if(loggedin())
 {  
 $rightvar=$_SESSION['user_id'];
 $result = mysql_query("SELECT * FROM User_Id WHERE id = $rightvar") or die(mysql_error());  
               $data = mysql_fetch_array($result);  
   $firstname=$data['firstname'];
   $surname=$data['lastname'];
   $userid=$data['id'];
    
   echo 'Welcome! ' . $firstname . ' ' . $surname .'<a  href="logout.php"><input type="button"  value="Logout"/></a>';
   echo 'Or Continue to Site' . '<a href="fruits.html"><input type="button" value="SaveMax"/></a>';
 }
else
{
include 'login.inc.php';
}
?>
