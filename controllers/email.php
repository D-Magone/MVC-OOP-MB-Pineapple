<?php

class Controller {
    public $result_array=array();
    public $subscribers;

    function __construct(){
        $this->delete_user_controller();
        $this->controll_view();
        
        global $session;
    }

    public function controll_view() {

        if(empty($_POST['email_provider'])) {
        
            $this->subscribers = User::find_all();
            $this->subscribers = $this->sort_subscriber_controller();
            
            $this->all_subscribers_view();

        } else {

            $this->subscribers = User::find_by_email_provider($_POST['email_provider']);
            $this->subscribers = $this->sort_subscriber_controller();

            $this->certain_provider_subscribers_view();
        }
    }

    
    public function sort_subscriber_controller() {
  
        if(isset($_POST['ascending'])) {

           $column = $_POST['column'];
           $this->subscribers = User::sort($this->subscribers, $column, SORT_ASC);

       } else if (isset($_POST['descending'])) {

           $column = $_POST['column'];
           $this->subscribers = User::sort($this->subscribers, $column, SORT_DESC);

       } else {
           
            $this->subscribers = User::sort($this->subscribers, 'create_time', SORT_ASC);
       }

       return $this->subscribers;
   }

    public function delete_user_controller() {

        if(isset($_POST['delete'])) {

            if(!empty($_POST['id'])) {

                $user = User::find_by_id($_POST['id']);
            }

            if($user) {

                $user->delete();

            }

        }
        return;
    }

    // public function user_input_search() {
        
    //     $data = json_decode(file_get_contents("php://input"), true);

    //     if(isset($data['data_input'])) {
    //         foreach($this->subscribers as $subscriber) {
    //             $subscriber = (array) $subscriber;
    //             foreach ($subscriber as $k => $item) {
    //                 if (strpos($subscriber['email'], $data['data_input']) !== false) {
    //                       $this->result_array[$k] = $item;
    //                 }
    //             }
    //               $this->subscribers = $this->result_array;
    //               var_dump($this->subscribers);
    //               $this->all_subscribers_view();
    //         }
    //     }
    //     return;
    // }

    public function certain_provider_subscribers_view() {

        $view_subscribers = new ViewSubscribers($this->subscribers);
        $view_subscribers->print_subscribers($_POST['email_provider']);

        return;
    }

    public function all_subscribers_view() {
        
        $view_subscribers = new ViewSubscribers($this->subscribers);
        $view_subscribers->print_subscribers('');

        $email_providers = User::find_email_providers($this->subscribers);
        sort($email_providers);
        
        $view_subscribers->show_email_providers($email_providers);

        return;
    }
}

?>