<?php
$dbc = mysql_connect('localhost','root','') or  die("Cant connect :" . mysql_error());
 
mysql_select_db("Login_Info",$dbc)
 
or
die("Cant connect :" . mysql_error()); 
 
?>
