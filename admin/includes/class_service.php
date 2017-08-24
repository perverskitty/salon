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
  
  
} // end of class


?>