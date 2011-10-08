<?php

class Zend_View_Helper_BaseUrl extends Zend_View_Helper_Abstract
{
    function baseUrl()
    {
        return Zend_Controller_Front::getInstance()->getBaseUrl();     
    }
}
