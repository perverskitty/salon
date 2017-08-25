<?php 

class Schedule extends Db_object {
  
  // properties
  protected static $db_table = "schedules";
  protected static $db_table_fields = array('hairdresser_id', 'day_id', 'start_time', 'end_time', 'first_date', 'last_date');
  public $id;
  public $hairdresser_id;
  public $day_id;
  public $start_time;
  public $end_time;
  public $first_date;
  public $last_date;
  public $created_at;
  public $changed_at;
  
  
  // return day name
  public function day_name() {
    $day_name = "";
    switch ($this->day_id) {
      case "1":
        $category_name = "Sunday";
        break;
      case "2":
        $category_name = "Monday";
        break;
      case "3":
        $category_name = "Tuesday";
        break;
      case "4":
        $category_name = "Wednesday";
        break;
      case "5":
        $category_name = "Thursday";
        break;
      case "6":
        $category_name = "Friday";
        break;
      case "7":
        $category_name = "Saturday";
        break;
      default:
        $category_name = "Undefined";  
    }
    return $category_name;
  }
  
  
} // end of class


?>