<?php

class User {
  
  
  
  // find all users
  public static function find_all() {
    global $database;
    $result_set = $database->query("SELECT * FROM users");
    return $result_set;
  }
  
  
  // find a user by id
  public static function find_by_id($id) {
    global $database;
    $result_set = $database->query("SELECT * FROM users WHERE id = $id LIMIT 1");
    $user_found = mysqli_fetch_array($result_set);
    return $user_found;
  }
  
  
  
} // end of class

?>