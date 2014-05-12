<?php
class ExerciseController extends My_Controller_Action 
{   
    public function listAction()
    {   
        $this->view->exercises = $this->model->getExercises();
        //Zend_Debug::dump($this->view->exercises);
        parent::listAction();
    }
    
    public function playAction() {
        $exercisemodel = new Application_Model_Exercise();
        $exercise = $this->_getParam('exercise',1);
        $this->view->exercise = $exercisemodel->getOne($exercise);
        
    }
}