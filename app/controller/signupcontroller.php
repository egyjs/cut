<?php
namespace MVC\Controller;
/**
 * Description of SignupController
 *
 * @author el3zahaby
 */

class SignupController extends abstractController {
    
    
    public $msg;


    
    public function defaultAction() {
        
        
        if(isset($_POST['submit'])){
            echo $this->myFunction->security_input($_POST['name']);
            $name = $this->myFunction->security_input($_POST['name']);
            $username = $this->myFunction->security_input($_POST['username']);
            $email = $this->myFunction->security_input($_POST['email']);
            $pass = $this->myFunction->security_input($_POST['password']);
            $country = $this->myFunction->ip_details($this->myFunction->get_user_ip());
            
            $ucountry = $country->country.",".$country->region;
            $uloc = $country->loc;
            
            
            
            if (empty($name) || empty($username) || empty($email) || empty($pass)) {
                $this->msg =''.
                            '<div class="alert alert-warning" role="alert"> 
                            <strong>Oh Cut!</strong> Please fill out all the fields 😘
                            </div>';
                    
                }else{
                    
                    $stmt = $this->user_login->runQuery("SELECT * FROM users WHERE u_email=:email_id");
                    $stmt->execute(array(":email_id"=>$email));
                    $userRow = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if($stmt->rowCount() > 0){
                $this->msg =''.
                            '<div class="alert alert-danger" role="alert"> 
                            <strong>Oh Cut!</strong> Email is already in use, please Login with it. 🙂
                            </div>';                    
                
                    }else{
                    $stmt = $this->user_login->runQuery("SELECT * FROM users WHERE u_username=:username_id");
                    $stmt->execute(array(":username_id"=>$username));
                    $userRow = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if($stmt->rowCount() > 0){
                $this->msg =''.
                            '<div class="alert alert-danger" role="alert"> 
                            <strong>Oh Cut!</strong> Username is already in use, please change it. 😨
                            </div>';                    
                
                    }elseif ($this->user_login->register($name,$username,$email,$pass,$ucountry,$uloc)) {
                $this->msg =''.
                            '<div class="alert alert-success" role="alert"> 
                            <strong>Done !</strong> We\'ve joined us successfully 😃
                            </div>';
                }
                    }
                
                }
            
            

        }
        $this->_view();
    }
    public function addAction() {
        $this->_view();
    }
}
