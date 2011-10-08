<?php
if(!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__FILE__) . '/..');
}
if(!defined('APPLICATION_PATH')) {
    define('APPLICATION_PATH', BASE_PATH . '/application');
}
if(!defined('APPLICATION_ENVIRONMENT')) {
    throw new Exception('APPLICATION_ENVIRONMENT not set');
}

function bootstrap()
{
    // config
    $config = new Zend_Config_Ini(APPLICATION_PATH . '/config/app.ini', APPLICATION_ENVIRONMENT);
    Zend_Registry::set('config', $config);
    Zend_Registry::set('env', APPLICATION_ENVIRONMENT);

    // debugging
    if($config->debug) {
        error_reporting(E_ALL | E_STRICT);
        ini_set('display_errors', 'on');
    }

    // Database
    if($config->database) {
        $dbAdapter = Zend_Db::factory($config->database);
        Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
        Zend_Registry::set('dbAdapter', $dbAdapter);
    }
    
    // view and layout setup
    Zend_Layout::startMvc(APPLICATION_PATH . '/views/layouts');
    $view = Zend_Layout::getMvcInstance()->getView();
    $view->doctype('XHTML1_STRICT');
    $view->headTitle()->setSeparator(' - ');
    
    // action helpers
    Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH .'/controllers/helpers');
    
    
    // Front Controller
    $frontController = Zend_Controller_Front::getInstance();
    $frontController->setControllerDirectory(APPLICATION_PATH .'/controllers');
    $frontController->setParam('env', APPLICATION_ENVIRONMENT);
}