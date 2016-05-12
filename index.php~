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


    
   echo 'Welcome! ' . $firstname . ' ' . $surname .'  <a  href="logout.php"><input type="button"  value="Logout"/></a><br>';
   echo 'Or Continue to Site' . '  <a href="store.html"><input type="button" value="SaveMax"/></a>';
 }
else
{
include 'login.inc.php';
}
?>
<head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/signInStyles.css" media="screen" /> 
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

