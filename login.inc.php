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
 
?>
<!-- <div align="center">
<form action="<?php echo $current_file; ?>" method="POST">
Username: <input type="text" name="username"> Password: <input type="password" name="password">
<input type="submit" value="Log in">
</form>
</div> -->

    <head>
        <meta charset="UTF-8"/>
        <title>
                SaveMax User Login, Welcome!
        </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/signInStyles.css" media="screen" />
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
    </head> 
    <body>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            $(function(){
                $("#header").load("header.html");
                $("#footer").load("footer.html");
            });
        </script>
        <div id="header"></div>
        <form action="<?php echo $current_file; ?>" method="POST">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <form>
                        <input type="text" name="username" placeholder="username">
                        <input type="password" name="password" placeholder="password">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Log in">
                    </form>
                    <div>
                        <a href = "newUser.php"> New User </a> 
                    </div>
                </div>
            </div>

            <div id="footer"></div>
        </form>
    </body>
