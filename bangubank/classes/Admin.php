<?php
   
class Admin extends Db{      
    public function addAdmin($name, $email, $password){  
        $sql = "INSERT INTO admins(adminname,adminemail,adminpw) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);   
        $stmt->execute([$name, $email, $password]);  
    }
    public function adminLogin($email, $password){    
        $sql = "SELECT * FROM admins WHERE adminemail = ?";   
        $stmt = $this->connect()->prepare($sql);  
        $stmt->execute([$email]);     
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);    
        
        if ($admin['adminemail'] === $email && $admin['adminpw'] === $password) {    
            return true;  
        }else{  
            header("Location: http://localhost/bangubank/admin/login.php");     
        }
    }        
    public function addUser($fname, $lname, $email, $password, $amount){   
        $sql = "INSERT INTO user(f_name,l_name,u_email,u_pw,u_amount) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);    
        $stmt->execute([$fname, $lname, $email, $password, $amount]);     
    }
    public function showAdmin($email){         
        $sql = "SELECT * FROM admins WHERE adminemail = ?";    
        $stmt = $this->connect()->prepare($sql);    
        $stmt->execute([$email]);       
        $result = $stmt->fetch();   
        return $result;     
    }   
    public function showTransaction(){             
        $sql = "SELECT * FROM transactions";  
        $stmt = $this->connect()->prepare($sql);    
        $stmt->execute();  

        while($result = $stmt->fetchAll()){  
            return $result;
        }          
    } 
    public function detailTransaction($c_email) {
        $sql = "SELECT * FROM transactions WHERE c_email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$c_email]); 
        
        if ($stmt->rowCount() > 0) { 
            $result = $stmt->fetch();
            return $result;
        } else {
            return 0;
        }
    } 


}