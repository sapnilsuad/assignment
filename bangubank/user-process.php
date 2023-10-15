<?php
session_start();  
include('includes/autoload.php');    

$user = new User();         

if(isset($_POST['u-login'])){                 
    $email = $_POST['email'];       
    $password = $_POST['password'];                 
   
    $login = $user->userLogin($email, $password);   
  
    if ($login) {          
        $_SESSION['user_email'] = $email;    
        header("Location: customer/dashboard.php");      
        exit(); 
    } else {  
        echo "Login failed. Please try again.";
    } 
} 
