<?php

class Client extends User {
    
  // properties
  protected static $db_table = "users";
  protected static $db_table_fields = array('first_name', 'last_name', 'email', 'password', 'tel', 'gender', 'role_id', 'hairdresser_id');
  public $role_id = 3;
  public $hairdresser_id = 0;
  
  
} // end of class

?>