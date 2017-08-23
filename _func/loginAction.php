<?php
session_start();
include '_connmysql.php';

//sanitize data
function _clean($data){
    $data = trim($data,"%$#@^&*;");
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
}
    //***LOGIN CODE**//
    //***************//

          //  $err = ""; //initialize first
            $success="";
            $uname = $_POST['uname'] ?? '';
            $pass = $_POST['pass'] ?? '';
            $myusername = mysqli_real_escape_string($db,$uname);
            $mypassword = mysqli_real_escape_string($db,$pass); 
            

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                if(isset($_POST['submitLogin'])){       //check if login button was trigger             
                   
                        if(empty($_POST['uname']) || empty($_POST['pass'])) {

                            $err = '*Please fill all the fields';
                           // echo "<script type='text/javascript'>alert('$err');</script>";
                        }else {
                                        
                            _clean(filter_var($myusername, FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                            _clean(filter_var($mypassword, FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));

                                  
                            $sql = "SELECT uid FROM users WHERE username = '$myusername' and password = '$mypassword'";
                            $result = mysqli_query($db,$sql);
                            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                            $active = @$row['active'];
                                  
                            $count = mysqli_num_rows($result);
                              
                            // If result matched $myusername and $mypassword, table row must be 1 row
                                    
                                if($count == 1) {
                                    $ses_myuname = $_SESSION['username'] = $uname;
                                    $file = '../logs/users.txt' ?? '';
                                    //the users to add
                                    $time = date("h:i:sa");
                                    $data =  $uname . '---' . 'logged on ---'. date("Y/m/d") . '---' . $time .PHP_EOL;
                                    //write contents
                                    //using FILE_APPEND flag to append  content to EOF
                                    //and LOCK_EX flag to prevent anyone else writing to the file at the  same time
                                    //file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
                                    header("Location: ../php_pages/index.php");
                                  
                                }else {
                                    //$err = "*Your Username or Password is invalid";
                                    $err= "Your USERNAME or PASSWORD is INVALID";
                                 //   echo "<script type='text/javascript'>alert('$err');</script>";
                                }

                        }
                     
                }else {     //if not register button was trigger
                    $success = "*Created Account Successful" ?? '';
                } 
            }     

?>