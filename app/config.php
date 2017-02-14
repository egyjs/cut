<?php

if(!defined('DS')){
define('DS', DIRECTORY_SEPARATOR);    
}


//Path 
define('SL', "/");
define('APP_PATH',realpath(dirname(__FILE__)));
define('VIEWS_PATH', APP_PATH . DS . 'views' . DS);



// Path of  define inc Folder VIEWS
define('INC_PATH', VIEWS_PATH . 'inc' . DS);
define('SRC_PATH', 'src' . SL);
define('BOOTSTRAP_PATH', SRC_PATH . 'bootstrap' . SL);

// Path of  define inc File VIEWS
define('headerV_PATH', INC_PATH .'header.php');
define('footerV_PATH', INC_PATH .'footer.php');


// Path of  define CSS an JS files
define('style', SRC_PATH .'/style.css');
define('script', SRC_PATH .'/script.js');
define('CSSBOOT', BOOTSTRAP_PATH .'/css/bootstrap.min.css');
define('JSBOOT', BOOTSTRAP_PATH .'/js/bootstrap.min.js');




// setup db variables
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "mvc");

