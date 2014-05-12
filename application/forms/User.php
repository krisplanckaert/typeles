<?php

class Application_Form_User extends My_Form
{
    protected $_defaultFormOptions = array(
                           'name' => 'frmDetail',
                           'method' => 'post',
     );
	

    public function __construct($id = NULL, $options = NULL, $params = NULL)
    {
        $this->_defaultFormOptions['action'] = '/user/detail'; //@todo: build action automatic, based on application and controller
        $options = !empty($options) ? array_merge($this->_defaultFormOptions,(array)$options) : $this->_defaultFormOptions;
        parent::__construct($id, $options);
    
       	//username == e-mail
         $email = new Zend_Form_Element_Text('Username');
         $email->setLabel('Username')
        		->setAttribs(array(
			        'class' => 'w_large'
    				))         
                        ->setRequired()
                        ->addFilters(array('StringTrim','StripTags','StringToLower'))
                        ->addValidator('NotEmpty', TRUE)
                        //->addValidator('EmailAddress', TRUE)
        ;

        if (!$this->isUpdate()){
            //check if username doesn't exist
            $email->addValidator(new Zend_Validate_Db_NoRecordExists(
                            array(
                                'table' => 'users',
                                'field' => 'Username',
                    )));
        }
         
         $password = new Zend_Form_Element_Password('Password');
         $password->setLabel('Password')
              ->addFilter('StringTrim')
              ->addFilter('StripTags')
              ->addValidator('StringLength',TRUE,array(6,200))
              ->setValue('');

        // Repeat password
        $password2 = new Zend_Form_Element_Password('repeatPassword');
        $password2->setLabel('Confirm password')
                       ->addFilter('StringTrim')
                       ->addFilter('StripTags')
                       ->addValidator('NotEmpty')
                       ->addValidator(new My_Validate_IdenticalField('Password'), FALSE)
                       ->setValue('');
                    ;
        if (!$this->isUpdate()){
            $password ->setRequired(true)
                      ->setLabel('New password');
            $password2->setRequired(true)
                      ->setLabel('Confirm new password');
        }

        // save
        $submit=new Zend_Form_Element_Submit('Save');
       	$submit->setRequired(false)
               ->setIgnore(true)
               ->setDecorators($this->buttonDecorators)
        ;

        $formElements =  array($email,$password,$password2);
        
        //
       
        $this->addElements($formElements);
        $this->setElementDecorators($this->elementDecorators);
        
        
        $displayGroupElements = array($submit);
        
        $this->addDisplayGroup($displayGroupElements, 'buttons')
        ->setDisplayGroupDecorators(array(array('ViewScript',array('viewScript'=>'forms/_tableFootButtons.phtml','class' => 'footer'))))
        ;
        
    }
    
}

