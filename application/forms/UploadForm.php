<?php

class forms_UploadForm extends Zend_Form
{
    public function __construct($options = null)
    {
        parent::__construct($options);
        $this->setName('upload');
        $this->setAttrib('enctype', 'multipart/form-data');

        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('Description')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');

        $file = new Zend_Form_Element_File('file');
        $file->setLabel('File')
            ->setDestination(BASE_PATH . '/data/uploads')
            ->setRequired(true);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Upload');

        $this->addElements(array($description, $file, $submit));

    }
}
