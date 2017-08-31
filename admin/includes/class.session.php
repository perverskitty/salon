<?php

class Session {
  
  // properties
  private $signed_in = false;
  public $user_id;
  public $user_role;
  public $message;
  
  
  // constructor starts a session
  function __construct() {
    session_start();
    $this->check_the_signin();
    $this->check_message();
  }
  
  
  // getter method for $signed_in property
  public function is_signed_in() {
    return $this->signed_in;
  }
  
  
  // sign in a user
  public function signin($user) {
    if ($user) {
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->user_role = $_SESSION['user_role'] = $user->role_id;
      $this->signed_in = true;
    }
  }
  
  
  // sign out a user
  public function signout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_role']);
    unset($this->user_id);
    unset($this->user_role);
    $this->signed_in = false;
  }
  
  
  // check if a session is set 
  private function check_the_signin() {
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->user_role = $_SESSION['user_role'];
      $this->signed_in = true;
    } else {
      unset($this->user_id);
      unset($this->user_role);
      $this->signed_in = false;
    }
  }
  
  
  public function message($msg="") {
    if (!empty($msg)) {
      $_SESSION['message'] = $msg;
    } else {
      return $this->message;
    }
  }
  
  
  private function check_message() {
    if (isset($_SESSION['message'])) {
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
  }
  
  
} // end of class


// instantiate a session
$session = new Session();



?>