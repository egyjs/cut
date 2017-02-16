<?php
namespace MVC\Controller;
/**
 * Description of IndexController
 *
 * @author el3zahaby
 */

class IndexController extends abstractController {
    
    
    public $msg;
    public function defaultAction() {
        if (isset($_POST['suburl'])){
            $urlInput = $this->myFunction->security_input($_POST['link']);
            $urlInput = $this->myFunction->addhttp($urlInput);
            $this->myFunction->checkurl($urlInput);
            if(empty($urlInput)){
                $this->msg = '<span><div class="alert alert-warning" role="alert">INSERT A URl TO SHORT IT</div></span>';

                }  elseif ($this->myFunction->checkurl == "NOT VALID" ){ 
                     
                    $this->msg = '<span><div class="alert alert-warning" role="alert">Please enter a valid URL.!!</div></span>';
                    
                }else {
                    $url_code = $this->myFunction->getUrlRand(5);
                    if($this->user_login->is_logged_in() == ""){
                    $this->url->shortURL($urlInput,$url_code);
                    }else{
                        $this->url->shortforUser($urlInput,$url_code,$_SESSION['userSession']);
                    }
                    if ($this->myFunction->checkurl == "NOT VALID") {
                       $this->msg = '<span><div class="alert alert-warning" role="alert">Please enter a valid URL.!!</div></span>';
                    }  else {
                        $urlFind = 'http://'.$_SERVER['HTTP_HOST']."/".$url_code;
                        $_SESSION['urlresult'] = $urlFind;  
                        
                    }




            } 
    
            }
                $this->_view();
    
        }
    public function addAction() {
        $this->_view();
    }
}
