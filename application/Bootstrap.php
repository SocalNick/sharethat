<?php

class Bootstrap extends \Zend\Application\Bootstrap
{
    
//    protected function _initAuth()
//    {
//        $this->bootstrap('session');
//        $auth = Zend_Auth::getInstance();
//        if ($auth->hasIdentity()) {
//            $view = $this->getResource('view');
//            $view->user = $auth->getIdentity();
//        }
//        return $auth;
//    }
    
//    protected function _initFlashMessenger()
//    {
//        /** @var $flashMessenger Zend_Controller_Action_Helper_FlashMessenger */
//        $flashMessenger = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
//        if ($flashMessenger->hasMessages()) {
//            $view = $this->getResource('view');
//            $view->messages = $flashMessenger->getMessages();
//        }
//    }
    
    public function _initResources ()
    {
        $this->getBroker()->getClassLoader()->registerPlugin('doctrine', 'Bisna\Application\Resource\Doctrine');
    }

    public function _initAutoloader()
    {
//        require_once APPLICATION_PATH . '/../library/Doctrine/Common/ClassLoader.php';

        $autoloader = $this->getApplication()->getAutoloader();
//        $autoloader = \Zend_Loader_Autoloader::getInstance();

        $bisnaAutoloader = new \Doctrine\Common\ClassLoader('Bisna');
//        $autoloader->pushAutoloader(array($bisnaAutoloader, 'loadClass'), 'Bisna');
        $autoloader->register(array($bisnaAutoloader, 'loadClass'), 'Bisna');

        $appAutoloader = new \Doctrine\Common\ClassLoader('ShareThat');
//        $autoloader->pushAutoloader(array($appAutoloader, 'loadClass'), 'ShareThat');
        $autoloader->register(array($appAutoloader, 'loadClass'), 'ShareThat');
    }

}
