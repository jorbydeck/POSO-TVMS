<?php
ob_start();
ini_set('memory_limit', '1024M'); // or you could use 1G

require 'action.php';
//include("../_func/_logFile.php");
global $authCode;
$authCode = 1768; //global variable for authentication code
//******METHODS******//
//******************//
                      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POSO TRAFFICE VIOLATION MANAGEMENT SYSTEM V1.0</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- CUstom Login Css -->
     <link href="../dist/css/login.css" rel="stylesheet">
     <link rel="shortcut icon" href="../img/favicon.ico" />


    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

     <!-- action.js for custom SCRIPT FOR AJAX request in LOGIN an REGISTER-->
    <script src="../js/action.js"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <!-- Navbar content -->
      <a class="navbar-brand" href="#">
        <img src="../img/poso.png" width="120" height="120" class="d-inline-block align-top" alt="">
      </a>
        <span class="navbar-text">POSO TRAFFIC VIOLATION MANAGEMENT SYSTEM</span>
    </nav>
<br>
<br>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="form-body">
    <ul class="nav nav-tabs final-login">
        <li><a data-toggle="modal" data-target="#loginModal" href="#sectionA" onclick="_clearOnClick()">Sign In</a></li>
        <li class="active"><a data-toggle="tab" href="#sectionB">New ACCOUNT</a></li>
    </ul>

    <!-- >>>>>>  LOGIN modal <<<< -->
    <!-- >>>>>>>>>>>>>>>>>>>>>> -->
    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>LOGIN YOUR<span class="badge badge-default">ACCOUNT</span></h1>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="sectionA">
                        <div class="innter-form">
                            <form class="sa-innate-form" method="post" id="my-form">
                            <label>Username</label>
                            <input type="text" id="username" name="username" placeholder="Username">
                            <label>Password</label>
                            <input type="password" id="password" name="password" placeholder="Password">
                            <input type="submit" id="login" name="submitLogin" value='Sign In' onclick="_loginScript()" />
                            <a href="">Forgot Password?</a>
                            </form>
                            <div id="error" ></div>
                            </div>
                           
                            <div class="clearfix"></div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>  
                 <!--- REGISTER-->
        <div id="sectionB" class="tab-pane fade in active">
            <div class="innter-form">
            <form class="sa-innate-form" method="post" id="my_rform">
            <label>Name</label>
            <input type="text" name="r_username" id="r_username" placeholder="Your Username">
            <label>Password</label>
            <input type="password" name="r_password" id="r_password" placeholder="Your Password">
            <label>User Type</label>
                <select  id="r_type" name="r_type" placeholder="USER type" style="color: gray">
                    <option value="" disabled selected hidden>USER TYPE</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="superuser">Superuser</option>
                </select>
            <label>Enter Authorization Code</label>
            <input type="password" name="r_auth" id="r_auth" placeholder="CONTACT JORDAN FOR AUTH CODE">
            <input type="button" class="btn btn-danger btn-lg" value="Register" name="register" id="register" onclick="_registerUser()">
            <p>By clicking Register, you agree to POSO's User Agreement, Privacy Policy, and Cookie Policy.</p>
            </form>
             <div id="r_error" style="color:red;font-style: italic; background: #efb96e; width: 100%" ></div>
            </div>
              <div class="clearfix"></div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Custom AJAX Login -->
    <script src="../dist/js/login.js"></script>

</body>

</html>