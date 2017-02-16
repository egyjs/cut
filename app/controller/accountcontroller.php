<?php
namespace MVC\Controller;
/**
 * Description of IndexController
 *
 * @author el3zahaby
 */

class AccountController extends abstractController {
    
    public $msg;
    public $row;

    public function defaultAction() {
        if($this->user_login->is_logged_in() != ""){
            $stmt = $this->user_login->runQuery("SELECT * FROM links WHERE u_id=:uid");
            $stmt->execute(array(":uid"=>$_SESSION['userSession']));
            $this->row = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->_view(); 
        }else {$this->myFunction->redirect("signin");}
               
    }

}
