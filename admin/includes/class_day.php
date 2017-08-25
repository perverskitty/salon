<?php

class Day extends Db_object {
  
  // properties
  protected static $db_table = "days";
  protected static $db_table_fields = array('day_name');
  public $id;
  public $day_name;
  
  
} // end of class


?>