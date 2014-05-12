<?php
class Application_Model_Exercise extends My_Model
{
    protected $_name = 'exercises'; //table name
    protected $_id   = 'ID'; //primary key

    protected $enableDataGrid = TRUE;    

    public function save($data,$id = NULL) {
        $isUpdate = FALSE;
         
        $dbFields = array(
            'Text'  => $data['Text'],
        );
        
        if (!empty($id)) {
            $isUpdate = TRUE;
            $this->updateById($dbFields,$id);
        } else {
            $id = $this->insert($dbFields);
        }  
    }
    
    public function buildDataGrid() {
     	//1. build source
        $select = $this->db
                                ->select()
                                ->from(array('e' =>$this->getTableName()))
        ;
 
        $source = new Bvb_Grid_Source_Zend_Select($select);
        $this->dataGrid->setGridId('exercise');
        $this->dataGrid->setSource($source);
    	//2. specify columns
        $this->dataGrid->updateColumn('ID', array('hidden' => true));
        $this->dataGrid->updateColumn('Text', array('hidden' => true));
        
        $this->dataGrid->updateColumn('Omschrijving',array(
                            'title'		=> 'Omschrijving',
                            'decorator' => '<a href="/exercise/detail/id/{{ID}}">{{Omschrijving}}</a>',
                            'position'  => 10,
        ));        
        
   
        //3. build form	
        //4. deploy 	
        return $this->dataGrid->deploy();
    }    
    
    public function getExercises($limit=10) {
        $exercisesReturn = array();
        $exercises = $this->getAll();
        foreach($exercises as $exercise) {
            $exercisesReturn[$exercise['ID']] = $this->getExercise($exercise['ID'], $limit);
        }
        return $exercisesReturn;
    }
    
    public function getExercise($exerciseId, $limit) {
        $resultModel = new Application_Model_Result();
        $userModel = new Application_Model_User();
                    
        $exercise = $this->getOne($exerciseId);
        $where = 'ID_Exercise='.$exerciseId.' and ID_User='.$this->authUser['ID'];
        $order = array('Faults','Time');
        $results = $resultModel->getAll($where, $order);
        $i=0;
        foreach($results as $result) {
            $exercise['result'][$i]=$result;
            $i++;
            if($i>$limit) break;
        }
        $where = 'ID_Exercise='.$exerciseId;
        $order = array('Faults','Time');
        $results = $resultModel->getAll($where, $order);
        $i=0;
        foreach($results as $result) {
            $user = $userModel->getOne($result['ID_User']);
            $result['user'] = $user['Username'];
            $exercise['resultAll'][$i]=$result;
            $i++;
            if($i>$limit) break;
        }
        return $exercise;
    }
}