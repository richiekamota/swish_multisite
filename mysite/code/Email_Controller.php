<?php

class Email_Controller extends Controller
{
    private static $allowed_actions = array(
        'capture',
        'reservation',        
    );

    private static $url_handlers = array(
        'capture' => 'capture',
        'reservation' => 'reservation'
    );
    
    public function capture(SS_HTTPRequest $request)
    {
        $insert = SQLInsert::create('PriceEmail');
        $insert->addRows(array(
            array(
                'Email' => $this->getRequest()->getVar('e'))
        ));
        $insert->execute();
        $output = array(
            "message" => "success",
            "action" => "email capture"
        );
        return json_encode($output);
    }

    public function reservation(SS_HTTPRequest $request)
    {

        $insert = SQLInsert::create('ReserveEmail');
        $insert->addRows(array(
            array(
                'Name' => $this->getRequest()->getVar('n'),
                'Email' => $this->getRequest()->getVar('e'),
                'Unit' => $this->getRequest()->getVar('u'))
        ));
        $insert->execute();

        // SEND EMAIL
        $email = new Email();
        $email
        ->setFrom('info@swishproperties.co.za')
        ->setTo('craig@swishproperties.co.za')
        ->setSubject('Swish Properties - Floor Reservation Request')
        ->setTemplate('ReservationEmail')
        ->populateTemplate(new ArrayData(array(
            'Data' => array('u' => $this->getRequest()->getVar('u'), 'n' => $this->getRequest()->getVar('n'), 'e' => $this->getRequest()->getVar('e')),
        )));

        $email->send();

        $output = array(
            "message" => "success",
            "status" => 200
        );

        return json_encode($output);
    }


}

