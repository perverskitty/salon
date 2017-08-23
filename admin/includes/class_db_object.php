<?php

abstract class Db_object {
  
  
  // returns all objects in an array
  public static function find_all() {
    return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
  }
  
  
  // returns an object given by an id
  public static function find_by_id($id) {
    $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }
  
  
  // returns an array of object(s) from a query
  public static function find_by_query($sql) {
    global $database;
    $result_set = $database->query($sql);
    $the_object_array = array();
    while ($row = mysqli_fetch_array($result_set)) {
      $the_object_array[] = static::instantiate($row);
    }
    return $the_object_array;
  }
  
  
  // checks whether an attribute is a class property
  private function has_attribute($the_attribute) {
    $object_properties = get_object_vars($this);
    return array_key_exists($the_attribute, $object_properties);
  }
  
  
  // returns the object properties specified in $db_table_fields as an assoc. array
  protected function properties() {
    $properties = array();
    foreach(static::$db_table_fields as $db_field) {
      if(property_exists($this, $db_field)) {
        $properties[$db_field] = $this->$db_field;
      }
    }
    return $properties;
  }
  
  
  // returns a clean version of the assoc. array from the properties() method
  protected function clean_properties() {
    global $database;
    $clean_properties = array();
    foreach ($this->properties() as $key => $value) {
      $clean_properties[$key] = $database->escape_string($value); 
    }
    return $clean_properties;
  }
  
  
  // instantiate an object from a record
  public static function instantiate($the_record) {
    $calling_class = get_called_class();
    $the_object = new $calling_class;
    foreach ($the_record as $the_attribute => $value) {
      if ($the_object->has_attribute($the_attribute)) {
        $the_object->$the_attribute = $value;
      }
    }
    return $the_object;
  }
  
  
  // update an object if id exists, else insert new user
  public function save() {
    return isset($this->id) ? $this->update() : $this->create();
  }
  
  
  // create a record
  public function create() {
    global $database; 
    $properties = $this->clean_properties();
    $sql = "INSERT INTO " . static::$db_table . " (" . implode(",", array_keys($properties))  . ") ";
    $sql .= "VALUES ('" . implode("', '" , array_values($properties)) . "')";
    if ($database->query($sql)) {
      $this->id = $database->the_insert_id();
      $created_user = User::find_by_id($this->id);
      return true;
    } else {
      return false;
    }
  }
  
  
  // update a record
  public function update() {
    global $database;
    $properties = $this->clean_properties();
    $properties_pairs = array();
    
    foreach ($properties as $key => $value) {
      $properties_pairs[] = "{$key} = '$value'";
    }
    
    $sql = "UPDATE " .static::$db_table. " SET ";
    $sql .= implode(", ", $properties_pairs);
    $sql .= " WHERE id = " . $database->escape_string($this->id);
    $database->query($sql);
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }
  
  
  // delete a record
  public function delete() {
    global $database;
    $sql = "DELETE FROM " .static::$db_table. " ";
    $sql .= "WHERE id = " . $database->escape_string($this->id);
    $sql .= " LIMIT 1";
    $database->query($sql);
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }
  
  
  // returns count of records in a db table
  public static function count_all() {
    global $database;
    $sql = "SELECT COUNT(*) FROM " . static::$db_table;
    $result_set = $database->query($sql);
    $row = mysqli_fetch_array($result_set);
    return array_shift($row);
  }
  
  
} // end of class

?>