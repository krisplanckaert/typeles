<?php
class Application_Model_Result extends My_Model
{
    protected $_name = 'results'; //table name
    protected $_id   = 'ID'; //primary key

    protected $enableDataGrid = TRUE;    

    public function save($data,$id = NULL) {
        $isUpdate = FALSE;
         
        $dbFields = array(
            'ID_Exercise' => $data['ID_Exercise'],
            'Time'  => $data['tijd'],
            'Faults' => $data['fouten'],
            'ID_User' => $this->authUser['ID'],
        );
        
        if (!empty($id)) {
            $isUpdate = TRUE;
            $this->updateById($dbFields,$id);
        } else {
            $id = $this->insert($dbFields);
        }  
    }

}