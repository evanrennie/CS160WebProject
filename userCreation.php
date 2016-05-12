<?php
if(isset($_POST['username'])&&isset($_POST['password']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$password_hash=md5($password);
 
if(!empty($username)&&!empty($password))
{

}

}
