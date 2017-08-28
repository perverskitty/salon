<?php

class Hairdresser extends User {
  
  // properties
  protected static $db_table = "users";
  protected static $db_table_fields = array('first_name', 'last_name', 'email', 'password', 'tel', 'gender', 'role_id');
  
  
  // return hairdresser's name
  public static function name($id) {
    $the_hairdresser = self::find_by_id($id);
    return !empty($the_hairdresser) ? $the_hairdresser->first_name.' '.$the_hairdresser->last_name : false;
  }

  
} // end of class

?>