<?php
class Application_Model_User extends My_Model
{
    protected $_name = 'users'; //table name
    protected $_id   = 'ID'; //primary key

    protected $enableDataGrid = TRUE;    

    public function save($data,$id = NULL) {
        $isUpdate = FALSE;
         
        $dbFields = array(
            'Username'  => $data['Username'],
        );
        if (!empty($data['Password']) && $data['Password']== $data['repeatPassword']){
            $dbFields['Password'] = md5($data['Password']);
        }
        
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
                                ->from(array('tu' =>$this->getTableName()))
                                ->order('Username')
        ;
 
        $source = new Bvb_Grid_Source_Zend_Select($select);
        $this->dataGrid->setGridId('user');
        $this->dataGrid->setSource($source);
    	//2. specify columns
        $this->dataGrid->updateColumn('ID', array('hidden' => true));
        $this->dataGrid->updateColumn('Password', array('hidden' => true));
        
        $this->dataGrid->updateColumn('Username',array(
                            'title'		=> 'E-mail',
                            'decorator' => '<a href="/user/detail/id/{{ID}}">{{Username}}</a>',
                            'position'  => 10,
        ));        
        
   
        //3. build form	
        //4. deploy 	
        return $this->dataGrid->deploy();
    }    
}