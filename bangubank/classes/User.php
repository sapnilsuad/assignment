<?php

class User extends Db{    
    public function getUser(){    
        $sql = "SELECT * FROM user"; 
        $stmt = $this->connect()->prepare($sql);   
        $stmt->execute();  

        while($result = $stmt->fetchAll()){  
            return $result;
        }
    }    
    public function userLogin($email, $password){      
        $sql = "SELECT * FROM user WHERE u_email = ?";   
        $stmt = $this->connect()->prepare($sql);  
        $stmt->execute([$email]);         
        $user = $stmt->fetch(PDO::FETCH_ASSOC);     
         
        if ($user['u_email'] === $email && $user['u_pw'] === $password) {       
            return true;   
        } else{ 
            header("Location: http://localhost/bangubank/"); 
        }
    }   
    public function showUser($user_email){            
        $sql = "SELECT * FROM user WHERE u_email = ?";     
        $stmt = $this->connect()->prepare($sql);     
        $stmt->execute([$user_email]);         
        $result = $stmt->fetch();     
        return $result;        
    }
    public function depositAmount($amount, $email){           
        $sql = "UPDATE user SET u_amount = u_amount + ? WHERE u_email = ?"; 
        $stmt = $this->connect()->prepare($sql);  
        $stmt->execute([$amount, $email]);       
        $result = $stmt->fetch();  
        return $result;  
    }
    public function withdrawAmount($amount, $email){             
        $sql = "UPDATE user SET u_amount = u_amount - ? WHERE u_email = ?"; 
        $stmt = $this->connect()->prepare($sql);    
        $stmt->execute([$amount, $email]);       
        $result = $stmt->fetch();  
        return $result;    
    }  
    public function transferAmount($r_email, $r_amount, $c_email){             
        $sql = "UPDATE user SET u_amount = u_amount + ? WHERE u_email = ?"; 
        $stmt = $this->connect()->prepare($sql);   
        $stmt->execute([$r_amount, $r_email]);             
        
        $sql2 = "UPDATE user SET u_amount = u_amount - ? WHERE u_email = ?"; 
        $stmt2 = $this->connect()->prepare($sql2);     
        $stmt2->execute([$r_amount, $c_email]);    
 
        $sql1 = "INSERT INTO transactions(c_email,r_email,r_amount) VALUES (?,?,?)";    
        $stmt1 = $this->connect()->prepare($sql1);        
        $stmt1->execute([$c_email, $r_email, $r_amount]);     
        
    }




}