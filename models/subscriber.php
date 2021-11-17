<?php

class User extends Db_object {

    protected static $db_table = "user";

    public $subscribers;
    public $id;
    public $email;
    public $create_time;

    public function create($email) {

        global $database;

        $this->email = $database->escape_string($email);

        $sql  = "INSERT INTO " . static::$db_table . " ";
        $sql .= "(email) VALUES (?)";

        $stmt = $database->connection->prepare($sql);
        $stmt->bind_param('s', $this->email);

        if($stmt) {
            $stmt->execute();

            $this->id = $database->the_insert_id();
            return true;
        } else {

            return false;
        }
    }

    public function delete() {

        global $database;

        $sql = "DELETE FROM " . static::$db_table . " WHERE id={$this->id}";

        $database->query($sql);

        return(mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function return() {

        redirect("subscribers.php");
    }
}

?>