<?php

class Contact extends Page
{

    private static $db = array();

    private static $has_one = array(
        'Image1' => 'Image',
        'Image2' => 'Image',
    );


    public function getCMSFields()
    {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", array(

            $uploader1 = UploadField::create('Image1', 'Image 1'),
            $uploader2 = UploadField::create('Image2', 'Image 2'),

        ), "Metadata");

        $uploader1->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
        $uploader2->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));


        return $fields;
    }

}

class Contact_Controller extends Page_Controller {
    private static $allowed_actions = array('Form');
    public function Form() {


        $fields = FieldList::create(
            TextField::create('FirstName','')
                ->setAttribute('placeholder','First Name'),
            TextField::create('LastName','')
                ->setAttribute('placeholder','Last Name'),
            EmailField::create('Email','')
                ->setAttribute('placeholder','Email*'),
            TextField::create('TelephoneNumber','')
                ->setAttribute('placeholder','Telephone Number'),
            TextareaField::create('Message','')
                ->setAttribute('placeholder','Message')
        );

        $actions = new FieldList(
            new FormAction('submit', 'Submit')
        );
        return new Form($this, 'Form', $fields, $actions);
    }

    public function submit($data, $form) {
        $email = new Email();

        $email->setTo('craig@swishproperties.co.za');
        $email->setFrom($data['Email']);
        $email->setSubject("Contact Message from {$data["FirstName"]} {$data["LastName"]}");

        $messageBody = " 
            <p><strong>Name:</strong> {$data["FirstName"]} {$data["LastName"]}</p> 
            <p><strong>Email:</strong> {$data["Email"]}</p> 
            <p><strong>Phone:</strong>{$data["TelephoneNumber"]}</p> 
            <p><strong>Message:</strong> {$data['Message']}</p> 
        ";
        $email->setBody($messageBody);
        $email->send();
        return array(
            'Content' => '<p>Thank you for your feedback.</p>',
            'Form' => ''
        );
    }
}
