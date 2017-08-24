<?php 

class Schedule extends Db_object {
  
  // properties
  protected static $db_table = "schedules";
  protected static $db_table_fields = array('hairdresser_id', 'day_id', 'start_time', 'end_time', 'first_date', 'last_date');
  public $hairdresser_id;
  public $day_id;
  public $start_time;
  public $end_time;
  public $first_date;
  public $last_date;
  public $created_at;
  public $changed_at;
  
  
  
} // end of class


?>