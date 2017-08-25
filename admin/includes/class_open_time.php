<?php

class Open_time extends Db_object {
  
  // properties
  protected static $db_table = "open_times";
  protected static $db_table_fields = array('day_id', 'open_time', 'close_time', 'first_date', 'last_date');
  public $id;
  public $day_id;
  public $open_time;
  public $first_date;
  public $last_date;
  
  
} // end of class


?>