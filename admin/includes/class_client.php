<?php

class Client extends User {
    
  // properties
  protected static $db_table = "users";
  protected static $db_table_fields = array('first_name', 'last_name', 'email', 'password', 'tel', 'gender', 'role_id', 'hairdresser_id');
  public $role_id = 3;
  public $hairdresser_id = 0;
  
  
  // return hairdresser name 
  public function hairdresser_name() {
    $hairdresser = Hairdresser::find_by_id($this->hairdresser_id);
    if ($hairdresser) {
      return $hairdresser->first_name . " " . $hairdresser->last_name;
    } else {
      return "No preference";
    }
  }
  
  
} // end of class

?>