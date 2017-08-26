<?php require_once("config.php"); ?>

<?php

class Database {
  
  public $connection;
  
  
  // constructor opens a database connection
  function __construct() {
    $this->open_db_connection();
  }
  
  
  // open a database connection
  public function open_db_connection() {
    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($this->connection->connect_errno) {
      die("*** Database connection failed to open *** " . $this->connection->connect_error);
    }
  }
  
  
  // process a database query 
  public function query($sql) {
    $result = $this->connection->query($sql);
    $this->confirm_query($result);
    return $result;
  } 
   
  
  // tests query result
  private function confirm_query($result) {
    if(!$result) {
      die("*** Database query failed *** " . $this->connection->error);
    }
  }
  
  
  // returns an escaped string
  public function escape_string($string) {
    $escaped_string = $this->connection->real_escape_string($string);
    return $escaped_string;
  }
  
  
  // returns an encrypted string
  private function encrypt_string($string) {
    $hashFormat = "$2y$10$"; // blowfish encryption with 10x generation
    $salt = "xCyVL42QLX622jcZf8koen"; // 22 character salt
    $hashF_and_salt = $hashFormat . $salt;
    $encrypted_string = crypt($string, $hashF_and_salt);
    return $encrypted_string;
  }
  
  
  // returns an escaped and encrypted string
  public function encrypt_escape_string($string) {
    $escaped_string = $this->escape_string($string);
    $encrypted_escaped_string = $this->encrypt_string($escaped_string);
    return $encrypted_escaped_string;
  } 
  
  
  // returns last inserted id
  public function the_insert_id() {
    return $this->connection->insert_id;
  }
  
  
} // end of class


// instantiate database
$database = new Database();


?>