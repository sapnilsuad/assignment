<?php   
session_start();
include('../includes/autoload.php');   
 
$admin = new Admin();         
    
if(isset($_POST['register'])){     
    $name = $_POST['name'];
    $email = $_POST['email'];   
    $password = $_POST['password'];      
  
    $admin->addAdmin($name, $email, $password);       
    header("Location: http://localhost/bangubank/admin/login.php"); 
} elseif(isset($_POST['login'])){            
    $email = $_POST['email'];     
    $password = $_POST['password'];             
  
    $login = $admin->adminLogin($email, $password);   
 
    if ($login) {      
        $_SESSION['admin_email'] = $email;  
        header("Location: customers.php");    
        exit();
    } else { 
        echo "Login failed. Please try again.";
    } 
}  elseif(isset($_POST['add-customer'])){             
    $fname = $_POST['first-name'];   
    $lname = $_POST['last-name'];   
    $email = $_POST['email'];   
    $password = $_POST['password'];           
    $amount = 0;          
      
    $admin->addUser($fname, $lname, $email, $password, $amount);               
    header("Location: http://localhost/bangubank/admin/customers.php");  
} 