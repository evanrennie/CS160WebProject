<?php
if(isset($_POST['username'])&&isset($_POST['password']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$password_hash=md5($password);
 
//echo $password_hash;
 
if(!empty($username)&&!empty($password))
{
$query = mysql_query("SELECT * FROM User_Id WHERE username ='".$username."' AND password ='".$password_hash."'") or die(mysql_error()); 
 
$data = mysql_fetch_array($query);
 
$test=$data['password'];
 
$query_run=$query;
$query_num_rows = mysql_num_rows($query_run);
if($query_num_rows==0)
{
echo 'Invaldid username/password combination.';
}
else if($query_num_rows==1)
{
echo 'ok';
$user_id= mysql_result($query_run,0,'id');
$user_id=$data['id'];
$_SESSION['user_id'] = $user_id;
header("Location:".$_SERVER['PHP_SELF']. " ");
}
{
}
 
}
else
{
echo 'You must supply a username and password';
}
 
}
