<?php

class FormController {
    private $subscriber_data;
    private $errors = [];
    private static $fields = ['email', 'checkbox'];

    public function __construct($subscriber_data){
        $this->subscriber_data = $subscriber_data;
        
        $this->form_action();
    }


    public function form_action() {

        if(isset($_POST['submit'])) {
        
            $this->form_errors();
            
        }
    }

    public function form_errors() {

        $errors = $this->validate_form();
        
        if($errors) {

            $error = implode(" ",$errors);
            echo $error;

        } else {
            
            $subscriber = new User();
            $subscriber->create($this->subscriber_data['email']);
            redirect("success.php");
        }
    }
    
    public function validate_form(){

        $this->validateTerms();
        $this->validateEmail();

        return $this->errors;
        echo $this->errors;
    }

    private function validateEmail(){
        $val = trim($this->subscriber_data['email']);

        if(empty($val)){
            $this->addError('email', 'Email address is required');
        } else if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Please provide a valid e-mail address');
        } else {
            if(substr($this->subscriber_data['email'], -3) == ".co"){
                $this->addError('email', 'We are not accepting subscriptions from Colombia
                emails');
            }
        }
    }

    private function validateTerms(){

        if(!isset($_POST['checkbox'])){
            $this->addError('checkbox', 'You must accept the terms and conditions');
        } 
    }

    private function addError($key, $val){
        $this->errors[$key]= $val;
    }
}

?>