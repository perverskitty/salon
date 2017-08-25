<?php

class Role extends Db_object {
  
  // properties
  protected static $db_table = "roles";
  protected static $db_table_fields = array('role_name');
  public $id;
  public $role_name;
  
  
} // end of class


?>