<?php

class Application_Form_Exercise extends My_Form
{
    protected $_defaultFormOptions = array(
                           'name' => 'frmDetail',
                           'method' => 'post',
     );
	

    public function __construct($id = NULL, $options = NULL, $params = NULL)
    {
        $this->_defaultFormOptions['action'] = '/exercise/detail'; //@todo: build action automatic, based on application and controller
        $options = !empty($options) ? array_merge($this->_defaultFormOptions,(array)$options) : $this->_defaultFormOptions;
        parent::__construct($id, $options);
    
         $omschrijving = new Zend_Form_Element_Text('Omschrijving');
         $omschrijving->setLabel('Omschrijving')
        		->setAttribs(array(
			        'class' => 'w_large'
    				))         
                        ->setRequired()
                        ->addFilters(array('StringTrim','StripTags','StringToLower'))
                        ->addValidator('NotEmpty', TRUE)
        ;

        $text = new Zend_Form_Element_Text('Text');
        $text->setLabel('Text')
        		->setAttribs(array(
			        'class' => 'w_large'
    				))  
            ->addFilter('StringTrim')
            ->addFilter('StripTags')
            ->setValue('');

        // save
        $submit=new Zend_Form_Element_Submit('Save');
       	$submit->setRequired(false)
               ->setIgnore(true)
               ->setDecorators($this->buttonDecorators)
        ;

        $formElements =  array($omschrijving,$text);
        
        //
       
        $this->addElements($formElements);
        $this->setElementDecorators($this->elementDecorators);
        
        
        $displayGroupElements = array($submit);
        
        $this->addDisplayGroup($displayGroupElements, 'buttons')
        ->setDisplayGroupDecorators(array(array('ViewScript',array('viewScript'=>'forms/_tableFootButtons.phtml','class' => 'footer'))))
        ;
        
    }
    
}

