<?php

class Role extends Db_object {
  
  // properties
  protected static $db_table = "roles";
  protected static $db_table_fields = array('role_name');
  public $id;
  public $role_name;
  
  
  // return role name
  public static function name($id) {
    $the_role = self::find_by_id($id);
    return !empty($the_role) ? $the_role->role_name : false;
  }
  
  
} // end of class


?>