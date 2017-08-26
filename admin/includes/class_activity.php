<?php

class Activity extends Db_object {
  
  // properties
  protected static $db_table = "activities";
  protected static $db_table_fields = array('activity_name');
  public $id;
  public $activity_name;
  
  
  // return activity name
  public static function name($id) {
    $the_activity = self::find_by_id($id);
    return !empty($the_activity) ? $the_activity->activity_name : false;
  }
  
  
} // end of class


?>