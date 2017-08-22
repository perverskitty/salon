<?php

class User {
  
  
  // properties
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $tel;
  public $gender;
  public $role;
  public $created_at;
  public $changed_at;
  
  
  // Use a query to return an array of User object(s)
  public static function find_by_query($sql) {
    global $database;
    $result_set = $database->query($sql);
    
    $the_object_array = array();
    
    while ($row = mysqli_fetch_array($result_set)) {
      $the_object_array[] = self::instantiate($row);
    }
    
    return $the_object_array;
  }
  
  
  // find all users
  public static function find_all() {
    return self::find_by_query("SELECT * FROM users");
  }
  
  
  // find user by id
  public static function find_by_id($id) {
    $result_set = self::find_by_query("SELECT * FROM users WHERE id = $id LIMIT 1");
    $found_user = mysqli_fetch_array($result_set);
    return $found_user;
  }
  
  
  // checks whether an attribute is a class property
  private function has_attribute($the_attribute) {
    $object_properties = get_object_vars($this);
    return array_key_exists($the_attribute, $object_properties);
  }
  
  
  // instantiate a user object from a record
  public static function instantiate($the_record) {
    $the_object = new self;
    foreach ($the_record as $the_attribute => $value) {
      if ($the_object->has_attribute($the_attribute)) {
        $the_object->$the_attribute = $value;
      }
    }
    return $the_object;
  }

  
} // end of class

?>