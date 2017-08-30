<?php 

class Service extends Db_object {
  
  // properties
  protected static $db_table = "services";
  protected static $db_table_fields = array('name', 'duration', 'category_id', 'cost');
  public $id;
  public $name;
  public $duration;
  public $category_id;
  public $cost;
  public $created_at;
  public $changed_at;
  
  
  // return service name
  public static function name($id) {
    $the_service = self::find_by_id($id);
    return !empty($the_service) ? $the_service->name : false;
  }
  
  
} // end of class


?>