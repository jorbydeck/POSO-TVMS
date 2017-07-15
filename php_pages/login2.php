<?php
ob_start();
ini_set('memory_limit', '1024M'); // or you could use 1G
include("../_func/_connmysql.php");
include("../_func/_checkFields.php");
session_start();

// $logusername = isset($_POST['uname']);
// $logpass = isset($_POST['pass']);

    $err = $errAllfields = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['uname']) || empty($_POST['pass'])) {

        $err = '*Please fill all the fields';

    }else {

        $myusername = mysqli_real_escape_string($db,$_POST['uname']);
        $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 

        checkFields::_clean($myusername);
        checkFields::_clean($mypassword);
       

              
        $sql = "SELECT uid FROM users WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
              
        $count = mysqli_num_rows($result);
          
        // If result matched $myusername and $mypassword, table row must be 1 row
                
            if($count == 1) {
               
                $myusername = $_SESSION['username'];
                 
                header("Location: index.php");
            }else {
                $err = "*Your Username or Password is invalid";
            }

    }
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar fixed-top navbar-inverse bg-inverse">
      <!-- Navbar content -->
      <a class="navbar-brand" href="#">
        <img src="../img/poso.png" width="120" height="120" class="d-inline-block align-top" alt="">
      </a>
      <a class="head-text navbar-brand" href="../php_pages/login2.php"><strong>POSO TRAFFIC VIOLATION MANAGEMENT SYSTEM</strong></a>
    </nav>
</div>
<br>
<br>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="form-body">
    <ul class="nav nav-tabs final-login">
        <li class="active"><a data-toggle="tab" href="#sectionA">Sign In</a></li>
        <li><a data-toggle="tab" href="#sectionB">New ACCOUNT</a></li>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
        <div class="innter-form">
            <form class="sa-innate-form" method="post">
            <label>Username</label>
            <input type="text" name="uname" placeholder="Username" autofocus>
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="submitLogin" value='Sign In' />
            <a href="">Forgot Password?</a>
            </form>
            <span class="error"><?php echo $err; ?></span>
            </div>
           
            <div class="clearfix"></div>
        </div>
        <div id="sectionB" class="tab-pane fade">
            <div class="innter-form">
            <form class="sa-innate-form" method="post">
            <label>Name</label>
            <input type="text" name="reguname">
            <label>Password</label>
            <input type="password" name="regpass">
            <label>User Type</label>
                <select name="regtype" class="form-control" placeholder="USER type" style="color: gray">
                    <option value="" disabled selected hidden>USER TYPE</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="super">Superuser</option>
                </select>
            <label>Enter Authorization Code</label>
            <input type="password" name="regauth">
            <input type="submit" value="Register" name="register">
            <p>By clicking Register, you agree to POSO's User Agreement, Privacy Policy, and Cookie Policy.</p>
            </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>










    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>