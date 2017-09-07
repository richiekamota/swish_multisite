<?php

class Email_Controller extends Controller
{
    private static $allowed_actions = array(
        'index',
    );

    public function index(SS_HTTPRequest $request)
    {
        $insert = SQLInsert::create('PriceEmail');
        $insert->addRows(array(
            array(
                'Email' => $this->getRequest()->getVar('e'))
        ));
        $insert->execute();
        $output = array(
            "message" => "success"
        );
        return json_encode($output);
    }
}

