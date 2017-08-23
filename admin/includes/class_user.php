<?php

class User {
  
  
  // properties
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $password;
  public $tel;
  public $gender;
  public $role;
  public $created_at;
  public $changed_at;
  
  
  // verifies user sign-in credentials
  public static function verify_user($email, $password) {
    global $database;
    $email = $database->escape_string($email);
    $password = $database->escape_string($password);
    
    $sql = "SELECT * FROM users WHERE ";
    $sql .= "email = '{$email}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    
    $the_result_array = self::find_by_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }
  
  
  // returns an array of User object(s) from a query
  public static function find_by_query($sql) {
    global $database;
    $result_set = $database->query($sql);
    
    $the_object_array = array();
    
    while ($row = mysqli_fetch_array($result_set)) {
      $the_object_array[] = self::instantiate($row);
    }
    
    return $the_object_array;
  }
  
  
  // returns all User objects in an array
  public static function find_all() {
    return self::find_by_query("SELECT * FROM users");
  }
  
  
  // returns a User object by id
  public static function find_by_id($id) {
    $the_result_array = self::find_by_query("SELECT * FROM users WHERE id = $id LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
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
  
  
  // update user if id exists, else insert new user
  public function save() {
    return isset($this->id) ? $this->update() : $this->create();
  }
  
  
  // create user record
  public function create() {
    global $database;
    $sql = "INSERT INTO users (first_name, last_name, email, password, tel, gender, role_id) ";
    $sql .= "VALUES ('";
    $sql .= $database->escape_string($this->first_name) . "', '";
    $sql .= $database->escape_string($this->last_name) . "', '";
    $sql .= $database->escape_string($this->email) . "', '";
    $sql .= $database->escape_string($this->password) . "', '";
    $sql .= $database->escape_string($this->tel) . "', '";
    $sql .= $database->escape_string($this->gender) . "', '";
    $sql .= $database->escape_string($this->role) . "')";
    
    if ($database->query($sql)) {
      $this->id = $database->the_insert_id();
      $created_user = User::find_by_id($this->id);
      // need to record created at and changed at details
      return true;
    } else {
      return false;
    }
  }
  
  
  // update user record
  public function update() {
    global $database;
    $sql = "UPDATE users SET ";
    $sql .= "first_name = '" . $database->escape_string($this->first_name) . "', ";
    $sql .= "last_name = '" . $database->escape_string($this->last_name) . "', ";
    $sql .= "email = '" . $database->escape_string($this->email) . "', ";
    $sql .= "password = '" . $database->escape_string($this->password) . "', ";
    $sql .= "tel = '" . $database->escape_string($this->tel) . "', ";
    $sql .= "gender = '" . $database->escape_string($this->gender) . "', ";
    $sql .= "role_id = '" . $database->escape_string($this->role) . "' ";
    $sql .= "WHERE id = " . $database->escape_string($this->id);
    $database->query($sql);
     
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }
  
  
  // delete user record
  public function delete() {
    global $database;
    $sql = "DELETE FROM users ";
    $sql .= "WHERE id = " . $database->escape_string($this->id);
    $sql .= " LIMIT 1";
    $database->query($sql);
    
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }
  
  
} // end of class

?>