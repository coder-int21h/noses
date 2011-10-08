<?php

class IndexController extends Zend_Controller_Action 
{
    public function indexAction() 
    {
        $this->view->headTitle('Home');
        $this->view->title = 'Zend_Form_Element_File Example';
        $this->view->bodyCopy = "<p>Please fill out this form.</p>";


        $form = new forms_UploadForm();

        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {

                // success - do something with the uploaded file
                $uploadedData = $form->getValues();
                $fullFilePath = $form->file->getFileName();

                Zend_Debug::dump($uploadedData, '$uploadedData');
                Zend_Debug::dump($fullFilePath, '$fullFilePath');

                // was a file uploaded?
//                if($form->file->isUploaded()) {
//                    $form->file->receive(); // move to the specified place
//                    $location = $form->file->getFileName();
//                    Zend_Debug::dump($location, '$location');
//                }

                echo "done";
                exit;

            } else {
                $form->populate($formData);
            }
        }

        $this->view->form = $form;

    }
}
