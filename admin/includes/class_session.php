<?php


class Session {
  
  // properties
  private $signed_in = false;
  public $user_id;
  
  
  // constructor starts a session
  function __construct() {
    session_start();
    $this->check_the_signin();
  }
  
  
  // getter method for $signed_in property
  public function is_signed_in() {
    return $this->$signed_in;
  }
  
  
  // sign in a user
  public function signin($user) {
    if ($user) {
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->signed_in = true;
    }
  }
  
  
  // sign out a user
  public function signout($user) {
    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->signed_in = false;
  }
  
  
  // check if a session is set 
  private function check_the_signin() {
    if (isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->signed_in = true;
    } else {
      unset($this->user_id);
      $this->signed_in = false;
    }
  }
  
  
} // end of class


// instantiate
$session = new Session();



?>