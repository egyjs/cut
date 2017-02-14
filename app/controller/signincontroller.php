<?php
namespace MVC\Controller;
/**
 * Description of IndexController
 *
 * @author el3zahaby
 */

class SigninController extends abstractController {
    
    public $msg;
    
    public function defaultAction() {
        if(@$this->_params[0] == 'exist'){
                        $this->msg =''.
                            '<div class="alert alert-warning" role="alert"> 
                            <strong>Oh Cut!</strong> This account does not exist 😯
                            </div>';
                    }  elseif(@$this->_params[0] == 'wrongP'){
                           $this->msg =''.
                            '<div class="alert alert-danger" role="alert"> 
                            <strong>Oh Cut!</strong> Password wrong. 😨
                            </div>'; 
                    }
        if(isset($_POST['submit'])){
                    $email = $this->myFunction->security_input($_POST['Uemail']);
                    $pass = $this->myFunction->security_input($_POST['Upass']);
            if (empty($email) || empty($pass)) {
                $this->msg =''.
                            '<div class="alert alert-warning" role="alert"> 
                            <strong>Oh Cut!</strong> Please fill out all the fields 😘
                            </div>';
                    
                }else{
//                    $paramsError = array (
//                        'exist' => @$this->_params[0],
//                        'wrongP' => @$this->_params[1],
//                    );
                    if($this->_params[0] == 'exist'){
                        $this->msg =''.
                            '<div class="alert alert-warning" role="alert"> 
                            <strong>Oh Cut!</strong> This account does not exist 😯
                            </div>';
                    }  elseif($this->_params[0] == 'wrongP'){
                           $this->msg =''.
                            '<div class="alert alert-danger" role="alert"> 
                            <strong>Oh Cut!</strong> Password wrong. 😨
                            </div>'; 
                    }  else {
                        if($this->user_login->login($email,$pass)){
                            $this->myFunction->redirect('/');
                        }
                    }
        
                }
        
            }
        $this->_view();
        
    }

}
