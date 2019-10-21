<?php
//==============================================================================================
  function set_UserInfo($name,$email,$password){
        $configFile = parse_ini_file("../../../db.ini");
        if (isset($_POST[$name]) AND $_POST[$email] AND $_POST[$password]!=null){   
                $conn = mysqli_connect("localhost","root","",'customer');
                if (!$conn->connect_error) {   $conn = mysqli_connect($configFile['servername'],$configFile['username'],$configFile['password'],$configFile['database']);}
                        else{die("Connection failed: " . $conn->connect_error);}
                $userName = htmlspecialchars($_POST[$name]);
                $userEmail = htmlspecialchars($_POST[$email]);
                $userPassword = password_hash($_POST[$password],PASSWORD_DEFAULT);
                $insert_Query = ("INSERT INTO account(Name,Email,Password)
                                VALUES('$userName','$userEmail','$userPassword');"   
                );
                mysqli_query($conn,$insert_Query);
                $conn->close();  
        }else{echo('<script src="../Scripts/Error.js"></script>');}
   }

   
    function get_UserInfo($name,$email,$password){
        $configFile = parse_ini_file("../../../db.ini");
        if (isset($_POST['Login'])){  
                $conn = mysqli_connect($configFile['servername'],$configFile['username'],$configFile['password'],$configFile['database']);
                if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
                $userName = mysqli_real_escape_string($conn,$_POST[$name]);
                $userEmail = mysqli_real_escape_string($conn,$_POST[$email]);
                $userPassword = mysqli_real_escape_string($conn,$_POST[$password]);
                $select_Query = ("SELECT * FROM account
                          WHERE Name   ='$userName'
                          AND Email    ='$userEmail'
                          AND Password ='$userPassword';"            
                ); 
                $result = mysqli_query($conn,$select_Query);
                $countRow = mysqli_num_rows($result);
                // * Checks If user Login Information Exists *
                if($countRow==1){
                        session_start();
                        printf("Welcome Session Started");
                        header("location: report.html");
                        $conn->close();
                }else{echo("Sorry Account Was Not Found...");$conn->close();}
        }else{echo('<script src="../Scripts/Error.js"></script>');}
    }
?>

