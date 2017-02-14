<?php
namespace MVC;
use MVC\LIB\FrontController;


session_start();

// get time
date_default_timezone_set('Asia/Riyadh');





if(!defined("DS")){
define("DS", DIRECTORY_SEPARATOR);    
}

//require class and FrontController
require_once '..'. DS . 'app' . DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';

// new FrontController()
$frontController = new FrontController();
            $conn = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = "SELECT * FROM links WHERE l_code='$frontController->_controller'";
            $result = $conn->query($sql);
            $frontController->_Lcode = $frontController->_controller;
            if ($result->num_rows > 0) {
              $frontController->_controller = 'to';
            }  
$frontController->dispatch();
                







?>

