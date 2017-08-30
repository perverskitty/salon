<?php

class Day extends Db_object {
  
  // properties
  protected static $db_table = "days";
  protected static $db_table_fields = array('day_name');
  public $id;
  public $day_name;
  
  
  // return day name
  public static function name($id) {
    $the_day = self::find_by_id($id);
    return !empty($the_day) ? $the_day->day_name : false;
  }
  
  
} // end of class


?>