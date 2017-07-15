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
                $err = "*Your Login Name or Password is invalid";
            }

    }
}
   

/*

else if(isset($_POST['register'])){
    $regusername = mysqli_real_escape_string($db, $_POST['myuname']);
    $regpass = mysqli_real_escape_string($db, $_POST['mypass']);
}

 */ 
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="uname" type="username" autofocus>
                                    <span class="error"><?php echo $err; ?></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                    <span class="error"><?php echo $errAllfields; ?></span>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submitLogin" class="btn btn-lg btn-success btn-block" value="LOGIN">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Not Registered? Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" name="reg">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="myuname" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="mypass" type="password" value="">
                                </div>
                                 <div class="form-group">
                                    <select name="mytype" class="form-control" placeholder="USER type" style="color: gray">
                                        <option value="" disabled selected hidden>USER TYPE</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        <option value="super">Superuser</option>
                                    </select>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input id="register" name="register" class="btn btn-lg btn-success btn-block" value="REGISTER">
                            </fieldset>
                        </form>
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
