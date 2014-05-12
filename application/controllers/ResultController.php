<?php
class ResultController extends My_Controller_Action 
{   
    public function ajaxSaveAction()
    {   
        $this->_helper->layout->disableLayout();
        
        $this->view->data = $this->_getAllParams();
        $resultmodel = new Application_Model_Result();
        $resultmodel->save($this->view->data);
        $exerciseModel = new Application_Model_Exercise();
        $limit=1000;
        $this->view->exercises = $exerciseModel->getExercises($limit);
    }

}