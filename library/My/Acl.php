<?php

class My_Acl extends Zend_Acl 
{
    protected $authUser;
    protected $userRoles;

    /**
     *
     * Constructor
     * @param array $authUser
     */
    public function __construct($authUser) {
               
    }
        
    protected function setUserRoles(){
        $this->userRoles = null;
        if (empty($this->user)){
            return false;
            //throw new Exception ("User must have at least 1 permission");
        }
        
        switch($this->user['ID_Permission']){
            case 1:
                $this->userRoles[] = My_Roles::ADMIN;
                break;
        }
    }
    
    public function hasRole($role){
        if (is_array($this->userRoles) && in_array($role,$this->userRoles)){
            return TRUE;
        }
        return FALSE;
    }
        
    public function getUserRoles() {
        return $this->userRoles;
    }


    /**
     *
     * User is allowed
     * @param mixed $role
     * @param mixed $resource
     * @param mixed $privilege
     * @return boolean
     */
    public function userIsAllowed($role = null, $resource = null, $privilege = null){
        if (empty($this->userRoles)){
            return FALSE;
        }
        if (empty($resource) && empty($privilege)){
            //we only need to check the role
            return in_array($role,$this->userRoles) ? true : false;
        }

        foreach($this->userRoles as $userRole){
            if ($this->isAllowed($userRole,$resource,$privilege)){
                return TRUE;
            }
        }
        return FALSE;
    }
}
?>