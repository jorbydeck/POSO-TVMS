<?php
require '../_func/_connmysql.php';
session_start();

//sanitize data function
function _clean($data){
    $data = trim($data,"%$#@^&*;");
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
}

//SANITIZE DATA BEFORE INSERTING INTO DATABASE
//initialize variables for LOGIN
$myusername = _clean(filter_var(mysqli_real_escape_string($db,$_POST['username'] ?? ''), FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$mypassword = _clean(filter_var(mysqli_real_escape_string($db,$_POST['password'] ?? ''), FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS)); 

//SANITIZE DATA BEFORE INSERTING INTO DATABASE
//initialize variables for REGISTEr
$r_uname = _clean(filter_var(mysqli_real_escape_string($db, $_POST['r_username'] ?? ''), FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$r_pass = _clean(filter_var(mysqli_real_escape_string($db, $_POST['r_password'] ?? ''), FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$r_type = _clean(filter_var(mysqli_real_escape_string($db, $_POST['r_type'] ?? ''), FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$r_auth = _clean(filter_var(mysqli_real_escape_string($db, $_POST['r_auth'] ?? ''), FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    if(isset($_POST['username']))
    {
        $sql = "SELECT uid FROM users WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = @$row['active'];
                                          
        $count = mysqli_num_rows($result);   
            //if successfully found records on database, proceed with 
            //logging into log file and store session variables
            if($count == 1) {
                $_SESSION['username'] = $myusername;
                $file = '../logs/users.txt' ?? '';
                //the users to add
                $time = date("h:i:sa");
                $data =  $myusername . '---' . 'logged on ---'. date("Y/m/d") . '---' . $time .PHP_EOL;
                //write contents to log file
                //using FILE_APPEND flag to append  content to EOF
                //and LOCK_EX flag to prevent anyone else writing to the file at the  same time
                file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
                echo "yes";
                } 
                else 
                {
                    //passing values to an ajax request. Return "no"/false
                    echo "no";
                }        
        }
     elseif(isset($_POST['r_username']))
     {
        //echo "<script type='text/javascript'>alert('nandito ako');</script>";
        echo "no";
     }
