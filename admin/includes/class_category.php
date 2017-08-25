<?php

class Category extends Db_object {
  
  // properties
  protected static $db_table = "categories";
  protected static $db_table_fields = array('category_name');
  public $id;
  public $category_name;
  
  
  
  
} // end of class


?>