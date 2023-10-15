<?php  
session_start();   
include('../includes/autoload.php');     

$user = new User();         
 
if(isset($_POST['u-login'])){                 
    $email = $_POST['email'];       
    $password = $_POST['password'];                
   
    $login = $user->userLogin($email, $password);   
  
    if ($login) {           
        $_SESSION['user_email'] = $email;     
        header("Location: dashboard.php");        
        exit();  
    } else {   
        echo "Login failed. Please try again.";
    } 
} elseif(isset($_POST['deposit'])){        
    $amount = $_POST['amount'];   
    $email = $_GET['email'];     
  
    $user->depositAmount($amount, $email);                 
    header("Location: http://localhost/bangubank/customer/dashboard.php");  
} elseif(isset($_POST['withdraw'])){          
    $amount = $_POST['amount'];    
    $email = $_GET['email'];         
  
    $user->withdrawAmount($amount, $email);                   
    header("Location: http://localhost/bangubank/customer/dashboard.php");  
} elseif(isset($_POST['transfer'])){             
    $r_email = $_POST['r_email'];  
    $r_amount = $_POST['amount'];          
    $c_email = $_GET['email'];      
  
    $user->transferAmount($r_email, $r_amount, $c_email);                        
    header("Location: http://localhost/bangubank/customer/dashboard.php");  
}
