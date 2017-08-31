<?php

class User extends Db_object {
    
  // properties
  protected static $db_table = "users";
  protected static $db_table_fields = array('first_name', 'last_name', 'email', 'password', 'tel', 'gender', 'role_id', 'hairdresser_id');
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $password;
  public $tel;
  public $gender;
  public $role_id = 0;
  public $hairdresser_id = 0;
  public $created_at;
  public $changed_at;
  
  
  // verifies user sign-in credentials
  public static function verify_user($email, $password) {
    global $database;
    $email = $database->escape_string($email);
    $password = $database->encrypt_escape_string($password);
    
    $sql = "SELECT * FROM " . static::$db_table . " WHERE ";
    $sql .= "email = '{$email}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    
    $the_result_array = static::find_by_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }
  
  
  // returns all properties except the password
  protected function clean_properties_excluding_password() {
    global $database;
    $clean_properties = array();
    foreach ($this->properties() as $key => $value) {
      if ($key == 'password') {
          break;
      } else {
        $clean_properties[$key] = $database->escape_string($value); 
      }
    }
    return $clean_properties;
  }
  
  
  // update a record except the password
  public function update() {
    global $database;
    $properties = $this->clean_properties_excluding_password();
    $properties_pairs = array();
    
    foreach ($properties as $key => $value) {
      $properties_pairs[] = "{$key} = '$value'";
    }
    
    $sql = "UPDATE " .static::$db_table. " SET ";
    $sql .= implode(", ", $properties_pairs);
    $sql .= " WHERE id = " . $database->escape_string($this->id);
    $database->query($sql);
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }
  
  
  // update password only
  public function update_password() {
    global $database;
    $new_password = $database->encrypt_escape_string($this->password);
      
    $sql = "UPDATE " .static::$db_table. " SET ";
    $sql .= "password = '". $new_password ."'";
    $sql .= " WHERE id = " . $database->escape_string($this->id);
    $database->query($sql);
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }
  
  
  // returns item count by role_id
  public static function count_by_role($role_id) {
    global $database;
    $role_id = $database->escape_string($role_id);
    $sql = "SELECT COUNT(*) FROM " . self::$db_table . " WHERE ";
    $sql .= "role_id = '{$role_id}'";
    $result_set = $database->query($sql);
    $row = mysqli_fetch_array($result_set);
    return array_shift($row);
  }
  
  
} // end of class

?>