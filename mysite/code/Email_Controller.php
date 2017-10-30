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
        try {
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

        } catch (Exception $e){
            $output = array(
                "message" => "failure",
                "status" => 500
            );

            return json_encode($output);
        }
        
    }

    public function reservation(SS_HTTPRequest $request)
    {

        try {

            // Set the default value
            $subsiteId = 0;

            // Work out the given SubSite ID
            // We do not have access to this in the controller
            // TODO: calculate this value without string comparison
            switch ($this->getRequest()->getVar('sub')) {
                case "The Petals":
                    $subsiteId = 3;
                    break;
                case "Akapelo":
                    $subsiteId = 3;
                    break;
                case "The Avalon":
                    $subsiteId = 3;
                    break;
            }

            // Create the inital object
            $insert = SQLInsert::create('ReserveEmail');
            // Add in the object rows coming from the request
            $insert->addRows(array(
                array(
                    'Name' => $this->getRequest()->getVar('n'),
                    'Email' => $this->getRequest()->getVar('e'),
                    'Unit' => $this->getRequest()->getVar('u'),
                    'Location' => $this->getRequest()->getVar('sub'),
                    'SubsiteID' => $subsiteId)
            ));
            // Send to the DB
            $insert->execute();

            // SEND EMAIL
            $email = new Email();
            $email
            ->setFrom('info@swishproperties.co.za')
            ->setTo('craig@swishproperties.co.za,phil@incendiaryblue.com')
            ->setSubject('Swish Properties - Floor Reservation Request')
            ->setTemplate('ReservationEmail')
            ->populateTemplate(new ArrayData(array(
                'Data' => array('u' => $this->getRequest()->getVar('u'), 'n' => $this->getRequest()->getVar('n'), 'e' => $this->getRequest()->getVar('e'), 'sub' => $this->getRequest()->getVar('sub')),
            )));

            $email->send();

            // Return the result to the user
            $output = array(
                "message" => "success",
                "status" => 200
            );

            return json_encode($output);

        } catch (Exception $e) {

            // Return the result to the user
            $output = array(
                "message" => "failure",
                "status" => 500
            );

            return json_encode($output);

        }
        
    }

}