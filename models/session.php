<?php

class Session {

    function __construct() {
        
        session_start();
        $this->set_email_provider();
    }

    public function set_email_provider() {

        if(!empty($_POST['email_provider'])) {
            
            $email_provider = $_POST['email_provider'];
            $_SESSION['email_provider'] = serialize($email_provider);

        } else {
            $_SESSION['email_provider'] = "";
            $this->email_provider = "";
        }
    }

    public function get_email_provider() {

        if(isset($_SESSION['email_provider'])) {

            $this->email_provider = $_SESSION['email_provider'];

        } else {
            
            $this->email_provider = "";

        }
        return $this->get_email_provider;
    }
}

$session = new Session();


?>