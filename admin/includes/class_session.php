<?php


class Session {
  
  
  private $signed_in;
  public $user_id;
  
  
  // constructor starts a session
  function __construct() {
    session_start();
  }
  
  
  
  
} // end of class


// instantiate
$session = new Session();



?>