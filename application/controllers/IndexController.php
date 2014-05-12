<?php

class IndexController extends My_Controller_Action
{

    public function indexAction()
    {
    	 $this->_helper->redirector('login', 'user'); //,$this->getRequest()->getModuleName());
    }
    
    public function homeAction() 
    {
        
    }    
}

