<?php

class ViewSubscribers extends User {

    public $subscribers;

    function __construct($subscribers){
        $this->subscribers = $subscribers;
    }

    public function print_subscribers($email_provider) {

        foreach($this->subscribers as $subscriber):
            ?>
                <tr>
                    <td><?php echo $subscriber->id; ?></td>
                    <td><?php echo $subscriber->email; ?></td>
                    <td><?php echo $subscriber->create_time ?></td>
                    
                    <td>
                        <!-- <a href="delete_subscriber.php?id=<?php //echo $subscriber->id; ?>"></a> -->
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $subscriber->id;?>">
                            
                            <input type="hidden" name="email_provider" value="<?php echo $email_provider;?>">
                            <input class="btn" type="submit" name="delete" id="" value="Delete">
                        </form>
                    </td>
                    
                </tr>
                <?php endforeach;
        return;
    }

    public static function show_email_providers($email_providers) {

        foreach($email_providers as $email_provider): ?>
            <div>
                <form action="" method="POST">
                    <input type="hidden" name="email_provider" value="<?php echo $email_provider;?>">
                    <input class="btn" type="submit" name="submit" id="" value="<?php echo $email_provider;?>">
                </form>
            </div>
            <br>
        <?php endforeach;

        return;
    }
}




?>