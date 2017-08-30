<?php

class Category extends Db_object {
  
  // properties
  protected static $db_table = "categories";
  protected static $db_table_fields = array('category_name');
  public $id;
  public $category_name;
  
  
  // return category name
  public static function name($id) {
    $the_category = self::find_by_id($id);
    return !empty($the_category) ? $the_category->category_name : false;
  }
  
  
} // end of class


?>