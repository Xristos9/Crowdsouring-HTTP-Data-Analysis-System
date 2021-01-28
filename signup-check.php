<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) 
    && isset($_POST['email']) && isset($_POST['re_password'])){
   
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    
    $re_pass = validate($_POST['re_password']);
    $email = validate($_POST['email']);

    $user_data = 'uname='. $uname. '&email='. $email;

    
    if(empty($uname)){
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } 
    
    else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    }
    
    else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    } 
    
    else if(empty($email)){
        header("Location: signup.php?error=email is required&$user_data");
        exit();
    }

    else if($pass !== $re_pass){
        header("Location: signup.php?error=The currend password does not match&$user_data");
        exit();
    }
        
    //else { 
        //hashing the password
        //$pass = md5($pass);
        
        $result = mysqli_query($conn, "SELECT * FROM person WHERE userName='$uname'");
        $result3 = mysqli_query($conn, "SELECT * FROM person WHERE email='$email'");

        if(mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=This username is used, try another one&$user_data");
            exit();
        } elseif(mysqli_num_rows($result3) > 0){
            header("Location: signup.php?error=This email is used, try another one&$user_data");
            exit();
        } else{
            $result2 = mysqli_query($conn, "INSERT INTO person(userName, password, email) VALUES('$uname', '$pass', '$email')"); 

            if($result2) {
                header("Location: signup.php?success=Accound has been created successfully&$user_data");
                exit();
            } else{
                header("Location: signup.php?error=An unexpected error has been occurred&$user_data");
                exit();
            }
        }      

    } else {
    header("Location: signup.php");
    exit();
}