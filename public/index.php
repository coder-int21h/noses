<?php
// This ZF skeleton structure is loosely based on the ZF quick start code

// BASE_PATH points to the root directory
define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));
// APPLICATION_PATH points to the application directory
define('APPLICATION_PATH', BASE_PATH . '/application');
set_include_path(BASE_PATH . '/library'
    . PATH_SEPARATOR . APPLICATION_PATH 
    . PATH_SEPARATOR . get_include_path());
// APPLICATION_ENVIROMENT defines which config section is loaded
if(!defined('APPLICATION_ENVIRONMENT')) {
    define('APPLICATION_ENVIRONMENT', 'development');
}

// autoloader
require_once "Zend/Loader.php";
Zend_Loader::registerAutoload();

try {
    // Run the application
    require BASE_PATH .'/application/bootstrap.php';
    bootstrap();
    Zend_Controller_Front::getInstance()->dispatch();
    
} catch (Exception $exception) {
    echo '<p>An exception occured while bootstrapping the application.</p>Error:<br/>';
    echo $exception->getMessage();
    exit;
}

