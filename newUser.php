<?php
require 'connection.inc.php';
require 'core.inc.php';

?>
    <head>
        <meta charset="UTF-8"/>
        <title>
                New User Account Creation
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
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        <script type = "text/javascript">
            function validate() {
                var errorRed = "rgb(229, 84, 81)";
				var goodGreen = "rgb(74, 160, 44)";
				var errors = "";

                var uname  = document.getElementById("username").value;
				if (uname == "") {
					errors += "Username is required.\n"
					document.getElementById("username").style.background = errorRed;
				}
				else {
					document.getElementById("username").style.background = goodGreen;
				}

                var fname  = document.getElementById("firstName").value;
                var lname  = document.getElementById("lastName").value;
				if (fname == "" || lname == "") {
                    errors += "First and last names are required.\n";
					document.getElementById("firstName").style.background = errorRed;
					document.getElementById("lastName").style.background = errorRed;
                }
				else {
					document.getElementById("firstName").style.background = goodGreen;
					document.getElementById("lastName").style.background = goodGreen;
				}

                var email = document.getElementById("email").value;
                var emailRE = /^.+@.+\..{2,4}$/;
                if (!emailRE.test(email)) {
                    errors += "Invalid email address. Example: xxxxx@xxxxx.xxx\n";
					document.getElementById("email").style.background = errorRed;
                }
				else {
					document.getElementById("email").style.background = goodGreen;
				}

				var pass = document.getElementById("password").value;
				var passCheck = document.getElementById("passwordCheck").value;
				if (pass == "") {
					errors += "Password is required.\n";
					document.getElementById("password").style.background = errorRed;
				}
				else {
					document.getElementById("password").style.background = goodGreen;
					if (pass !== passCheck) {
						errors += "Passwords do not match.\n";
						document.getElementById("passwordCheck").style.background = errorRed;
					}
					else {
						document.getElementById("passwordCheck").style.background = goodGreen;
					}
				}

				if (errors) {
					alert(errors);
					return false;
				}
            }
        </script>
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
        <div>
            <form action="insertNewUser.php"  method="POST" onsubmit="return validate()">

                <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <form>
                            <input type="text" name="username" id="username" placeholder="Username">
                            <input type="text" name="firstName" id="firstName" placeholder="First Name">
                            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                            <input type="text" name="email" id="email" placeholder="Email">
                            <input type="password" name="password" id="password" placeholder="Password">
                            <input type="password" name="passwordCheck" id="passwordCheck" placeholder="Re-Enter Password">
                            <input type="submit" name="login" class="login loginmodal-submit" value="Create New Account">

                        </form>

                        <div class="login-help">
                            <a href="index.php">Have an Exsiting Account?</a>
                        </div>
                    </div>
                </div>

                <div id="footer"></div>
            </form>
        </div>
    </body>