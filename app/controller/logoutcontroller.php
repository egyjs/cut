<?php
namespace MVC\Controller;
/**
 * Description of IndexController
 *
 * @author el3zahaby
 */

class LogoutController extends abstractController {
    
    public function defaultAction() {

        if(!$this->user_login->is_logged_in()){
                $this->user_login->redirect('/');
        }

        if($this->user_login->is_logged_in()!=""){
                $this->user_login->logout();	
                $this->user_login->redirect('/');
        }
        
    }
}
