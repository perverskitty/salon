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
  
  
  // return category name
  public function category_name() {
    $category_name = "";
    switch ($this->category_id) {
      case "1":
        $category_name = "Mens";
        break;
      case "2":
        $category_name = "Ladies";
        break;
      case "3":
        $category_name = "Childrens";
        break;
      case "4":
        $category_name = "Unisex";
        break;
      default:
        $category_name = "Undefined";  
    }
    return $category_name;
  }
  
  
} // end of class


?>