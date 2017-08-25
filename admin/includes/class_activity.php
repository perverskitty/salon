<?php

class Activity extends Db_object {
  
  // properties
  protected static $db_table = "activities";
  protected static $db_table_fields = array('activity_name');
  public $id;
  public $activity_name;
  
  
} // end of class


?>