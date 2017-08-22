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
  
  
  // find user(s) by query
  public static function find_by_query($sql) {
    global $database;
    $result_set = $database->query($sql);
    return $result_set;
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
  
  
  // instantiate a user object
  public static function instantiate($found_user) {
    $the_object = new self;
    $the_object->id           = $found_user['id'];
    $the_object->first_name   = $found_user['first_name'];
    $the_object->last_name    = $found_user['last_name'];
    $the_object->email        = $found_user['email'];
    $the_object->tel          = $found_user['tel'];
    $the_object->gender       = $found_user['gender'];
    $the_object->role         = $found_user['role_id'];
    $the_object->created_at   = $found_user['created_at'];
    $the_object->changed_at   = $found_user['changed_at'];
    return $the_object;
  }

  
} // end of class

?>