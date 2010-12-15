<?php

class Application_Form_Video extends Zend_Form
{

    public function init()
    {
        // add id element
        $this->addElement('hidden', 'id');
        
        // remove id's decorators
        $this->getElement('id')
            ->removeDecorator('DtDdWrapper')
            ->removeDecorator('HtmlTag')
            ->removeDecorator('Label');
        
        $this->addElement(
            'text',
            'name',
            array(
                'label'     => 'Name',
                'size'      => 80,
                'maxlength' => 120,
                'required'  => true,
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(2, 120))
                    ),
                )
            );
            
        $this->addElement(
            'text',
            'shortName',
            array(
                'label'     => 'Short Name',
                'size'      => 80,
                'maxlength' => 50,
                'required'  => true,
                'filters'   => array(
                    'StringTrim',
                    ),
                'validators' => array(
                    array('StringLength', true, array(2, 50))
                    ),
                )
            );

        
        $this->addElement(
            'submit',
            'Save',
            array(
                'label'  => 'Save',
                'ignore' => true,
                //'class'  => 'genText',
                )
            );

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'dl', 'class' => 'zend_form')),
            'Form',
            ));
    }
    
    public function setDefaultsFromEntity(\ShareThat\Entity\Video $video)
    {
        $values = array(
            'id' => $video->getId(),
            'name' => $video->getName(),
            'shortName' => $video->getShortName(),
        );
        $this->setDefaults($values);
    }


}

