<?php

class Db_object {

    protected static $db_table = "user";
    
    public static function find_all() {

        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
    }

    public static function find_by_id($id) {
        
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id={$id} LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    public static function find_by_email_provider($email_provider) {

        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE email LIKE CONCAT('%" . $email_provider . "%')");
 
        return $the_result_array;
    }

    public static function find_by_query($sql) {

        global $database;

        $result_set = $database->query($sql);

        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) {

            $the_object_array[] = self::instantiation($row);
        }
        
        return $the_object_array;

    }


    public static function instantiation($the_record) {

        $calling_class = get_called_class();
        $the_object = new $calling_class;
        
        foreach($the_record as $the_attribute => $value) {

            if($the_object->has_the_attribute($the_attribute)) {

                $the_object->$the_attribute = $value;
            }           
        }
        return $the_object;

    }

    private function has_the_attribute($the_attribute) {
        
        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);
    }

    public static function find_email_providers($results) {
        // var_dump($results);
        $email_provider_array = array();

        foreach ($results as $result) {
            
            $clip_from_start = strrpos($result->email, '@');
            $clip_from_end = strpos($result->email, '.');
            $email_provider = substr($result->email, $clip_from_start + 1, $clip_from_end - $clip_from_start - 1);

            array_push($email_provider_array, $email_provider);
 
        }

        $email_provider_array = array_unique($email_provider_array);

        return $email_provider_array;
    }

    public static function sort($subscribers_array, $column, $sort_direction) {

        $column_array = array_column($subscribers_array, $column);

        array_multisort($column_array, $sort_direction, $subscribers_array);

        return $subscribers_array;
    }
}

?>